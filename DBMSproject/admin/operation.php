<?php

require_once ("../php/db.php");

require_once ("../php/component.php");

// create button click
if(isset($_POST['create'])){
    insertData();
}

if(isset($_POST['update'])){
    UpdateData();
}

if(isset($_POST['delete'])){
    deleteRecord();
}

// if(isset($_POST['deleteall'])){
//     deleteAll();

//}

 function insertData(){

    // $bookname = textboxValue("book_name");
    // $bookpublisher = textboxValue("book_publisher");
    // $bookprice = textboxValue("book_price");
    
    $Branch_Id= $_POST['BranchId'];
    $Branch_name= $_POST['Branch_name'];
    $Branch_address= $_POST['Branch_address'];
    $Manager_name= $_POST['Manager_name'];
    $username= $_POST['username'];
    $E_password= $_POST['E_password'];
    
  

    if($Branch_Id&&$Branch_name&&$Branch_address&&$Manager_name&&$username&&$E_password){
      
        // $con = new mysqli("localhost","root","123456789","amdbms");
        // if($con->connect_error){
        //    die("Failed to connect : ".$con->connect_error);
        // }else{
         $con=create_connection();
        $sql = "INSERT INTO branch_details (Branch_Id,Branch_name,Branch_address) 
                VALUES ('$Branch_Id','$Branch_name','$Branch_address')";
         $query = "INSERT INTO employee_table(Branch_Id,E_name,Designation,username,E_password) 
             VALUES ('$Branch_Id','$Manager_name','manager','$username','$E_password')";
         if(mysqli_query($con, $sql)){
             TextNode("success", "Record Successfully Inserted...!");
              mysqli_query($con, $query);
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


// // get data from mysql database
function getData(){
      $con=create_connection();
    //$sql = "SELECT * FROM branch_details";
     $sql="SELECT b.Branch_Id, b.Branch_name,b.Branch_address,e.E_name,e.username ,e.E_password  
      FROM    branch_details b
     INNER JOIN employee_table e 
     ON b.Branch_Id = e.Branch_Id and e.Designation='manager' 
     ORDER BY b.Branch_Id
     ";

    $result = mysqli_query($con, $sql);

    if(mysqli_num_rows($result) > 0){
     //  return  mysqli_num_rows($result);
        return $result;
    }
}


function searchData(){
    //$search=$_POST['search_value'];
    $search=$_POST['search_value'];
    $sql="SELECT b.Branch_Id, b.Branch_name,b.Branch_address,e.E_name,e.username ,e.E_password  
    FROM    branch_details b
   INNER JOIN employee_table e 
   ON b.Branch_Id = e.Branch_Id and e.Designation='manager' 
   where CONCAT (e.Branch_Id, b.Branch_name,b.Branch_address,e.E_name) like '%$search%'
   ORDER BY b.Branch_Id
   ";
      $con=create_connection();
  $result = mysqli_query($con, $sql);

  if(mysqli_num_rows($result) > 0){
   //  return  mysqli_num_rows($result);
      return $result;
  }
}




// // update data
function UpdateData(){
    $Branch_Id= $_POST['BranchId'];
    $Branch_name= $_POST['Branch_name'];
    $Branch_address= $_POST['Branch_address'];
    $Manager_name= $_POST['Manager_name'];
    $username= $_POST['username'];
    $E_password= $_POST['E_password'];

    if($Branch_Id&&$Branch_name&&$Branch_address&&$Manager_name&&$username&&$E_password){
        $sql = "UPDATE branch_details SET Branch_name='$Branch_name', Branch_address = '$Branch_address'WHERE Branch_Id='$Branch_Id' " ;
        $sql2="UPDATE employee_table SET E_name = '$Manager_name',username='$username',E_password='$E_password' WHERE Branch_Id='$Branch_Id' ";
        $con=create_connection();

        if(mysqli_query($con, $sql)){
            mysqli_query($con, $sql2);
            TextNode("success", "Data Successfully Updated");
        }else{
            TextNode("error", "Enable to Update Data");
        }

    }else{
        TextNode("error", "Select Data Using Edit Icon");
    }


}


 function deleteRecord(){
          $Branch_Id= $_POST['BranchId'];

          $sql = "DELETE FROM branch_details WHERE  Branch_Id=$Branch_Id";
          $sql2 = "DELETE FROM employee_table WHERE  Branch_Id=$Branch_Id";

          $con=create_connection();

    if(mysqli_query($con, $sql)){
        TextNode("success","Record Deleted Successfully...!");
        mysqli_query($con, $sql2);
    }else{
        TextNode("error","Enable to Delete Record...!");
    }

    

}


// function deleteBtn(){
//     $result = getData();
//     $i = 0;
//     if($result){
//         while ($row = mysqli_fetch_assoc($result)){
//             $i++;
//             if($i > 3){
//                 buttonElement("btn-deleteall", "btn btn-danger" ,"<i class='fas fa-trash'></i> Delete All", "deleteall", "");
//                 return;
//             }
//         }
//     }
// }


// function deleteAll(){
//     $sql = "DROP TABLE books";

//     if(mysqli_query($GLOBALS['con'], $sql)){
//         TextNode("success","All Record deleted Successfully...!");
//         Createdb();
//     }else{
//         TextNode("error","Something Went Wrong Record cannot deleted...!");
//     }
// }


// // set id to textbox
function setID(){
    $getid = getData();
    $id = 0;
    if($getid){
        while ($row = mysqli_fetch_assoc($getid)){
            $id = $row['id'];
        }
    }
    return ($id + 1);
}








