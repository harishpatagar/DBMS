

<?php

require_once ("../php/db.php");
require_once ("../php/component.php");
    

 function insertData($Branch_Id){
   
    $buyer_id= $_POST['buyer_id'];
    $sell_date= $_POST['sell_date'];
    $grade_A_quantity= $_POST['grade_A_quantity'];
    $grade_B_quantity= $_POST['grade_B_quantity'];
    $grade_C_quantity= $_POST['grade_C_quantity'];
    $sellprice_A= $_POST['sellprice_A'];
    $sellprice_B= $_POST['sellprice_B'];
    $sellprice_C= $_POST['sellprice_C'];

    if($buyer_id&&$sell_date&&$grade_A_quantity&&$grade_B_quantity&&$grade_C_quantity&&$sellprice_A&&$sellprice_B&&$sellprice_C){
      
         $con=create_connection($Branch_Id);
         $query1="SELECT * FROM buyer_details WHERE buyer_id='$buyer_id'";
         $result = mysqli_query($con, $query1);
          if(mysqli_num_rows($result)!=0){
            $con2=create_connection($Branch_Id);
             $query2="INSERT INTO buyer_transaction(Branch_Id, buyer_id, sell_date, grade_A_quantity, grade_B_quantity, grade_C_quantity, sellprice_A, sellprice_B, sellprice_C) 
             VALUES ('$Branch_Id', '$buyer_id', '$sell_date', '$grade_A_quantity', '$grade_B_quantity', '$grade_C_quantity', '$sellprice_A', '$sellprice_B', '$sellprice_C')";

             if(mysqli_query($con2, $query2)){
                TextNode("success", "Record Successfully Inserted...!");
             }
             else{
                    TextNode("error", "insertion faild..!");
                 }
         }
            else{
                     TextNode("error", "this buyer id is not present on the DB  please create buyer A/C first..!");
                }
    }else{
    TextNode("error", "enter all fields");

    }
 }
// function textboxValue($value){s
//    $con=create_connection();

//    $textbox = mysqli_real_escape_string($con, trim($_POST[$value]));
//     if(empty($textbox)){
//         return false;
//     }else{
//         return $textbox;
//     }
// }


// // messages
function TextNode($classname, $msg){
    $element = "<h6 class='$classname'>$msg</h6>";
    echo $element;
}


// // // get data from mysql database
function getData($Branch_Id){
 
      $con1=create_connection();
     $sql1="SELECT BT.transaction_id,BT.buyer_id,BD.buyer_name,BT.sell_date,BT.grade_A_quantity,BT.grade_B_quantity,BT.grade_C_quantity ,(BT.grade_A_quantity+BT.grade_B_quantity+BT.grade_C_quantity) AS total_quantity ,BT.sellprice_A,BT.sellprice_B,BT.sellprice_C ,((BT.grade_A_quantity*BT.sellprice_A)+(BT.grade_B_quantity*BT.sellprice_B)+(BT.grade_C_quantity*BT.sellprice_C))AS total_price from buyer_transaction BT inner join buyer_details BD ON BT.buyer_id= BD.buyer_id
     WHERE BT.Branch_Id='$Branch_Id'  
      ORDER BY BT.buyer_id";
     $result = mysqli_query($con1, $sql1);
      if(mysqli_num_rows($result) > 0){
         return $result;
         }
}


function searchData($Branch_Id){
    $search=$_POST['search_value'];
    $con1=create_connection();
   $sql1="SELECT BT.transaction_id,BT.buyer_id,BD.buyer_name,BT.sell_date,BT.grade_A_quantity,BT.grade_B_quantity,BT.grade_C_quantity ,(BT.grade_A_quantity+BT.grade_B_quantity+BT.grade_C_quantity) AS total_quantity ,BT.sellprice_A,BT.sellprice_B,BT.sellprice_C ,((BT.grade_A_quantity*BT.sellprice_A)+(BT.grade_B_quantity*BT.sellprice_B)+(BT.grade_C_quantity*BT.sellprice_C))AS total_price
    from buyer_transaction BT inner join buyer_details BD 
    ON BT.buyer_id= BD.buyer_id
   WHERE concat( BT.transaction_id,BT.buyer_id,BD.buyer_name,BT.sell_date) LIKE '%$search%' AND BT.Branch_Id='$Branch_Id'  
    ORDER BY BT.buyer_id";
   $result = mysqli_query($con1, $sql1);
    if(mysqli_num_rows($result) > 0){
       return $result;
       }
}

// // update data


// // update data
function UpdateData($Branch_Id){
   // ////$Branch_Id= $_POST['Branch_Id'];
   $transaction_id= $_POST['transaction_id'];
   $buyer_id= $_POST['buyer_id'];
   $sell_date= $_POST['sell_date'];
   $grade_A_quantity= $_POST['grade_A_quantity'];
   $grade_B_quantity= $_POST['grade_B_quantity'];
   $grade_C_quantity= $_POST['grade_C_quantity'];
   $sellprice_A= $_POST['sellprice_A'];
   $sellprice_B= $_POST['sellprice_B'];
   $sellprice_C= $_POST['sellprice_C'];
 

   if($buyer_id&&$sell_date&&$grade_A_quantity&&$grade_B_quantity&&$grade_C_quantity&&$sellprice_A&&$sellprice_B&&$sellprice_C){      
         $sql2="UPDATE buyer_transaction SET sell_date = '$sell_date', grade_A_quantity = '$grade_A_quantity', grade_B_quantity = '$grade_B_quantity' , grade_C_quantity ='$grade_C_quantity', sellprice_A='$sellprice_A',sellprice_B='$sellprice_B',sellprice_C='$sellprice_C' WHERE Branch_Id='$Branch_Id' AND buyer_id='$buyer_id' AND sell_date='$sell_date' and transaction_id='$transaction_id' ";

        $con2=create_connection();

        if(mysqli_query($con2, $sql2)){
            
            TextNode("success", "Data Successfully Updated");
        }else{
            TextNode("error", "Anable to Update Data");
        }

    }else{
        TextNode("error", "Select Data Using Edit Icon");
    }


}


 function deleteRecord($Branch_Id){
          $transaction_id= $_POST['transaction_id'];
          $buyer_id= $_POST['buyer_id'];
          $sell_date= $_POST['sell_date'];
          $connection1=create_connection();
          $query1 = "DELETE FROM buyer_transaction WHERE Branch_Id=$Branch_Id AND buyer_id=$buyer_id and sell_date='$sell_date' and transaction_id='$transaction_id'";

    if(mysqli_query($connection1, $query1)){
        TextNode("success","Record Deleted Successfully...!");
    }else{
        TextNode("error","Anable to Delete Record...!");
    }

    

}









