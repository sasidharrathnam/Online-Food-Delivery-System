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
	width: 600px;
	height: 620px;

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
	if(isset($_POST['del_name'])&&isset($_POST['del_email'])&&isset($_POST['del_num'])&&isset($_POST['del_dob'])&&isset($_POST['del_address'])&&isset($_FILES['del_resume'])||isset($_POST['del_sex']))
	{
		$del_name=$_POST['del_name'];
		$del_email=$_POST['del_email'];
		$del_num=$_POST['del_num'];
		$del_sex=@$_POST['del_sex'];
		$del_dob=$_POST['del_dob'];
		$del_address=$_POST['del_address'];
		$file=$_FILES['del_resume'];
		$resume_id=round(rand()*rand()/rand());
		$location='resumes/';
		$tmp_name=$_FILES['del_resume']['tmp_name'];
		$file_name=$_FILES['del_resume']['name'];
		$file_name=$resume_id.'.pdf';

		if(!empty($del_name)&&!empty($del_email)&&!empty($del_num)&&!empty($del_sex)&&!empty($del_dob)&&!empty($del_address))
		{
			$query="INSERT INTO `applied` VALUES('','".mysqli_real_escape_string($conn,$del_name)."','".mysqli_real_escape_string($conn,$del_email)."','".mysqli_real_escape_string($conn,$del_num)."','".mysqli_real_escape_string($conn,$del_sex)."','".mysqli_real_escape_string($conn,$del_dob)."','".mysqli_real_escape_string($conn,$del_address)."','".mysqli_real_escape_string($conn,$resume_id)."')";
			if($run=mysqli_query($conn,$query)&&move_uploaded_file($tmp_name, $location.$file_name))
			{
				$to=$del_email;
				$subject='TEAM IWP_PROJECT';
				$body='Thanks for being interested in joining our team. We will verify your resume and details and will send you a official confirmation from our team. Until then, Have a great day.';
				$headers='From: sasidharr54@gmail.com';
				mail($to, $subject, $body, $headers);
				echo "<script>alert('Successfully registered!! We sent you mail and wait for confirmation')</script>";
				echo "<script>location.href='delivery_login.php';</script>";
			}
			else
			{
				echo "<script>alert('Error!Try after some time')</script>";
			}
		}
		else
		{
			echo "<script>alert('All fields are required')</script>";
		}
	}
	

?>

<body>
<div id="d1"><h1>Online Food Delivery System</h1></div>
</br></br></br></br></br></br></br></br><h1 align="center" style="color: white;">Registration Form</h1>
<div id="d2" align="center">
<form action="delivery_reg.php" method="post" enctype="multipart/form-data">
	<table>
		<tr>
			<td>
				Full Name:
			</td>
			<td>
				<input type="text" name="del_name" placeholder="full name">
			</td>
		</tr>
		<tr>
			<td>
				Email Id:
			</td>
			<td>
				<input type="text" name="del_email" placeholder="Email id">
			</td>
		</tr>
		<tr>
			<td>
				Phone no:
			</td>
			<td>
				<input type="text" name="del_num" placeholder="Phone no">
			</td>
		</tr>
		<tr>
			<td>
				Gender:
			</td>
			<td>
				<input type="radio" name="del_sex" value="male">Male
				<input type="radio" name="del_sex" value="female">Female
			</td>
		</tr>
		<tr>
			<td>
				Date of Birth:
			</td>
			<td>
				<input type="Date" name="del_dob">
			</td>
		</tr>
		<tr>
			<td>
				Address:
			</td>
			<td>
				<textarea name="del_address" rows="4" cols="22" placeholder="Type here"></textarea>
			</td>
		</tr>
		<tr>
			<td>
				Upload Resume:
			</td>
			<td>
				<input type="file" name="del_resume" multiple="false" style="padding: 10px;">
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