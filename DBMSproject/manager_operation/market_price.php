
<?php
require_once ("../php/component.php");
require_once ("marketprice_operation.php");
session_start();
$Branch_Id=$_SESSION['Branch_Id'];
$result = getData($Branch_Id);
if($Branch_Id){
if(isset($_POST['home'])){
    header("Location:managerdashbord.php");
}
// create button click
if(isset($_POST['create'])){
    //     session_start();
    // $Branch_Id=$_SESSION['Branch_Id'];
        insertData($Branch_Id);
    }
    
    if(isset($_POST['update'])){
    //     session_start();
    // $Branch_Id=$_SESSION['Branch_Id'];
        UpdateData($Branch_Id);
    }
    
    if(isset($_POST['delete'])){
    //     session_start();
    // $Branch_Id=$_SESSION['Branch_Id'];
        deleteRecord($Branch_Id);
    }
    
    if(isset($_POST['deleteall'])){
        // session_start();
        // $Branch_Id=$_SESSION['Branch_Id'];
        deleteOldRecord($Branch_Id);
    
    }
    
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
<body>

<main>
    <div class="container text-center">
        <h1 class="py-4 bg-info text-light rounded"><i class="fas fa-swatchbook"></i>Market price</h1>
         
        <div class="d-flex justify-content-center">
            <form action="" method="post" class="w-50">
                <div class="row pt-2">
                    <div class="col">
                        <?php inputElement("date","m_date", "m_date","",""); ?>
                    </div></div>
                    <div class="row pt-2">
                    <div class="col">
                        <?php inputElement("number","Grade_A_price", "Grade_A_price","",""); ?>
                    </div></div>
                    <div class="row pt-2">
                    <div class="col">
                        <?php inputElement("number","Grade_B_price", "Grade_B_price","",""); ?>
                    </div></div>
                    <div class="row pt-2">
                    <div class="col">
                        <?php inputElement("number","Grade_C_price", "Grade_C_price","",""); ?>
                    </div></div>
                </div>
                <div class="d-flex justify-content-center">
                        <?php buttonElement("btn-home","btn btn-info","<i class='fas fa-home'></i>","home","data-toggle='tooltip' data-placement='bottom' title='Home'"); ?>
                        <?php buttonElement("btn-create","btn btn-success","<i class='fas fa-plus'></i>","create","data-toggle='tooltip' data-placement='bottom' title='Create'"); ?>
                        <?php buttonElement("btn-read","btn btn-primary","<i class='fas fa-sync'></i>","read","data-toggle='tooltip' data-placement='bottom' title='Read'"); ?>
                        <?php buttonElement("btn-update","btn btn-light border","<i class='fas fa-pen-alt'></i>","update","data-toggle='tooltip' data-placement='bottom' title='Update'"); ?>
                        <?php buttonElement("btn-delete","btn btn-danger","<i class='fas fa-trash-alt'></i>","delete","data-toggle='tooltip' data-placement='bottom' title='Delete'"); ?>
                        <?php deleteBtn($Branch_Id);?>
                      
                </div>
            </form>
         </div> 

       

        <!-- Bootstrap table  -->
        <div class="d-flex table-data">
        <table class="table table-striped table-warning">
                <thead class="bg-success">
                    <tr>
                        <th>date</th>
                        <th>Grade_A_price</th>
                        <th>Grade_B_price</th>
                        <th>Grade_C_price</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody id="tbody">
               

<?php
 

if(isset($_POST['read'])){
    
   // $result = getData($Branch_Id);
  
   

    if($result){

        while ($row = mysqli_fetch_assoc($result)){ ?>

         <tr>
           <td data-id="<?php echo $row['m_date'];?>"><?php echo $row['m_date']; ?></td>
           <td  data-id="<?php echo $row['m_date'];?>"><?php echo $row['Grade_A_Price']; ?></td>
           <td  data-id="<?php echo $row['m_date'];?>"><?php echo $row['Grade_B_Price']; ?></td>
           <td  data-id="<?php echo $row['m_date'];?>"><?php echo $row['Grade_C_Price']; ?></td>    
           <td><i class="fas fa-edit btnedit"  data-id="<?php echo $row['m_date'];?>"></i></td>
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

<script src="marketprice.js"></script>
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

