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
input
{
	padding: 10px;
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
	font-size: 25px;
	text-align: center;
	padding: 10px;
}
p
{
  text-align: left;
  font-size: 20px;
  margin-left: 60px;
}
form
{
	margin-top: 50px;
	margin-left: 300px;
}

#td1
{
	background-color: grey;
	color: white;
}
h2
{
	margin-left: 300px;
	margin-top: 100px;
}
</style>
</head>
<script type="text/javascript">
	function hello()
{
	alert('Order has been successfully placed');
}
</script>
<body>
<?php
require 'session.php';
require 'conn.php';
if(!isset($_SESSION['c_id'])||empty($_SESSION['c_id'])&&!isset($_GET['a']))
{
	echo "<script>alert('Please login')</script>";
	echo "<script>location.href='user_login.php'</script>";
}
else
{
	 $c_id=$_SESSION['c_id'];
	 $price=$_GET['a'];
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
  <li><a href="vieworder.php??del=<?php echo $c_id;?>&&i=<?php echo $_SESSION['i'];?>" class="active">View Orders</a></li>
  <li><a href="order.php?del=<?php echo $c_id;?>">Order Details</a></li>
  <li><a href="user_logout.php">Logout</a></li>
</ul>
</br></br></br></br>
<h2 align="center">Enter Details</h2>
<form action='details.php?del=<?php echo $c_id; ?>&&a=<?php echo $price; ?>' method=post>
	<table>
		<tr>
			<td>Enter Name: </td>
			<td><input type="text" name="name"></td>
		</tr>
		<tr>
			<td>Enter Phone No: </td>
			<td><input type="text" name="phn"></td>
		</tr>
		<tr>
			<td>Enter Address: </td>
			<td><input type="text" name="location"></td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" name="submit" value="Make Payment"></td>
		</tr>
	</table>

</form>
<?php
if(isset($_POST['name'])&&isset($_POST['phn'])&&isset($_POST['location']))
{
	$_SESSION['order']=1;
	$phone=$_POST['phn'];
	$location=$_POST['location'];
	$query="SELECT `boy_id` FROM `delivery_boy` WHERE `busy`='0' && `l`='0'";
	if($query_run=mysqli_query($conn,$query))
	{

    	if(mysqli_num_rows($query_run)>=1)
    	{
    		while($query_row=mysqli_fetch_assoc($query_run))
    		{
    			$del_id=$query_row['boy_id'];
    			break;
    		}
  			
  			$query7="INSERT INTO `orders` VALUES('','$c_id','$price','$del_id','n','$location','$phone')";
			if($query_run=mysqli_query($conn,$query7))
			{
				$query9="UPDATE `delivery_boy` set `busy`='1' where `boy_id`='$del_id'";
				mysqli_query($conn,$query9);
				$_SESSION['i']=1;
				echo "<script>alert('Order successfully placed');</script>";
				echo "<script>location.href='vieworder.php?del=".$c_id."&&i=".$_SESSION['i']."';</script>";
			}

    	}
	}
	
}
?>
</body>
</html>