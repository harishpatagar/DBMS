<?php
 $username = $_POST['username'];
 $c_password = $_POST['c_password'];
 $con = new mysqli("localhost","root","123456789","amdbms","3309");
 if($con->connect_error){
    die("Failed to connect : ".$con->connect_error);
 } else{

     $query = "select * from seller_details where username = '$username' && c_password = '$c_password'";
     $result = mysqli_query($con, $query);
     $num = mysqli_num_rows($result);

     if($num == 1){
         header('location:customerdashbord.php');
         } else {
         // header('location:admindashboard.php');

            header('location:customerlogin.html'); 
         }
     }
     $row = mysqli_fetch_assoc($result);
     session_start();
     $_SESSION['Branch_Id']=$row['Branch_Id'];
     $_SESSION['Branch_name']=$row['Branch_name'];
     $_SESSION['seller_name']=$row['seller_name'];
     $_SESSION['seller_id']=$row['seller_id'];
?>