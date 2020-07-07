<!DOCTYPE html>
<html>
<head>
<style>
		
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
	margin-top: 0px;
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
<?php
require 'conn.php';
require 'session.php';
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
<body>
<div id="d1"><h1>Online Food Delivery System</h1></div>
<div>
<ul>
  <li><a href="welcome_delivery.php?del=<?php echo $del_id;?>" class="active">Home</a></li>
  <li><a href="del_profile.php?del=<?php echo $del_id;?>">Profile</a></li>
  <li><a href="deliveries.php?del=<?php echo $del_id;?>">View Deliveries</a></li>
  <li><a href="delivery_logout.php">Logout</a></li>
</ul>
</div></br>
</br></br></br></br><div id="d7">
  <?php
  if(isset($_SESSION['del_id']))
{
  $query="SELECT `name` FROM `delivery_boy` WHERE `boy_id`='$_SESSION[del_id]'";
  $query_run=mysqli_query($conn,$query);
  $query_row=mysqli_fetch_assoc($query_run);
  $del_name=$query_row['name'];
  echo "</br><h2>Welcome ".$del_name.". This is your Profile page</h2>";
}
else
{
  echo "<script>location.href='delivery_login.php'</script>";
}
  ?>
</div>
</body>
</html>
