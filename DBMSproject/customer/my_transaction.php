
<?php
//require_once ("../php/component.php");
require_once ("my_transaction_operation.php");
session_start();
$Branch_Id=$_SESSION['Branch_Id'];
$seller_id=$_SESSION['seller_id'];;
$result = getData($Branch_Id,$seller_id);
if($Branch_Id&&$seller_id){
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My transaction</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Custom stylesheet -->
    <link rel="stylesheet" href="/style.css">

</head>
<body>
    
<main>


        <!-- Bootstrap table  -->
        <div class="d-flex table-data">
        <table class="table table-striped table-warning">
                <thead class="bg-success">
                    <tr>
                        <th>tranaction_ID</th>    
                        <th>seller_id</th>    
                        <th>purchased_Date</th>
                        <th>grade A (quintal)</th>
                        <th>grade B (quintal)</th>
                        <th>grade C (quintal)</th>
                        <th>Total quantity</th>
                        <th>buy_price_A (rupies)</th>
                        <th>buy_price_B (rupies)</th>
                        <th>buy_price_C (rupies)</th>
                        <th>Total_price (rupies)</th>      
                    </tr>
                </thead>
                <tbody id="tbody">
               

<?php    
   // $result = getData($Branch_Id);
  
   

    if($result){
         
        while ($row = mysqli_fetch_assoc($result)){ ?>
              
              
         <tr>
                <td><?php echo $row['transaction_id']; ?></td>
                <td><?php echo $row['seller_id']; ?></td>
                <td><?php echo $row['purchased_date']; ?></td>
                <td><?php echo $row['grade_A_quantity']; ?></td>
                <td><?php echo $row['grade_B_quantity']; ?></td>
                <td><?php echo $row['grade_C_quantity']; ?></td>
                <td><?php echo $row['total_quantity']; ?></td>
                <td><?php echo $row['buyprice_A']; ?></td>
                <td><?php echo $row['buyprice_B']; ?></td>
                <td><?php echo $row['buyprice_C']; ?></td>
                <td><?php echo $row['total_price']; ?></td>   
        </tr>

<?php
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
<!-- 
<script src="php/main.js"></script> -->
</body>
</html>

<?php 
}else{
  header('location:/errpage.html');
}

?>
