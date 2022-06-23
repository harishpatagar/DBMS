<?php 

session_start();
$Branch_name=$_SESSION['Branch_name'];
$Branch_Id=$_SESSION['Branch_Id'];
$seller_name=$_SESSION['seller_name'];
if($Branch_Id&&$seller_name)
{
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> Arecanut market management  </title>
    <link rel="stylesheet" href="/dashboard.css">

  </head>
  <body>
    <div class="heading">
     <h1 >Welcome <?php echo $seller_name ?>...</h1>
     </div>
    <div class="buttons"> 
      <div class="container">
        <div class="row">
            <div class="col-sm">
            <button onclick="window.location.href='my_transaction.php'">transacton history</a></button></div>
            <div class="col-sm">
            <button onclick="window.location.href='marketprice.php'">marketprie</a></button></div>
           
           <form method="post" action="customerdashbord" >
            <button name="logout" >Logout</a></button></div>
           </form>

<?php   if(isset($_POST['logout'])){
      header('location:/index.html');
session_destroy();
} 
 ?>
          </div>
      </div>

    </div>
</body>
</html> 
<?php 
}else{
  header('location:/errpage.html');
}

?>