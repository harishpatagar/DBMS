

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
    $seller_name= $_POST['seller_name'];
    $phone= $_POST['phone'];
    $s_address= $_POST['s_address'];
    $AC_no= $_POST['AC_no'];
    $IFSC= $_POST['IFSC'];
    $username= $_POST['username'];
    $c_password= $_POST['c_password'];

    if($Branch_Id&&$seller_name&&$seller_name&&$phone&&$s_address&&$AC_no&&$IFSC&&$username&&$c_password){
      
        // $con = new mysqli("localhost","root","123456789","amdbms");
        // if($con->connect_error){
        //    die("Failed to connect : ".$con->connect_error);
        // }else{
         $con=create_connection();
         $query="INSERT INTO seller_details (Branch_Id, seller_name,phone, s_address, AC_no, IFSC, username,c_password) VALUES ('$Branch_Id','$seller_name','$phone','$s_address','$AC_no','$IFSC','$username','$c_password')";
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
function getData( $Branch_Id){
 
      $con1=create_connection();
     $sql1="SELECT seller_id,seller_name,phone,s_address,AC_no,IFSC,username,c_password FROM seller_details WHERE Branch_Id='$Branch_Id' 
     ORDER BY seller_name";
     $result = mysqli_query($con1, $sql1);
      if(mysqli_num_rows($result) > 0){
         return $result;
         }
}



function searchData($Branch_Id){
    //$search=$_POST['search_value'];
    $search=$_POST['search_value'];
    $con1=create_connection();
    $sql1="SELECT seller_id,seller_name,phone,s_address,AC_no,IFSC,username,c_password FROM seller_details WHERE CONCAT (seller_id,seller_name,s_address) LIKE '%$search%' AND Branch_Id='$Branch_Id' 
    ORDER BY seller_name";
    $result = mysqli_query($con1, $sql1);
     if(mysqli_num_rows($result) > 0){
        return $result;
        }

}



// // update data
function UpdateData($Branch_Id){
   // ////$Branch_Id= $_POST['Branch_Id'];
   $seller_id= $_POST['seller_id'];
   $seller_name= $_POST['seller_name'];
   $phone= $_POST['phone'];
   $s_address= $_POST['s_address'];
   $AC_no= $_POST['AC_no'];
   $IFSC= $_POST['IFSC'];
   $username= $_POST['username'];
   $c_password= $_POST['c_password'];
 

    if($seller_id &&$seller_name&&$phone&&$AC_no&&$s_address&&$IFSC&&$username&&$c_password&&$username&&$c_password){
        $sql2="UPDATE seller_details SET seller_name = '$seller_name', phone = '$phone', s_address = '$s_address' , AC_no ='$AC_no', IFSC='$IFSC',username='$username',c_password='$c_password' WHERE Branch_Id='$Branch_Id' AND seller_id='$seller_id' ";

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
          $seller_id= $_POST['seller_id'];
          $connection1=create_connection();
          $query1 = "DELETE FROM seller_details WHERE Branch_Id=$Branch_Id and seller_id=$seller_id ";

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








