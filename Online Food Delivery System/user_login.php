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
	height: 300px;
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
	width: 80px;
}
#login
{
	width: 110px;
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
<?php
require 'conn.php';
require 'session.php';
if(isset($_POST['email'])&&isset($_POST['password']))
{
	echo $c_username=$_POST['email'];
	echo $c_password=$_POST['password'];
	echo $c_pass_hash=md5($c_password);
	if(!empty($c_username)&&!empty($c_password))
	{
		$query9="SELECT `id` FROM `users` WHERE `email`='".mysqli_real_escape_string($conn,$c_username)."' AND `password`='".mysqli_real_escape_string($conn,$c_pass_hash)."'";
		if($run2=mysqli_query($conn,$query9))
		{
			if(mysqli_num_rows($run2)==1)
			{
				$query_row=mysqli_fetch_assoc($run2);
				$c_id=$query_row['id'];
				$_SESSION["c_id"]=$c_id;
				$_SESSION['i']=0;
				echo "<script>location.href='welcome_user.php?del=".$c_id."';</script>";
				
			}
			elseif(mysqli_num_rows($run2)==NULL)
			{
				echo "<script>alert('Incorrect Username/Password')</script>";
				echo "<script>location.href='user_login.php'</script>";					
			}
		}
		else
		{
			echo "<script>alert('Error!Try after some time')</script>";
		}

	}
}
?>
<body>

<div id="d1"><a href="homepage2.php"><img src="logo.png" width="220px" height="80px" style="float: left;margin-top: 10px;"></a><h1 style="margin-top: 30px;">ONLINE  FOOD  DELIVERY  SYSTEM</h1></div></br></br></br></br></br></br></br></br><h1 align="center" style="color: white;">User Login</h1>
<div id="d2" align="center">
<form action="user_login.php" method="post">
	<table>
		<tr>
			<td>
				Email:
			</td>
			<td>
				<input type="text" name="email" placeholder="Email">
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
				<input type="submit" name="submit" value="Login" id="login">
			</td>
		</tr>
		<tr>
			<td colspan="2" align="center">
				<input type="button" name="reg" value="New Registration" id="#reg" onclick="location.href='user_reg.php';">
			</td>
		</tr>
	</table>
</form>
</div>
</body>
</html>