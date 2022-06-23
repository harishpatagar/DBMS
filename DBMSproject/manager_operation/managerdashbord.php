<?php
//require_once ("../php/component.php");
// require_once ("../manager_operation/marketprice_operation.php");
session_start();
$Branch_Id=$_SESSION['Branch_Id'];
// $result = getData($Branch_Id);
if($Branch_Id)
{
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Manager Dashboard</title>
    <link rel="stylesheet" href="/dashboard.css">

  </head>
  <body>
    <h1 style='color:rgb(255, 255, 255);background-color: rgb(0, 174, 255);border-radius: 10px;padding: 10px; font-size: 50px'><i class="fas fa-swatchbook"></i>Employee Dashboard</h1>
    <div class="buttons">
      <div class="container">
        <div class="row">
            <div class="col-sm">
        <button onclick="window.location.href='asign_workers.php'">Add workers</a></button></div>
            <div class="col-sm">
            <button onclick="window.location.href='market_price.php'">Daily market price</a></button></div>
            
          </div>
          <div class="col-sm">
            <button onclick="window.location.href='../employee/storage.php'">Storage</a></button></div>
            
          </div>
          <div class="col-sm">
          <form action="managerdashbord.php" method="POST" >
              <button type="submit" style="background-color: blue;" name="logout">Log out</button>
                 </form>               
          </div>
      </div>

    </div>
   
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