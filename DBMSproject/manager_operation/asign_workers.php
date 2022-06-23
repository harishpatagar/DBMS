
<?php

require_once ("../php/component.php");
require_once ("assign_workers_operation.php");
session_start();
$Branch_Id=$_SESSION['Branch_Id'];
$result = getData($Branch_Id);
if($Branch_Id){

if(isset($_POST['home'])){
    header("Location:managerdashbord.php");
}
// create button click
if(isset($_POST['create'])){
   
    insertData($Branch_Id);
}

if(isset($_POST['update'])){

    UpdateData($Branch_Id);
}

if(isset($_POST['delete'])){
   
    deleteRecord($Branch_Id);
}
//  if(isset($_POST['search'])){
   
//      searchData($Branch_Id);
//  }

// if(isset($_POST['deleteall'])){
//     deleteAll();

//}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>asign workers</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Custom stylesheet -->
    <link rel="stylesheet" href="/style.css">

</head>
<body>
<main>
    
    <div class="container text-center">
        <h1 class="py-4 bg-info text-light rounded"><i class="fas fa-swatchbook"></i>Add Employees</h1>
        <div class="d-flex justify-content-center">
            <form action="" method="post" class="w-50">
            
                <div class="pt-2">
                    <?php inputElement("text","Employee_ID", "Employee_ID","","readonly"); ?> <!-- replace after with fun!-->
                </div>
                <div class=" pt-2">
                        <?php inputElement("text","Employee_name", "Employee_name","",""); ?>
                </div>
                <div class="row pt-2">
                    <div class="col">
                        <?php inputElement("text","username", "username","",""); ?>
                    </div>
                    <div class="col">
                        <?php inputElement("text","E_password", "E_password","",""); ?>
                    </div>
                </div>
                   </br>
                <div class="pt-2">
                <?php inputElement("text","search_value", "search_value","",""); ?>
                </div> 
               
                <div class="d-flex justify-content-center">
                        <?php buttonElement("btn-home","btn btn-info","<i class='fas fa-home'></i>","home","data-toggle='tooltip' data-placement='bottom' title='Home'"); ?>
                        <?php buttonElement("btn-create","btn btn-success","<i class='fas fa-plus'></i>","create","data-toggle='tooltip' data-placement='bottom' title='Create'"); ?>
                        <?php buttonElement("btn-read","btn btn-primary","<i class='fas fa-sync'></i>","read","data-toggle='tooltip' data-placement='bottom' title='Read'"); ?>
                        <?php buttonElement("btn-update","btn btn-light border","<i class='fas fa-pen-alt'></i>","update","data-toggle='tooltip' data-placement='bottom' title='Update'"); ?>
                        <?php buttonElement("btn-delete","btn btn-danger","<i class='fas fa-trash-alt'></i>","delete","data-toggle='tooltip' data-placement='bottom' title='Delete'"); ?>
                        <?php buttonElement("btn-search","btn btn-primary"," <i class='fas fa-search'></i>","search","data-toggle='tooltip' data-placement='bottom' title='search'"); ?>

                    </div>
            </form>
         </div> 

       

        <!-- Bootstrap table  -->
        <div class="d-flex table-data">
        <table class="table table-striped table-warning">
                <thead class="bg-success">
                    <tr>
                        <th>Employee_ID</th>
                        <th>Employee_name</th>
                        <th>username</th>
                        <th>password</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody id="tbody">

<?php


if(isset($_POST['read'])){

    if($result){

        while ($row = mysqli_fetch_assoc($result)){ ?>

            <tr>
                <td  data-id="<?php echo $row['Employee_ID'];?>"><?php echo $row['Employee_ID']; ?></td>
                <td data-id="<?php echo $row['Employee_ID'];?>" ><?php echo $row['E_name']; ?></td>
                <td data-id="<?php echo $row['Employee_ID'];?>" ><?php echo $row['username']; ?></td>
                <td  data-id="<?php echo $row['Employee_ID'];?>"><?php echo $row['E_password']; ?></td>
                <td  ><i class="fas fa-edit btnedit" data-id="<?php echo $row['Employee_ID'];?>"></i></td>
            </tr>

<?php
        }

    }
}else if(isset($_POST['search'])){
$result= searchData($Branch_Id);

    if($result){

        while ($row = mysqli_fetch_assoc($result)){ ?>

            <tr>
                <td  data-id="<?php echo $row['Employee_ID'];?>"><?php echo $row['Employee_ID']; ?></td>
                <td  data-id="<?php echo $row['Employee_ID'];?>"><?php echo $row['E_name']; ?></td>
                <td  data-id="<?php echo $row['Employee_ID'];?>"><?php echo $row['username']; ?></td>
                <td data-id="<?php echo $row['Employee_ID'];?>"><?php echo $row['E_password']; ?></td>
                <td  ><i class="fas fa-edit btnedit"  data-id="<?php echo $row['Employee_ID'];?>"></i></td>
            </tr>

<?php
        }

    }
}


?>

                </tbody>
            </table>
        </div>

        </div>
    </div>
</main>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script src="manager.js"></script>
</body>
</html>


<?php   if(isset($_POST['logout'])){
      header('location:/index.html');
session_destroy();
} 
 ?>

<?php 
}else{
  header('location:/errpage.html');
}

?>