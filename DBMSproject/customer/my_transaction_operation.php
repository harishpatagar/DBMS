

<?php

require_once ("../php/db.php");
require_once ("../php/component.php");
    

 
function getData( $Branch_Id,$seller_id){
 
      $con1=create_connection();
     $sql1="SELECT ST.transaction_id,ST.seller_id,SD.seller_name,ST.purchased_date,ST.grade_A_quantity,ST.grade_B_quantity,ST.grade_C_quantity,(ST.grade_A_quantity+ST.grade_B_quantity+ST.grade_C_quantity) as total_quantity,ST.buyprice_A,ST.buyprice_B,ST.buyprice_C ,(ST.buyprice_A*ST.grade_A_quantity)+(ST.buyprice_B*ST.grade_B_quantity)+(ST.buyprice_C*ST.grade_C_quantity) as total_price FROM seller_transaction ST INNER JOIN  seller_details SD  
      ON SD.seller_id=ST.seller_id
     WHERE SD.Branch_Id='$Branch_Id' AND  ST.seller_id='$seller_id'
      ORDER BY ST.purchased_date DESC";
     $result = mysqli_query($con1, $sql1);
      if(mysqli_num_rows($result) > 0){
         return $result;
         }
}










