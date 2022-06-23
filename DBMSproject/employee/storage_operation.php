<?php

require_once ("../php/db.php");
require_once ("../php/component.php");
    

 
function getData($Branch_Id){
 
      $con1=create_connection();
     $sql1=" CALL retrive ('$Branch_Id')";
     $result = mysqli_query($con1, $sql1);
      if(mysqli_num_rows($result) > 0){
         return $result;
         }
}
