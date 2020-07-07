<!DOCTYPE html>
<html>
<head>
	<title>Online Food Delivery System</title>
	<style type="text/css">
		td
		{
			text-align: center;
			padding: 10px;
		}

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
#php
{
	float: center;
	margin-left: 400px;
}
#td1
{
	background-color: grey;
	color: white;
}
</style>
</head>

<body>

<div id="d1"><h1>Online Food Delivery System</h1></div>
<div>
<ul>
  <li><a href="welcome_admin.php">Home</a></li>
  <li><a href="additems.php">Add Items</a></li>
  <li><a href="admin_applied.php" class="active">Show Applied Candidates</a></li>
  <li><a href="admin_logout.php">Logout</a></li>
</ul>
</div>
</br></br></br></br>
<div id="php">
<h2>Applied Candidates</h2>
<?php
require 'conn.php';
require 'session.php';
require 'global.php';
if(isset($_SESSION['username']))
{

$query="SELECT `id`,`name`,`resume_id`,`phone`,`email`,`gender`,`dob`,`address` FROM `applied`";
$list=1;
$id=array('h1');
$name=array('h2');
$resume_id=array('h3');
$phone=array('h4');
$email=array('h5');
$gender=array('h6');
$dob=array('h7');
$address=array('h8');
$directory='resumes';
$new=opendir($directory.'/');

echo "<table border='1' width='700px' style='border-collapse:collapse;'><tr><td id='td1'>id</td><td id='td1'>Full Name</td><td id='td1'>Resume</td><td id='td1'>Select</td></tr>";
if($query_run=mysqli_query($conn,$query))
{
	if(mysqli_num_rows($query_run)!=NULL)
	{
		while($query_row=mysqli_fetch_assoc($query_run))
		{
			$id[$list]=$query_row['id'];
			$name[$list]=$query_row['name'];
			$resume_id[$list]=$query_row['resume_id'];
			$phone[$list]=$query_row['phone'];
			$email[$list]=$query_row['email'];
			$gender[$list]=$query_row['gender'];
			$dob[$list]=$query_row['dob'];
			$address[$list]=$query_row['address'];
			$list=$list+1;
		}
		for($i=0;$i<sizeof($name)-1;$i++)
		{
			echo "<tr><td>".($i+1)."</td><td>".$name[$i+1]."</td>";
			while($file=readdir($new))
			{
				if($file!="."&&$file!=".."&&$file=$resume_id[$i+1].'.pdf')
				{
					echo "<td><a href=".$directory."/".$file.">".$file."</a></td>";
					break;
				}
			}
			echo "<td><a href='run.php?a=".($i+1)."'><input type='button' value='Accept'></a>&nbsp<a href='run.php?d=".($i+1)."'><input type='button' value='Decline'></a></td></tr>";
		}
	}
	else
	{
		echo "<tr><td colspan='4' align='center'>No results found</td></tr>";
	}
}
else
{
	echo "<script>alert('Error!Try after some time');</script>";
}
echo "</table>";
}
else
{
	echo "<script>location.href='admin_login.php';</script>";
}

?>
</div>
</body>
</html>