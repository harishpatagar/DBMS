

<?php

require_once ("../php/db.php");
require_once ("../php/component.php");
    

 function insertData( $Branch_Id){
    $buyer_id= $_POST['buyer_id'];
    $payment_date= $_POST['payment_date'];
    $payment_method= $_POST['payment_method'];
    $amount= $_POST['amount'];
    

    if($buyer_id&&$payment_method&&$payment_date&&$amount){
      $con=create_connection();  
      $sql="SELECT * FROM buyer_details WHERE buyer_id='$buyer_id' AND Branch_Id=' $Branch_Id' ";
      $result = mysqli_query($con, $sql);
            if(mysqli_num_rows($result)>0 ){

                $query="INSERT INTO payment_from_buyer (buyer_id, payment_method, payment_date, amount)
                VALUES ('$buyer_id', '$payment_method',' $payment_date',' $amount')";
                      if(mysqli_query($con, $query)){
                            TextNode("success", "Record Successfully Inserted...!");
                           }
                             else{
                                         TextNode("error", "insertion faild..!");
                                 }
             }else{
                    TextNode("error", "user_id not present in this branch...!");
                  }
      } else{
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
function getData( $Branch_Id){
 
      $con1=create_connection();
     $sql1=" SELECT PFB.buyer_id, SD.buyer_name,PFB.payment_method, PFB.payment_date, PFB.amount,PFB.recipt_no FROM payment_from_buyer PFB   JOIN  buyer_details SD 
      ON SD.buyer_id=PFB.buyer_id
     WHERE SD.Branch_Id='$Branch_Id'
     ORDER BY PFB.recipt_no";
   // $sql1="SELECT * FROM payment_from_buyer ";
     $result = mysqli_query($con1, $sql1);
      if(mysqli_num_rows($result) > 0){
         return $result;
         }
}



function searchData($Branch_Id){
    $search= $_POST['search_value'];

    $con1=create_connection();
   $sql1=" SELECT PFB.buyer_id, SD.buyer_name,PFB.payment_method, PFB.payment_date, PFB.amount,PFB.recipt_no FROM payment_from_buyer PFB   JOIN  buyer_details SD  
    ON SD.buyer_id=PFB.buyer_id
   WHERE concat (PFB.recipt_no,SD.buyer_name, PFB.payment_date) LIKE '%$search%' AND SD.Branch_Id='$Branch_Id'
   ORDER BY PFB.recipt_no";
 // $sql1="SELECT * FROM payment_from_buyer ";
   $result = mysqli_query($con1, $sql1);
    if(mysqli_num_rows($result) > 0){
       return $result;
       }
}

// // update data
function UpdateData($Branch_Id){
   $buyer_id= $_POST['buyer_id'];
   $payment_date= $_POST['payment_date'];
   $payment_method= $_POST['payment_method'];
   $amount= $_POST['amount'];
   $recipt_no= $_POST['recipt_no'];

   if($buyer_id&&$payment_date&&$payment_method&&$amount&&$recipt_no){    
    $con1=create_connection();  
    $sql="SELECT * FROM buyer_details WHERE buyer_id='$buyer_id' AND Branch_Id=' $Branch_Id' ";
    $result = mysqli_query($con1, $sql);
          if(mysqli_num_rows($result)>0 ){
         $sql2="UPDATE payment_from_buyer SET buyer_id = '$buyer_id', payment_date = '$payment_date', payment_method = '$payment_method' , amount ='$amount' where recipt_no='$recipt_no' ";

        $con2=create_connection();

        if(mysqli_query($con2, $sql2)){
            
            TextNode("success", "Data Successfully Updated");
        }else{
            TextNode("error", "Anable to Update Data");
        }
    }
    else{
        TextNode("error", "This seller id is not present on the db of this branch");
    }

    }else{
        TextNode("error", "Select Data Using Edit Icon");
    }


}


 function deleteRecord($Branch_Id){
        //  $Branch_Id= $_POST['Branch_Id'];
          $buyer_id= $_POST['buyer_id'];
          $recipt_no= $_POST['recipt_no'];
          $connection1=create_connection();
          $query1 = "DELETE FROM payment_from_buyer WHERE  buyer_id=$buyer_id and recipt_no='$recipt_no'";

    if(mysqli_query($connection1, $query1)){
        TextNode("success","Record Deleted Successfully...!");
    }else{
        TextNode("error","Anable to Delete Record...!");
    }

    

}





