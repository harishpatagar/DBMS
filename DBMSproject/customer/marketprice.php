
<?php
//require_once ("../php/component.php");
require_once ("../manager_operation/marketprice_operation.php");
session_start();
$Branch_Id=$_SESSION['Branch_Id'];
$result = getData($Branch_Id);
if($Branch_Id)
{
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>market price</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Custom stylesheet -->
    <link rel="stylesheet" href="/style.css">

</head>
<body>
<div style="margin-top:30px;  " class="buttons"> 
      <div class="container">
        <div class="row">
        <div class="col-sm">
            <button style=" color:#ffff; background-color: #28a745;border-radius:10px ;height:40px " onclick="window.location.href='customerdashbord.php'">Home</button></div>
            <div class="col-sm">
            <button style=" color:#ffff;background-color: #28a745;border-radius:10px ;height:40px  "  onclick="window.location.href='a_chart.php'">Grade A chart</a></button></div>
            <div class="col-sm">
            <button style=" color:#ffff;background-color: #28a745;border-radius:10px ;height:40px  "  onclick="window.location.href='b_chart.php'">Grade B chart</a></button></div>
            <div class="col-sm">
            <button  style=" color:#ffff;background-color: #28a745;border-radius:10px ;height:40px  " onclick="window.location.href='c_chart.php'">Grade C chart</a></button></div>
</div>
</div>
</div>
<main>
        <!-- Bootstrap table  -->
        <div class="d-flex table-data">
        <table class="table table-striped table-warning">
                <thead class="bg-success">
                    <tr>
                        <th>date</th>
                        <th>Grade_A_price</th>
                        <th>Grade_B_price</th>
                        <th>Grade_C_price</th>        
                    </tr>
                </thead>
                <tbody id="tbody">
               

<?php    
   // $result = getData($Branch_Id);
  
   

    if($result){

        while ($row = mysqli_fetch_assoc($result)){ ?>

         <tr>
           <td><?php echo $row['m_date']; ?></td>
           <td><?php echo $row['Grade_A_Price']; ?></td>
           <td><?php echo $row['Grade_B_Price']; ?></td>
           <td><?php echo $row['Grade_C_Price']; ?></td>    
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