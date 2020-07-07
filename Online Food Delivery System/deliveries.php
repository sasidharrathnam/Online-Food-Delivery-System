<!DOCTYPE html>
<html>
<head>
	<title>Online Food Delivery System</title>
	<style type="text/css">
		
ul {
  list-style-type: none;
  margin-top: 90px;
  margin-left: -10px;
  padding: 0;
  width: 20%;
  height: 100%;
  overflow: auto;
  background-color: #555;
  float: left;
  position: fixed;
}

li a {
  display: block;
  color: #fff;
  padding: 8px 16px;
  text-decoration: none;
}


li a.active {
  background-color: red;
  color: white;
}

li a:hover:not(.active) {
  background-color:#f1f1f1;
  color: black;
}

#r
{
    margin-left: 500px;
    margin-top: 20px;
}
table
{
  margin-left: 400px;
  margin-top: 20px;
}
td
{
  padding: 10px;
}
li
{
	font-size: 20px;
}
#d1
{
	padding: 5px;
	background-color: powderblue;
	text-align: center;
	margin-top: -20px;
	margin-left: -10px;
	width: 100%;
	position: fixed;
}
#d7
{
	margin-left: 20%;
	background-color: blue;
	width: 700px;
	height: 700px;
}
td
{
	text-align: center;
	font-size: 20px;
}
p
{
  text-align: left;
  font-size: 20px;
  margin-left: 60px;
}

#td1
{
	background-color: grey;
	color: white;
	border-color: white;
}
input
{
	margin-left: 700px;
	padding: 10px;
	font-size: 20px;
}
</style>
</head>
<script type="text/javascript">
function hello()
{
	alert('Order has been delivered');
}
</script>
<body>
<?php
require 'session.php';
require 'conn.php';
if(!isset($_SESSION['del_id'])||empty($_SESSION['del_id']))
{
	echo "<script>alert('Please login')</script>";
	echo "<script>location.href='delivery_login.php'</script>";
}
else
{
	 $del_id=$_SESSION['del_id'];
}
?>
<div id="d1"><h1>Online Food Delivery System</h1></div>
<div>
<ul>
  <li><a href="welcome_delivery.php?del=<?php echo $del_id;?>">Home</a></li>
  <li><a href="del_profile.php?del=<?php echo $del_id;?>">Profile</a></li>
  <li><a href="deliveries.php?del=<?php echo $del_id;?>" class="active">View Deliveries</a></li>
  <li><a href="delivery_logout.php">Logout</a></li>
</ul>
</br></br></br></br>

<?php

$id=array('h1');
$name=array('h2');
$cost=array('h3');
$order_id=null;
$phone=null;
$location=null;
$price=null;
$list=1;
$amount=0;
$u_id=0;
$z=0;
$query3="SELECT orders.order_id, orders.user_id, orders.location, orders.price, ordered.name,orders.phone FROM `orders` INNER JOIN `ordered` ON orders.user_id= ordered.u_id where orders.del_id='$del_id'";
echo "</br></br></br></br>";
echo "<h2 align='center'>Deliveries</h2>";
if($run=mysqli_query($conn,$query3))
{
	if(mysqli_num_rows($run)>=1)
	{
	while($query_row=mysqli_fetch_assoc($run))
	{
		$order_id=$query_row['order_id'];
		$u_id=$query_row['user_id'];
		$location=$query_row['location'];
		$price=$query_row['price'];
		$phone=$query_row['phone'];
		$items[$z]=$query_row['name'];
		$z=$z+1;
	}
	$query8="SELECT `name` from `users` where `id`='$u_id'";
	if($run2=mysqli_query($conn,$query8))
	{
		$row=mysqli_fetch_assoc($run2);
		$u_name=$row['name'];
		echo "<table class='hidden' border='1' style='border-collapse:collapse;margin-left:350px;width:800px;' >";
		echo "<tr><td id='td1'>Order Id: </td><td>".$order_id."</td></tr>";
		echo "<tr><td id='td1'>Customer Name: </td><td>".$u_name."</td></tr>";
		echo "<tr><td id='td1'>Customer contact no: </td><td>".$phone."</td></tr>";
		echo "<tr><td id='td1'>Address: </td><td>".$location."</td></tr>";
		echo "<tr><td rowspan='".$z."' id='td1'>Items Ordered: </td>";
		for($i=0;$i<$z;$i++)
		{
			echo "<td>".$items[$i]."</td></tr>";
		}
		echo "<tr><td id='td1'>Bill Amount: </td><td>".$price."</td></tr>";
	
		echo "</table>";
	}
	}
	else
	{
		echo "<table class='hidden' border='1' style='border-collapse:collapse;margin-left:350px;width:800px;'><tr><td>No Deliveries</td></tr></table>";
		echo "<style>input.hidden{visibility: hidden;}</style>";
	}
	
}
else
{
	echo "<table class='hidden' border='1' style='border-collapse:collapse;margin-left:350px;width:800px;'><tr><td>No Deliveries</td></tr></table>";
}

?>
<form action="run2.php?del=<?php echo $del_id;?>&&d=del" method="post">
	</br></br></br><input type="submit" name="submit" value="Delivered" class="hidden">
</form>
</body>
</html>