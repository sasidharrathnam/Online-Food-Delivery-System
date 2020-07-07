<?php
require 'conn.php';
require 'session.php';
if(isset($_GET['table'])||isset($_GET['p'])&&isset($_GET['del']))
{
	$c_id=$_GET['del'];
	$q5="SELECT `del_id` from `orders` where `user_id`='$c_id'";
	$row2=mysqli_query($conn,$q5);
	$r=mysqli_fetch_assoc($row2);
	$del_id=$r['del_id'];
	$q="DELETE FROM `ordered` where `u_id`='$c_id'";
	$q2="DELETE FROM `orders` where `user_id`='$c_id'";
	$q7="UPDATE `delivery_boy` set `busy`='0' where `boy_id`='$del_id'";
	mysqli_query($conn,$q7);
	if(mysqli_query($conn,$q)&&mysqli_query($conn,$q2))
	{
		if($_GET['p']=='d')
		{
			echo "<script>location.href='deliveries.php';</script>";
		}
		echo "<script>location.href='vieworder.php';</script>";
	}
	if(isset($_SESSION['order']))
	{
		if($_SESSION['order']==1)
		{
			unset($_SESSION['order']);
		}
	}
}
if(isset($_GET['i'])&&isset($_GET['del'])&&isset($_GET['type']))
{
	
	$type=$_GET['type'];
	$typevar=$type.'.php';
	require $typevar;
	$i=$_GET['i'];
	$c_id=$_GET['del'];
	$query13="INSERT INTO `ordered` VALUES('','$id[$i]','$name[$i]','$cost[$i]','$c_id')";
	if(mysqli_query($conn,$query13))
	{
		echo "<script>alert('Item is added in cart');</script>";
		echo "<script>location.href='".$type.".php?del=".$c_id."';</script>";
	}
}
if(isset($_GET['del'])&&isset($_GET['d']))
{
	$del_id=$_GET['del'];
	$query="UPDATE `delivery_boy` set `busy`='0' where `boy_id`='$del_id'";
	$query3="SELECT `user_id` FROM `orders` where `del_id`='$del_id'";
	$run=mysqli_query($conn,$query3);
	$row=mysqli_fetch_assoc($run);
	$user_id=$row['user_id'];
	$query2="DELETE FROM `orders` where `del_id`='$del_id'";
	mysqli_query($conn,$query);
	mysqli_query($conn,$query2);
	$query4="DELETE FROM `ordered` where `u_id`='$user_id'";
	if(mysqli_query($conn,$query4))
	{
		echo "<script>location.href='deliveries.php?del=".$del_id."'</script>";
	}
		
}
?>