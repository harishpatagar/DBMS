

<?php

require_once ("../php/db.php");
require_once ("../php/component.php");
    

 function insertData($Branch_Id){
    // $bookname = textboxValue("book_name");
    // $bookpublisher = textboxValue("book_publisher");
    // $bookprice = textboxValue("book_price");
    
   // $Branch_Id= $_POST['Branch_Id'];
   
    // $Branch_Id=$Branch_Id;
    $seller_id= $_POST['seller_id'];
    $purchased_date= $_POST['purchased_date'];
    $grade_A_quantity= $_POST['grade_A_quantity'];
    $grade_B_quantity= $_POST['grade_B_quantity'];
    $grade_C_quantity= $_POST['grade_C_quantity'];
    $buyprice_A= $_POST['buyprice_A'];
    $buyprice_B= $_POST['buyprice_B'];
    $buyprice_C= $_POST['buyprice_C'];

    if($seller_id&&$purchased_date&&$grade_A_quantity&&$grade_B_quantity&&$grade_C_quantity&&$buyprice_A&&$buyprice_B&&$buyprice_C){
      
        // $con = new mysqli("localhost","root","123456789","amdbms");
        // if($con->connect_error){
        //    die("Failed to connect : ".$con->connect_error);
        // }else{
         $con=create_connection();
         $query1="SELECT * FROM seller_details WHERE Branch_Id='$Branch_Id'AND seller_id='$seller_id'";
         $result = mysqli_query($con, $query1);
          if(mysqli_num_rows($result)!=0){
             $query2="INSERT INTO seller_transaction (Branch_Id,seller_id, purchased_date, grade_A_quantity, grade_B_quantity, grade_C_quantity, buyprice_A, buyprice_B, buyprice_C) VALUES ('$Branch_Id','$seller_id', '$purchased_date',' $grade_A_quantity',' $grade_B_quantity', '$grade_C_quantity', '$buyprice_A', '$buyprice_B',' $buyprice_C')";
             if(mysqli_query($con, $query2)){
                TextNode("success", "Record Successfully Inserted...!");
             }
             else{
                    TextNode("error", "insertion faild..!");
                 }
         }
            else{
                     TextNode("error", "this seller id is not present on the DB  please create seller A/C first..!");
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
function getData( $Branch_Id){
 
      $con1=create_connection();
     $sql1="SELECT ST.transaction_id,ST.seller_id,SD.seller_name,ST.purchased_date,ST.grade_A_quantity,ST.grade_B_quantity,ST.grade_C_quantity,(ST.grade_A_quantity+ST.grade_B_quantity+ST.grade_C_quantity) as total_quantity,ST.buyprice_A,ST.buyprice_B,ST.buyprice_C ,(ST.buyprice_A*ST.grade_A_quantity)+(ST.buyprice_B*ST.grade_B_quantity)+(ST.buyprice_C*ST.grade_C_quantity) as total_price FROM seller_transaction ST INNER JOIN  seller_details SD  
      ON SD.seller_id=ST.seller_id
     WHERE SD.Branch_Id='$Branch_Id'  
      ORDER BY ST.seller_id";
     $result = mysqli_query($con1, $sql1);
      if(mysqli_num_rows($result) > 0){
         return $result;
         }
}


function searchData($Branch_Id){
    $search=$_POST['search_value'];
    $con1=create_connection();
    $sql1="SELECT ST.transaction_id,ST.seller_id,SD.seller_name,ST.purchased_date,ST.grade_A_quantity,ST.grade_B_quantity,ST.grade_C_quantity,(ST.grade_A_quantity+ST.grade_B_quantity+ST.grade_C_quantity) as total_quantity,ST.buyprice_A,ST.buyprice_B,ST.buyprice_C ,(ST.buyprice_A*ST.grade_A_quantity)+(ST.buyprice_B*ST.grade_B_quantity)+(ST.buyprice_C*ST.grade_C_quantity) as total_price FROM seller_transaction ST INNER JOIN  seller_details SD  
     ON SD.seller_id=ST.seller_id
    WHERE CONCAT (ST.transaction_id,ST.seller_id,SD.seller_name,ST.purchased_date) LIKE '%$search%' 
    AND SD.Branch_Id='$Branch_Id'  
     ORDER BY ST.seller_id DESC";
    $result = mysqli_query($con1, $sql1);
     if(mysqli_num_rows($result) > 0){
        return $result;
        }
}





// // update data
function UpdateData($Branch_Id){
   // ////$Branch_Id= $_POST['Branch_Id'];
   $seller_id= $_POST['seller_id'];
   $purchased_date= $_POST['purchased_date'];
   $grade_A_quantity= $_POST['grade_A_quantity'];
   $grade_B_quantity= $_POST['grade_B_quantity'];
   $grade_C_quantity= $_POST['grade_C_quantity'];
   $buyprice_A= $_POST['buyprice_A'];
   $buyprice_B= $_POST['buyprice_B'];
   $buyprice_C= $_POST['buyprice_C'];
 

   if($seller_id&&$purchased_date&&$grade_A_quantity&&$grade_B_quantity&&$grade_C_quantity&&$buyprice_A&&$buyprice_B&&$buyprice_C){      
         $sql2="UPDATE seller_transaction SET purchased_date = '$purchased_date', grade_A_quantity = '$grade_A_quantity', grade_B_quantity = '$grade_B_quantity' , grade_C_quantity ='$grade_C_quantity', buyprice_A='$buyprice_A',buyprice_B='$buyprice_B',buyprice_C='$buyprice_C' WHERE Branch_Id='$Branch_Id' AND seller_id='$seller_id' AND purchased_date='$purchased_date' ";

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
        $transaction_id= $_POST['transaction_id'];
          $seller_id= $_POST['seller_id'];
          $purchased_date= $_POST['purchased_date'];
          $connection1=create_connection();
          $query1 = "DELETE FROM seller_transaction WHERE  seller_id=$seller_id and purchased_date='$purchased_date' and transaction_id='$transaction_id'";

    if(mysqli_query($connection1, $query1)){
        TextNode("success","Record Deleted Successfully...!");
    }else{
        TextNode("error","Anable to Delete Record...!");
    }

    

}


// // function deleteBtn(){
// //     $result = getData();
// //     $i = 0;
// //     if($result){
// //         while ($row = mysqli_fetch_assoc($result)){
// //             $i++;
// //             if($i > 3){
// //                 buttonElement("btn-deleteall", "btn btn-danger" ,"<i class='fas fa-trash'></i> Delete All", "deleteall", "");
// //                 return;
// //             }
// //         }
// //     }
// // }


// // function deleteAll(){
// //     $sql = "DROP TABLE books";

// //     if(mysqli_query($GLOBALS['con'], $sql)){
// //         TextNode("success","All Record deleted Successfully...!");
// //         Createdb();
// //     }else{
// //         TextNode("error","Something Went Wrong Record cannot deleted...!");
// //     }
// // }


// // // set id to textbox
// function setID(){
//     $getid = getData();
//     $id = 0;
//     if($getid){
//         while ($row = mysqli_fetch_assoc($getid)){
//             $id = $row['id'];
//         }
//     }
//     return ($id + 1);
// }








