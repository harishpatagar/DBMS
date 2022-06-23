<?php
session_start();
$Branch_Id=$_SESSION['Branch_Id'];




$market_price = array();
//Best practice is to create a separate file for handling connection to database
try{
    if(isset($_POST["select"]))
    {
     // Creating a new connection.
    // Replace your-hostname, your-db, your-username, your-password according to your database
    $link = new \PDO(   'mysql:host=localhost;dbname=amdbms;port=3309', 
                        'root', //'root',
                        '123456789', //'',
                        array(
                            \PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                            \PDO::ATTR_PERSISTENT => false
                        )
                    );
                        $month=$_POST['month'];
                        $handle = $link->prepare("select Grade_A_Price, day  from market_price where Branch_Id='$Branch_Id' and m_date between '2022/$month/1' and '2022/$month/31' order by day"); 
                        $handle->execute(); 
                        $result = $handle->fetchAll(\PDO::FETCH_OBJ);
                    
   
    
    foreach($result as $row){
        array_push($market_price, array("x"=> $row->day, "y"=> $row->Grade_A_Price));
    }
}
	$link = null;
}
catch(\PDOException $ex){
    print($ex->getMessage());
}



?>
<!DOCTYPE HTML>
<html>
<head>  
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "column", // "light1", "light2", "dark1", "dark2"
	title:{
		text: " One month market price  (day v/s price in rs)"
	},
	data: [{
		type: "area", //change type to bar, line, area, pie,column etc  
		dataPoints: <?php echo json_encode($market_price, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>

</head>

<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<h1>chose month</h1>
<form method="post" actoin="a_chart.php">
<select style="width:100px;height:40px;border-radius:5px" name="month"  class="browser-default custom-select">
                       <option value="01">jan</option>
                       <option value="02">feb</option>
                     <option value="03">mar</option>
                     <option value="04">apr</option>
                     <option value="05">may</option>
                     <option value="06">jun</option>
                     <option value="07">jul</option>
                     <option value="08">aug</option>
                     <option value="09">sep</option>
                     <option value="10">oct</option>
                     <option value="11">nov</option>
                     <option value="12">dec</option>

                          </select>
                          <button  name="select" style=" color:#ffff;background-color: #28a745;border-radius:10px ;height:40px  " type="submit">Select</button>
                          <button  style=" color:#ffff;background-color: #28a745;border-radius:10px ;height:40px  " ><a href="marketprice.php">Home</a></button>

                        </form>

</body>

</html>                 

