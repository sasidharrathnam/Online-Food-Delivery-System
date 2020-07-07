<?php
require 'admin_applied.php';
require 'conn.php';
if(isset($_GET['a']))
{
	$check=$_GET['a'];
	$user_id=round(rand()*rand()/rand());
	$password=round(rand()*rand()/rand());
	$password_hash=md5($password);
	$z=0;
	echo $z;
	$query3="INSERT INTO `delivery_boy` VALUES('$id[$check]','$name[$check]','$phone[$check]','$gender[$check]','$dob[$check]','$address[$check]','$user_id','$password_hash','$resume_id[$check]','$email[$check]','$z','$z')";
	if(mysqli_query($conn,$query3))
	{
		$query4="DELETE FROM `applied` WHERE `id`='".mysqli_real_escape_string($conn,$id[$check])."'";
		if(mysqli_query($conn,$query4))
		{
			$to=$email[$check];
			$subject='CONGRATULATIONS - TEAM IWP PROJECT';
			$body="Congrats, you got selected to be part of our team. We created your account. Account details are: Username: ".$user_id."  Password: ".$password." .Kindly please login with these details and change the password immediately. Have a great day!! ";
			$headers='From: sasidharr54@gmail.com';
			if(mail($to, $subject, $body, $headers))
			{
				echo "<script>alert('Successful!! Candidate was selected')</script>";
				echo "<script>location.href='admin_applied.php';</script>";
			}
		}
		else
		{
			echo "<script>alert('Error!! Try again after sometime');</script>";
			echo "<script>location.href='admin_applied.php';</script>";
		}
	}
	else
	{
		echo mysqli_error($conn);
	}
}
if(isset($_GET['d']))
{
	$check=$_GET['d'];
	$query3="DELETE FROM `applied` WHERE `id`='".mysqli_real_escape_string($conn,$id[$check])."'";
	if(mysqli_query($conn,$query3))
	{
		echo "<script>alert('Successful!! Candidate was not selected')</script>";
		echo "<script>location.href='admin_applied.php';</script>";
	}
	else
	{
		echo "<script>alert('Error!! Try again after sometime');</script>";
		echo "<script>location.href='admin_applied.php';</script>";
	}
}

?>