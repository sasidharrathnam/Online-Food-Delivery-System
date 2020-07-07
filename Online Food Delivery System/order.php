<!DOCTYPE html>
<html>
<head>
	<title></title>
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
</style>
</head>
<body>


<?php
require 'session.php';
require 'conn.php';
if(!isset($_SESSION['c_id'])||empty($_SESSION['c_id']))
{
	echo "<script>alert('Please login')</script>";
	echo "<script>location.href='user_login.php'</script>";
}
else
{
	 $c_id=$_SESSION['c_id'];
	 if(isset($_SESSION['i']))
   {
      $po=$_SESSION['i'];
      $po=0;
   }
}
?>
<div id="d1"><h1>Online Food Delivery System</h1></div>
<div>
<ul>
  <li><a href="welcome_user.php?del=<?php echo $c_id;?>">Profile</a></li>
  <li><a href="place_orders.php?del=<?php echo $c_id;?>">Place Orders</a></li>
  <li><a href="vieworder.php?del=<?php echo $c_id;?>&&i=<?php echo $_SESSION['i'];?>">View Orders</a></li>
  <li><a href="order.php?del=<?php echo $c_id;?>" class="active">Order Details</a></li>
  <li><a href="user_logout.php">Logout</a></li>
</ul>
</br></br></br></br>
<?php
$z=0;
$items=array();
$del_id=0;
$order_id=0;
$location=0;
$price=0;
$status=0;
$query3="SELECT orders.order_id, orders.del_id, orders.location, orders.price, ordered.name,orders.status FROM `orders` INNER JOIN `ordered` ON orders.user_id= ordered.u_id where orders.user_id='$c_id'";
echo "</br></br></br></br>";
echo "<h2 align='center' class='hidden'>Order Details</h2>";
if($run=mysqli_query($conn,$query3))
{
	if(mysqli_num_rows($run)!=NULL)
	{
	while($query_row=mysqli_fetch_assoc($run))
	{
		$order_id=$query_row['order_id'];
		$del_id=$query_row['del_id'];
		$location=$query_row['location'];
		$price=$query_row['price'];
		$status=$query_row['status'];
		$items[$z]=$query_row['name'];
		$z=$z+1;
	}
	if($status=='n')
	{
		$msg='Not yet delivered';
	}
	$query8="SELECT `name`,`phone` from `delivery_boy` where `boy_id`='$del_id'";
	if($run2=mysqli_query($conn,$query8))
	{
		$row=mysqli_fetch_assoc($run2);
		$del_name=$row['name'];
		$del_phone=$row['phone'];
		echo "<table class='hidden' border='1' style='border-collapse:collapse;margin-left:350px;width:800px;' >";
		echo "<tr><td id='td1'>Order Id: </td><td>".$order_id."</td></tr>";
		echo "<tr><td id='td1'>Delivery Boy: </td><td>".$del_name."</td></tr>";
		echo "<tr><td id='td1'>Delivery Boy contact no: </td><td>".$del_phone."</td></tr>";
		echo "<tr><td id='td1'>Delivered at: </td><td>".$location."</td></tr>";
		echo "<tr><td rowspan='".$z."' id='td1'>Items Ordered: </td>";
		for($i=0;$i<$z;$i++)
		{
			echo "<td>".$items[$i]."</td></tr>";
		}
		echo "<tr><td id='td1'>Bill Amount: </td><td>".$price."</td></tr>";
		echo "<tr><td id='td1'>Status: </td><td>".$msg."</td></tr>";
		echo "</table>";
	}
	}
	else
	{
		echo "<table class='hidden' border='1' style='border-collapse:collapse;margin-left:350px;width:800px;'><tr><td>No Orders</td></tr></table>";
	}
	
	
}

?>
</body>
</html>