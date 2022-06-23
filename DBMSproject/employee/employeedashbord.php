

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
    <title>Employee Dashboard</title>
    <link rel="stylesheet" href="/dashboard.css">
  </head>
  <body>
    <h1 style='color:rgb(255, 255, 255);background-color: rgb(0, 195, 255);border-radius: 10px;padding: 10px; font-size: 50px'><i class="fas fa-swatchbook"></i>Employee Dashboard</h1>
    <form action="employeedashbord.php" method="POST" >
              <button type="submit" style="background-color: blue;" name="logout">Log out</button>
                 </form>   
    <div class="butotns">
      <div class="container">
        <div class="row">
          <div class="col-sm">
            <button onclick="window.location.href='Sellers_Details.php'">Sellers Details</a></button>
            <button onclick="window.location.href='seller_transaction.php'">Seller transaction</button>

          </div>
          <div class="col-sm">
            <button onclick="window.location.href='payment_to_seller.php'">Payment to seller</button>
            <button onclick="window.location.href='payment_from_buyer.php'">Payment from buyre</button>
          </div>
          <div class="col-sm">
            <button onclick="window.location.href='buyer_details.php'">Buyer details</button>
            <button onclick="window.location.href='buyer_transaction.php'">Buyer transaction</button>
            <div class="col-sm">

              <button onclick="window.location.href='storage.php'">Storage</button>
              
             </div>
       
         
          </div>
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