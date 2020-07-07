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

#r
{
    margin-left: 500px;
    margin-top: 20px;
}
table
{
  margin-left: 350px;
}
td
{
  padding: 50px;
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
	margin-left: 20%;
	background-color: blue;
	width: 700px;
	height: 700px;
}
p
{
  text-align: left;
  font-size: 20px;
  margin-left: 60px;
}
</style>
</head>
<body>
<?php
require 'session.php';
require 'conn.php';
if(!isset($_SESSION['c_id'])||empty($_SESSION['c_id']))
{
	echo "<script>alert('Please login')</script>";
	echo "<script>location.href='user_login.php'</script>";
}
else
{
   $c_id=$_SESSION['c_id'];
   if(isset($_SESSION['i']))
   {
      $po=$_SESSION['i'];
      $po=0;
   }
}
?>
<div id="d1"><h1>Online Food Delivery System</h1></div>
<div>
<ul>
  <li><a href="welcome_user.php?del=<?php echo $c_id;?>">Profile</a></li>
  <li><a href="place_orders.php?del=<?php echo $c_id;?>" class="active">Place Orders</a></li>
  <li><a href="vieworder.php?del=<?php echo $c_id;?>&&i=<?php echo $_SESSION['i'];?>">View Orders</a></li>
  <li><a href="order.php?del=<?php echo $c_id;?>">Order Details</a></li>
  <li><a href="user_logout.php">Logout</a></li>
</ul>
</br></br></br></br>
<table>
  <tr>
    <td>
      <a href="nonveg.php?del=<?php echo $c_id;?>"><img src="chicken.jpeg" width="200px" height="200px"></a>
      <p><b>Non Veg</b></p>
    </td>
    <td>
       <a href="breakfast.php?del=<?php echo $c_id;?>"><img src="idli.jpeg" width="200px" height="200px"></a>
       <p><b>Break Fast</b></p>
    </td>
    <td>
      <a href="starter.php?del=<?php echo $c_id;?>"><img src="starter.jpg" width="200px" height="200px"></a>
      <p><b>Starters</b></p>
    </td>
  </tr>
  <tr>
    <td>
      <a href="beverages.php?del=<?php echo $c_id;?>"><img src="beverages.jpg" width="200px" height="200px"></a>
       <p><b>Beverages</b></p>
    </td>
    <td>
       <a href="veg.php?del=<?php echo $c_id;?>"><img src="veg.jpg" width="200px" height="200px"></a>
       <p><b>Vegetarian</b></p>
    </td>
    <td>
      <a href="fastfood.php?del=<?php echo $c_id;?>"><img src="fastfood.jpg" width="200px" height="200px"></a>
       <p><b>Fast Foods</b></p>
    </td>
  </tr>
</table>  
</body>
</html>