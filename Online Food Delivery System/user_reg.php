<!DOCTYPE html>
<html>
<head>
	<title>Online Food Delivery System</title>
	<link href='s_logo.png' rel='icon' type='image/ico'>
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
	width: 600px;
	height: 600px;
	margin-left: 430px;

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
#reg
{
	width: 90px;
}
table
{
	padding: 30px;
}
div
{
	margin-left: 380px;
}
</style>
</head>
<?php

require 'conn.php';

if(isset($_POST['u_name'])&&isset($_POST['u_ps'])&&isset($_POST['u_cps'])&&isset($_POST['u_email'])&&isset($_POST['u_num'])&&isset($_POST['u_sex'])&&isset($_POST['u_dob']))
{
	$u_name=$_POST['u_name'];
	$u_ps=md5($_POST['u_ps']);
	$u_cps=md5($_POST['u_cps']);
	$u_email=$_POST['u_email'];
	$u_num=$_POST['u_num'];
	$u_sex=$_POST['u_sex'];
	$u_dob=$_POST['u_dob'];
	
		if($u_ps!=$u_cps)
		{
			echo "<script>alert('Passwords should match')</script>";
			echo "<script>location.href='user_reg.php';</script>";
		}
		else
		{
			$query="SELECT `email` FROM `users` WHERE `email`='$u_email'";
			$query_run=mysqli_query($conn,$query);
			if(mysqli_num_rows($query_run)>=1)
			{
				echo "<script>alert('Email already exists')</script>";
			}
			else
			{
				$query="INSERT INTO `users` VALUES('','$u_name','$u_email','$u_dob','$u_sex','$u_num','$u_ps')";
				if(mysqli_query($conn,$query))
				{
					echo "<script>alert('Successfully Registered. Please login with Username and Password')</script>";
					echo "<script>location.href='user_login.php'</script>";
				}
				else
				{
					echo "<script>alert('Error in Registration. Try after some time')</script>";
				}
			}
		}
	

}
?>
<body id="body">
<div id="d1"><h1>Online Food Delivery System</h1></div>
</br></br></br></br></br></br></br></br><h1 align="center" style="color: white;margin-top: -50px;">Registration Form</h1>
<div id="d2" align="center">
<form action="user_reg.php" method="post">
	<table>
		<tr>
			<td>
				Full Name:
			</td>
			<td>
				<input type="text" name="u_name" placeholder="full name" required autofocus pattern="[A-za-z\s]+" title="Name must be in alphabets"> 
			</td>
		</tr>
		<tr>
			<td>
				Email Id:
			</td>
			<td>
				<input type="text" name="u_email" placeholder="Email id" required autofocus pattern="[A-za-z0-9]+@gmail.com" title="Email patten must be followed">
			</td>
		</tr>
		<tr>
			<td>
				Phone no:
			</td>
			<td>
				<input type="text" name="u_num" placeholder="Phone no" required autofocus pattern="[0-9]{10}" title="Phone number must be numerical of 10 digits">
			</td>
		</tr>
		<tr>
			<td>
				Gender:
			</td>
			<td>
				<input type="radio" name="u_sex" value="male" required autofocus>Male
				<input type="radio" name="u_sex" value="female" required autofocus>Female
			</td>
		</tr>
		<tr>
			<td>
				Date of Birth:
			</td>
			<td>
				<input type="Date" name="u_dob" required autofocus>
			</td>
		</tr>
		<tr>
			<td>
				Password:
			</td>
			<td>
				<input type="password" name="u_ps" required autofocus pattern="[A-za-z0-9]{8,}" title="Password should be minimum 8 characters">
			</td>
		</tr>
		<tr>
			<td>
				Confirm Password:
			</td>
			<td>
				<input type="password" name="u_cps" required autofocus pattern="[A-za-z0-9]{8,}" title="Password should be minimum 8 characters">
			</td>
		</tr>
		<tr>
			<td colspan="2"></br></td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="submit" name="register" value="Register" id="reg"></td>
		</tr>
	</table>
</form>
</div>
</body>
</html>