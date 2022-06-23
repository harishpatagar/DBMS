<?php
   function create_connection(){
    $servername = "localhost";
    $username = "root";
    $password = "123456789";
    $dbname = "amdbms";

    // create connection
    $con = mysqli_connect($servername, $username, $password,$dbname,"3309");
     return $con;
    // Check Connection
    if (!$con){
        die("Connection Failed : " . mysqli_connect_error());
    }

   }
  

