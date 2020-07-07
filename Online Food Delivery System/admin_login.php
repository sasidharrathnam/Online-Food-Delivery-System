<!DOCTYPE html>
<html>
<head>
	<title>Online Food Delivery System</title>
	<style type="text/css">
		body
		{
			background-image: url('bg.jpg');
			background-size: 100% 720px;
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
#d2
{
	background-color: grey;
	width: 400px;
	height: 250px;
		margin-left: 550px;

}
td
{
	padding: 10px;
	font-size: 25px;
}
input
{
	padding: 10px;
}
	
#login
{
	width: 90px;
}
table
{
	padding: 30px;
}
div
{
	margin-left: 480px;
}
</style>
</head>
<body>
<?php
require 'session.php';
if(isset($_POST['username'])&&isset($_POST['password']))
{
	$username=$_POST['username'];
	$password=$_POST['password'];
	if(!empty($username)&&!empty($password))
	{

	if($username=='admin'&&$password=='admin')
	{
		$_SESSION['username']=$username;
		echo "<script>location.href='welcome_admin.php';</script>";
	}
	else
	{
		echo "<script>alert('Username/Password incorrect');</script>";
	}

	}
	else
	{
		echo "<script>alert('All fields are required');</script>";
	}

}
?>

<div id="d1"><a href="homepage2.php"><img src="logo.png" width="220px" height="80px" style="float: left;margin-top: 10px;"></a><h1 style="margin-top: 30px;">ONLINE  FOOD  DELIVERY  SYSTEM</h1></div></br></br></br></br></br></br></br></br><h1 align="center" style="color: white;">Admin Login</h1>
<div id="d2" align="center">
<form action="admin_login.php" method="post">
	<table align="center">
		<tr>
			<td>
				Username:
			</td>
			<td>
				<input type="text" name="username" placeholder="username">
			</td>
		</tr>
		<tr>
			<td>
				Password:
			</td>
			<td>
				<input type="password" name="password" placeholder="password">
			</td>
		</tr>
		<tr>
			<td colspan="2" align="center">
				<input type="submit" name="submit" value="Login"  id="login">
			</td>
		</tr>
	</table>
</form>
</div>
</body>
</html>