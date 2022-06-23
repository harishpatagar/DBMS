
<?php
  

require_once ("../php/component.php");
require_once ("operation.php");
session_start();
$username=$_SESSION['username'];
$password=$_SESSION['password'];
if($username&&$password){
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Books</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Custom stylesheet -->
    <link rel="stylesheet" href="/style.css">

</head>
<body style=" background-color: azure;">

<main>
    <div class="container text-center">
        <h1 class="py-4 bg-info text-light rounded"><i class="fas fa-swatchbook"></i>Admin Dashboard</h1>
         
        <div  class="d-flex justify-content-center">
            <form   action="" method="post" class="w-50">
                <!-- <div style="    background-color: #ffff;border-radius: 10px;padding: 20px;"> -->
                <div class="pt-2">
                    <?php inputElement("text","Branch_Id", "BranchId","",""); ?> <!-- replace after with fun!-->
                </div>
                <div class="pt-2">
                    <?php inputElement("text","Branch_name", "Branch_name","",""); ?>
                </div>
                <div class=" pt-2">
                        <?php inputElement("text","Branch_address", "Branch_address","",""); ?>
                </div>
                <div class=" pt-2">
                        <?php inputElement("text","Manager_name", "Manager_name","",""); ?>
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
                <!-- </div> -->
                <div class="d-flex justify-content-center">
                        <?php buttonElement("btn-create","btn btn-success","<i class='fas fa-plus'></i>","create","data-toggle='tooltip' data-placement='bottom' title='Create'"); ?>
                        <?php buttonElement("btn-read","btn btn-primary","<i class='fas fa-sync'></i>","read","data-toggle='tooltip' data-placement='bottom' title='Read'"); ?>
                        <?php buttonElement("btn-update","btn btn-light border","<i class='fas fa-pen-alt'></i>","update","data-toggle='tooltip' data-placement='bottom' title='Update'"); ?>
                        <!-- <?php buttonElement("btn-delete","btn btn-danger","<i class='fas fa-trash-alt'></i>","delete","data-toggle='tooltip' data-placement='bottom' title='Delete'"); ?> -->
                        <?php buttonElement("btn-search","btn btn-primary"," <i class='fas fa-search'></i>","search","data-toggle='tooltip' data-placement='bottom' title='search'"); ?>
                        <button name="logout"> logout</button>
                </div>
            </form>
            
         </div> 


        
         <div style="overflow: auto">
        <!-- Bootstrap table  -->
        <div class="d-flex table-data">
            <table class="table table-striped table-warning">
                <thead class="bg-success">
                    <tr>
                        <th>Branch_Id</th>
                        <th>Branch_name</th>
                        <th>address</th>
                        <th>Manager_name</th>
                        <th>username</th>
                        <th>password</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody id="tbody">
                

<?php

$result = getData();
if(isset($_POST['read'])){

    if($result){

        while ($row = mysqli_fetch_assoc($result)){ ?>

            <tr>
                <td  data-id="<?php echo $row['Branch_Id'];?>"><?php echo $row['Branch_Id']; ?></td>
                <td data-id="<?php echo $row['Branch_Id'];?>"><?php echo $row['Branch_name']; ?></td>
                <td data-id="<?php echo $row['Branch_Id'];?>"><?php echo $row['Branch_address']; ?></td>
                <td data-id="<?php echo $row['Branch_Id'];?>"><?php echo $row['E_name']; ?></td>
                <td data-id="<?php echo $row['Branch_Id'];?>"><?php echo $row['username']; ?></td>
                <td data-id="<?php echo $row['Branch_Id'];?>"><?php echo $row['E_password']; ?></td>
                <td ><i class="fas fa-edit btnedit"data-id="<?php echo $row['Branch_Id'];?>"></i></td>
            </tr>
        </div>
<?php
        }

    }
}else if(isset($_POST['search'])){
    $result= searchData();

    if($result){

        while ($row = mysqli_fetch_assoc($result)){ ?>

            <tr>
                <td  data-id="<?php echo $row['Branch_Id'];?>"><?php echo $row['Branch_Id']; ?></td>
                <td data-id="<?php echo $row['Branch_Id'];?>"><?php echo $row['Branch_name']; ?></td>
                <td data-id="<?php echo $row['Branch_Id'];?>"><?php echo $row['Branch_address']; ?></td>
                <td data-id="<?php echo $row['Branch_Id'];?>"><?php echo $row['E_name']; ?></td>
                <td data-id="<?php echo $row['Branch_Id'];?>"><?php echo $row['username']; ?></td>
                <td data-id="<?php echo $row['Branch_Id'];?>"><?php echo $row['E_password']; ?></td>
                <td ><i class="fas fa-edit btnedit"data-id="<?php echo $row['Branch_Id'];?>"></i></td>
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

<script src="adminjs.js"></script>
</body>
</html>
<?php 
}else{
    header('location:/index.html');

}
?>
  <?php   if(isset($_POST['logout'])){
                     session_destroy();
                    
                    
              } 
            ?>