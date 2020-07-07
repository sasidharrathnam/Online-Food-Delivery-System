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
td
{
  padding: 10px;
  font-size: 25px;
}
input
{
  padding: 10px;
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
  <li><a href="welcome_delivery.php?del=<?php echo $del_id;?>" >Home</a></li>
  <li><a href="del_profile.php?del=<?php echo $del_id;?>" class="active">Profile</a></li>
  <li><a href="deliveries.php?del=<?php echo $del_id;?>">View Deliveries</a></li>
  <li><a href="delivery_logout.php">Logout</a></li>
</ul>
</div></br>
</br></br></br></br><div id="d7">
<?php

if(isset($_POST['un'])&&isset($_POST['pn'])&&isset($_POST['cpn']))
{
  $un=$_POST['un'];
  $pn=$_POST['pn'];
  $cpn=$_POST['cpn'];
  if(!empty($un)&&!empty($pn)&&!empty($cpn))
  {
     if($pn==$cpn)
     {
      $pn_hash=md5($pn);
      $query="SELECT `username` FROM `delivery_boy` WHERE `username`='$un'";
      $query_run=mysqli_query($conn,$query);
      if(mysqli_num_rows($query_run)>=1)
      {
        echo "<script>alert('Username already exists')</script>";
         echo "<script>location.href='del_profile.php?del=".$del_id."'</script>";
      }
      else
      {
        $query="UPDATE `delivery_boy` SET `username`='$un',`password`='$pn_hash' WHERE `boy_id`='$del_id'";
        if($query_run=mysqli_query($conn,$query))
        {
          echo "<script>alert('Successfully Updated.')</script>";
          echo "<script>location.href='del_profile.php?del=".$del_id."'</script>";
        }
        else
        {
          echo "<script>alert('Error in Registration. Try after some time')</script>";
                    echo "<script>location.href='del_profile.php?del=".$del_id."'</script>";

        }
      }
     }
     else
     {
      echo "<script>alert('Passwords must match');</script>";
                echo "<script>location.href='del_profile.php?del=".$del_id."'</script>";

     }
  }
}
?>
</div>
<h2 align="center">Update Password</h2>
<form method="post" action="del_profile.php">
  <table style="margin-left: 550px;">
    <tr>
      <td>
        Enter New Username:
      </td>
      <td>
        <input type="text" placeholder="username" name="un">
      </td>
    </tr>
    <tr>
      <td>
        Enter New Password:
      </td>
      <td>
        <input type="password" placeholder="password" name="pn">
      </td>
    </tr>
    <tr>
      <td>
        Confirm Password:
      </td>
      <td>
        <input type="password" placeholder="confirm password" name="cpn">
      </td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="submit" value="Update"></td>
    </tr>
  </table>
</form>
</br>
<!-- <h2 align="center">Apply Leave</h2>
<form>
  <table style="margin-left: 550px;">
    <tr><td>Enter Reason: </td><td><input type="text" name="reason"></td></tr>
    <tr><td>From Date: </td><td><input type="date" name="from"></td></tr>
    <tr><td>To Date: </td><td><input type="date" name="to"></td></tr>
    <tr><td colspan="2" align="center"><a href="run2.php?del=<?php echo $del_id;?>&&l=1"><input type="button" name="leave" value="Submit Leave"></a></td></tr>
  </table>
</form> -->
</body>
</html>
