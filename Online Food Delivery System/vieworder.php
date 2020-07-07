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
	function hello()
{
	alert('Order will be delivered within 30 min');
}
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
  <li><a href="place_orders.php?del=<?php echo $c_id;?>">Place Orders</a></li>
  <li><a href="vieworder.php?del=<?php echo $c_id;?>&&i=<?php echo $_SESSION['i'];?>" class="active">View Orders</a></li>
  <li><a href="order.php?del=<?php echo $c_id;?>">Order Details</a></li>
  <li><a href="user_logout.php">Logout</a></li>
</ul>
</br></br></br></br>

<?php

$id=array('h1');
$name=array('h2');
$cost=array('h3');
$list=1;
$amount=0;
$_SESSION['order']=0;
echo "<form action='vieworder.php?del=".$c_id."&&i=".$_SESSION['i']."' method='post'><table border='1' width='700px' style='border-collapse:collapse;'><tr><td id='td1'>Item Name</td><td id='td1'>Cost/item</td></tr>";
$query12="SELECT * FROM `ordered` WHERE `u_id`='$c_id'";
if($r=mysqli_query($conn,$query12))
{
	if((mysqli_num_rows($r)!=NULL))
	{
		while($query_row=mysqli_fetch_assoc($r))
		{
			$id[$list]=$query_row['item_id'];
			$name[$list]=$query_row['name'];
			$cost[$list]=$query_row['cost'];
			$list=$list+1;
		}
		for($i=0;$i<sizeof($id)-1;$i++)
		{
			echo "<tr><td>".$name[$i+1]."</td><td>".$cost[$i+1]."</td>";
			$amount=$amount+$cost[$i+1];
		}
	}
	else
	{
		echo "<tr><td colspan='4' align='center'>No results found</td></tr>";
		echo "<style>tr.hidden{visibility: hidden;}</style>";
		echo "<style>table.hidden,h2.hidden{visibility: hidden;}</style>";
	}
	if(isset($_GET['i']))
	{
		if($_GET['i']==1)
			{ echo "<style>tr#i5{visibility: hidden;}</style>";}
	}

}
echo "<tr><td colspan='2' align='center'>Bill: Total amount is $amount</td></tr>";
echo "<tr class='hidden'><td colspan='2'><a href='run2.php?table=1&&del=".$c_id."&&i=".$_SESSION['i']."'><input type='button' value='Cancel Order' name='co'></a></td></tr>";
echo "<tr class='hidden' id='i5'><td colspan='2'><a href='details.php?del=".$c_id."&&a=".$amount."'><input type='button' value='Place Order' name='mp' class='hidden'></a></td></tr>";
echo "</table></form>";



?>
</body>
</html>