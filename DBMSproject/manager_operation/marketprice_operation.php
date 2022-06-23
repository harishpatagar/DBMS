
<?php
require_once ("../php/db.php");
require_once ("../php/component.php");



 function insertData($Branch_Id){

    // $bookname = textboxValue("book_name");
    // $bookpublisher = textboxValue("book_publisher");
    // $bookprice = textboxValue("book_price");
    
    
    $m_date=$_POST['m_date'];
    $Grade_A_price= $_POST['Grade_A_price'];
    $Grade_B_price= $_POST['Grade_B_price'];
    $Grade_C_price= $_POST['Grade_C_price'];
  $timestamp=strtotime($m_date);
  $date=date("d",$timestamp);

    if($m_date&&$Grade_A_price&&$Grade_B_price&&$Grade_C_price){
          $con1=create_connection();
          $sql1="SELECT m_date FROM market_price WHERE Branch_Id='$Branch_Id' AND m_date='$m_date' ";
          $result = mysqli_query($con1, $sql1);
          if(mysqli_num_rows($result)==0){
            $query =" INSERT INTO market_price (Branch_Id, Grade_A_Price, Grade_B_Price, Grade_C_Price,m_date,day) VALUES ('$Branch_Id', ' $Grade_A_price', ' $Grade_B_price', '  $Grade_C_price', '$m_date','$date') ";
            $con=create_connection();
            if(mysqli_query($con, $query))
            {
              TextNode("success", "Record Successfully Inserted...!");
            }
           else
            {
               TextNode("error", "insertion faild..!");
            }

          }
           else{
                 TextNode("error", "Entry for this date is already don...!");
               }
    } else{
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


// get data from mysql database
function getData($Branch_Id){
      $con1=create_connection();
     $sql1="SELECT Grade_A_Price,Grade_B_Price,Grade_C_Price,m_date FROM market_price WHERE Branch_Id='$Branch_Id' 
     ORDER BY m_date desc";
     $result = mysqli_query($con1, $sql1);
      if(mysqli_num_rows($result) > 0){
         return $result;
         }
         
}

// // // update data
function UpdateData($Branch_Id){
    $m_date=$_POST['m_date'];
    $Grade_A_price= $_POST['Grade_A_price'];
    $Grade_B_price= $_POST['Grade_B_price'];
    $Grade_C_price= $_POST['Grade_C_price'];

    if($Grade_A_price&&$Grade_B_price&&$Grade_C_price&&$m_date){
        $sql2="UPDATE market_price SET Grade_A_price = '$Grade_A_price', Grade_B_price = '$Grade_B_price', Grade_C_price = '$Grade_C_price' WHERE m_date='$m_date' and Branch_Id='$Branch_Id'";

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
          $m_date=$_POST['m_date'];
          $connection1=create_connection();
          $query1 = "DELETE FROM market_price WHERE Branch_Id='$Branch_Id' and m_date='$m_date'";

    if(mysqli_query($connection1, $query1)){
        TextNode("success","Record Deleted Successfully...!");
    }else{
        TextNode("error","Anable to Delete Record...!");
    }

    

}


function deleteBtn($Branch_Id){
    $result = getData($Branch_Id);
    $i = 0;
    if($result){
        while ($row = mysqli_fetch_assoc($result)){
            $i++;
            if($i >30){
                buttonElement("btn-deleteall", "btn btn-danger" ,"<i class='fas fa-trash'></i> Delete old record ", "deleteall", "");
                return;
            }
        }
    }
}


function deleteOldRecord($Branch_Id){
    $sql = "DELETE from market_price WHERE Branch_Id='$Branch_Id'";
    $con=create_connection();

    if(mysqli_query($con, $sql)){
        TextNode("success","All Record deleted Successfully...!");
    }else{
        TextNode("error","Something Went Wrong Record cannot deleted...!");
    }
}


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








