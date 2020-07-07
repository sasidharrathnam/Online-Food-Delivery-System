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
}
</style>
</head>
<script type="text/javascript">
	var num;
</script>
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
  <li><a href="place_orders.php?del=<?php echo $c_id;?>" class="active">Place Orders</a></li>
  <li><a href="vieworder.php?del=<?php echo $c_id;?>&&i=<?php echo $_SESSION['i'];?>">View Orders</a></li>
  <li><a href="order.php?del=<?php echo $c_id;?>">Order Details</a></li>
  <li><a href="user_logout.php">Logout</a></li>
</ul>
</br></br></br></br>

<?php

$id=array('h1');
$name=array('h2');
$cost=array('h3');
$quantity=array('h4');
$select=array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
$list=1;

echo "<form action='veg.php' method='post'><table border='1' width='700px' style='border-collapse:collapse;'><tr><td id='td1'>id</td><td id='td1'>Item Name</td><td id='td1'>Cost/item</td><td id='td1'>Select</td></tr>";
$query12="SELECT * FROM `veg`";
if($r=mysqli_query($conn,$query12))
{
	if(mysqli_num_rows($r)!=NULL)
	{
		while($query_row=mysqli_fetch_assoc($r))
		{
			$id[$list]=$query_row['v_id'];
			$name[$list]=$query_row['name'];
			$cost[$list]=$query_row['cost'];
			$quantity[$list]=$query_row['quantity'];
			$list=$list+1;
		}
		for($i=0;$i<sizeof($id)-1;$i++)
		{
			echo "<tr><td>".$id[$i+1]."</td><td>".$name[$i+1]."</td><td>".$cost[$i+1]."</td>";
			echo "<td><a href='run2.php?del=".$c_id."&i=".$id[$i+1]."&type=veg'><input type='button' name='add' value='Add to Cart'></a></td></tr>";
		}
	}
	else
	{
		echo "<tr><td colspan='4' align='center'>No results found</td></tr>";
	}
}
echo "</table>";
?>
</body>
</html>