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
  margin-left: 30%;
  margin-top: 5%;
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
  <li><a href="welcome_user.php?del=<?php echo $c_id;?>" class="active">Profile</a></li>
  <li><a href="place_orders.php?del=<?php echo $c_id;?>">Place Orders</a></li>
  <li><a href="vieworder.php?del=<?php echo $c_id;?>&&i=<?php echo $_SESSION['i'];?>">View Orders</a></li>
  <li><a href="order.php?del=<?php echo $c_id;?>">Order Details</a></li>
  <li><a href="user_logout.php?del=<?php echo $c_id;?>">Logout</a></li>
</ul>
</br></br></br></br></br>
<div id="d7">
  <?php
  if(isset($_SESSION['c_id']))
{
  $query="SELECT `name` FROM `users` WHERE `id`='$_SESSION[c_id]'";
  $query_run=mysqli_query($conn,$query);
  $query_row=mysqli_fetch_assoc($query_run);
  $user_name=$query_row['name'];
  echo "</br><h2>Welcome ".$user_name.". This is your Profile page</h2>";
}
else
{
  echo "<script>location.href='user_login.php'</script>";
}
  ?>
</div>
</body>
</html>