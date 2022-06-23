

<?php

require_once ("../php/db.php");
require_once ("../php/component.php");
    

 function insertData($Branch_Id){
    // $bookname = textboxValue("book_name");
    // $bookpublisher = textboxValue("book_publisher");
    // $bookprice = textboxValue("book_price");
    
   // $Branch_Id= $_POST['Branch_Id'];
   
    // $Branch_Id=$Branch_Id;
    $Employee_name= $_POST['Employee_name'];
    $username= $_POST['username'];
    $E_password= $_POST['E_password'];
  
    
  

    if($Branch_Id&&$Employee_name&&$username&&$E_password){
      
        // $con = new mysqli("localhost","root","123456789","amdbms");
        // if($con->connect_error){
        //    die("Failed to connect : ".$con->connect_error);
        // }else{
         $con=create_connection();
         $query = "INSERT INTO employee_table(Branch_Id,E_name,username,E_password) 
             VALUES ('$Branch_Id','$Employee_name','$username','$E_password')";
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
// function textboxValue($value){
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
     $sql1="SELECT Employee_ID,E_name,username,E_password FROM employee_table WHERE Branch_Id='$Branch_Id' 
     ORDER BY E_name";
     $result = mysqli_query($con1, $sql1);
      if(mysqli_num_rows($result) > 0){
         return $result;
         }
}

function searchData($Branch_Id){
    //$search=$_POST['search_value'];
    $search=$_POST['search_value'];
    $con1=create_connection();
    $sql1="SELECT Employee_ID,E_name,username,E_password FROM employee_table WHERE  CONCAT (E_name,Employee_ID) like '%$search%' and  Branch_Id='$Branch_Id'";
    $result = mysqli_query($con1, $sql1);
    if(mysqli_num_rows($result) > 0){
       return $result;
       }

}
// // update data
function UpdateData($Branch_Id){
   // $Branch_Id= $_POST['Branch_Id'];
    $Employee_ID= $_POST['Employee_ID'];
    $Employee_name= $_POST['Employee_name'];
    $username= $_POST['username'];
    $E_password= $_POST['E_password'];


    if($Branch_Id &&$Employee_ID &&$Employee_name&&$username&&$E_password){
        $sql2="UPDATE employee_table SET E_name = '$Employee_name', username = '$username', E_password = '$E_password' WHERE Employee_ID ='$Employee_ID' and Branch_Id='$Branch_Id' and Designation='employee'";

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
          $Employee_ID= $_POST['Employee_ID'];
          $connection1=create_connection();
          $query1 = "DELETE FROM employee_table WHERE Branch_Id=$Branch_Id and Employee_ID=$Employee_ID and Designation='employee'";

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








