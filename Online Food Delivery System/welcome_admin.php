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
if(!isset($_SESSION['username'])||empty($_SESSION['username']))
{
	echo "<script>alert('Please login')</script>";
	echo "<script>location.href='admin_login.php'</script>";
}
?>

<div id="d1"><h1>Online Food Delivery System</h1></div>
<div>
<ul>
  <li><a href="welcome_admin.php" class="active">Home</a></li>
  <li><a href="additems.php">Add Items</a></li>
  <li><a href="admin_applied.php">Show Applied Candidates</a></li>
  <li><a href="admin_logout.php">Logout</a></li>
</ul>
</br></br></br></br>
<div id="d7"><h2>Hello Admin!! Everything is working fine</h2></div>
</body>
</html>