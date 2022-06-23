<?php
 require_once ("../php/db.php");

require_once ("operation.php");
 $username = $_POST['username'];
 $password = $_POST['password'];
//  $con = new mysqli("localhost","root","123456789","amdbms","3309");
$con=create_connection();
 if($con->connect_error){
    die("Failed to connect : ".$con->connect_error);
 } else{ 
   
     $query = "select * from adminlogin where username = '$username' && password = '$password'";
     $result = mysqli_query($con, $query);
     $num = mysqli_num_rows($result);

     if($num == 1){
         header('location:admindashboard.php');
         } else {
         // header('location:admindashboard.php');
     
          header('location:adminlogin.html'); 
          //TextNode("error", "login faild"); 
         }
     }
     $row = mysqli_fetch_assoc($result);
     session_start();
     $_SESSION['username']=$row['username'];
     $_SESSION['password']=$row['password'];
?>
