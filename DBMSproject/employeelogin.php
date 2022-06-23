<?php
 $username = $_POST['username'];
 $password = $_POST['password'];
 $con = new mysqli("localhost","root","123456789","amdbms","3309");
 if($con->connect_error){
    die("Failed to connect : ".$con->connect_error);
 } else{
   
     $query = "select * from employee_table where username = '$username' && E_password = '$password'&& designation='employee'";
     $result = mysqli_query($con, $query);
     $num = mysqli_num_rows($result);

     if($num == 1){
         header('location:employee/employeedashbord.php');
         } else {
            $query = "select * from employee_table where username = '$username' && E_password = '$password'&&designation='manager'";
            $result = mysqli_query($con, $query);
            $num = mysqli_num_rows($result);
            if($num == 1){
               header('location:manager_operation/managerdashbord.php'); 
              
               }
         else{
            header('location:employee_login.html'); 
         }
     }
   }
   $row = mysqli_fetch_assoc($result);
   session_start();
   $_SESSION['Branch_Id']=$row['Branch_Id'];
   
?>
