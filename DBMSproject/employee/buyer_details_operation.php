

<?php

require_once ("../php/db.php");
require_once ("../php/component.php");
    

 function insertData($Branch_Id){
     $Branch_Id=$Branch_Id;
    $seller_id= $_POST['buyer_id'];
    $buyer_name= $_POST['buyer_name'];
    $phone= $_POST['phone'];
    $B_Address= $_POST['B_Address'];
   

    if($buyer_name&&$phone&&$B_Address){
      
         $con=create_connection();
         $query="INSERT INTO buyer_details (buyer_name,phone, B_Address,Branch_Id) VALUES ('$buyer_name','$phone','$B_Address','  $Branch_Id')";
         if(mysqli_query($con, $query)){
             TextNode("success", "Record Successfully Inserted...!");
             }
         else{
              TextNode("error", "insertion faild..!");
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
     $sql1="SELECT * FROM buyer_details where Branch_Id='$Branch_Id'
     ORDER BY buyer_name";
     $result = mysqli_query($con1, $sql1);
      if(mysqli_num_rows($result) > 0){
         return $result;
         }
}

function searchData($Branch_Id){
    $search=$_POST['search_value'];

    $con1=create_connection();
   $sql1="SELECT * FROM buyer_details WHERE CONCAT(buyer_id,buyer_name) LIKE '%$search%' where Branch_Id='$Branch_Id' 
   ORDER BY buyer_name";
   $result = mysqli_query($con1, $sql1);
    if(mysqli_num_rows($result) > 0){
       return $result;
       }
}





// // update data
function UpdateData($Branch_Id){
   // ////$Branch_Id= $_POST['Branch_Id'];
   $buyer_id= $_POST['buyer_id'];
   $buyer_name= $_POST['buyer_name'];
   $phone= $_POST['phone'];
   $B_Address= $_POST['B_Address'];

    if($buyer_id &&$buyer_name&&$phone&&$B_Address){
        $sql2="UPDATE buyer_details SET buyer_name = '$buyer_name', phone = '$phone', B_Address = '$B_Address' where buyer_id='$buyer_id' and  Branch_Id='$Branch_Id'";

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
        //  $Branch_Id= $_POST['Branch_Id'];
          $buyer_id= $_POST['buyer_id'];
          $connection1=create_connection();
          $query1 = "DELETE FROM buyer_details WHERE  buyer_id=$buyer_id and  Branch_Id='$Branch_Id' ";

    if(mysqli_query($connection1, $query1)){
        TextNode("success","Record Deleted Successfully...!");
    }else{
        TextNode("error","Anable to Delete Record...!");
    }

    

}







