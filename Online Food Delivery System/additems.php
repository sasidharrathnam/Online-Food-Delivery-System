<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
    td
    {
      font-size: 20px;
      padding: 10px;
    }
    input
    {
      padding: 10px;
    }
    select
    {
      padding: 10px;
      width: 185px;
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
	margin-top: 0px;
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
</style>
</head>
<body>
<?php
require 'session.php';
require 'conn.php';
if(!isset($_SESSION['username'])||empty($_SESSION['username']))
{
	echo "<script>alert('Please login')</script>";
	echo "<script>location.href='admin_login.php'</script>";
}
if(isset($_POST['category'])&&isset($_POST['item_q'])&&isset($_POST['item_name'])&&isset($_POST['item_cost']))
{
  $category=$_POST['category'];
  $item_q=$_POST['item_q'];
  $item_name=$_POST['item_name'];
  $item_cost=$_POST['item_cost'];
  if(!empty($category)&&!empty($item_q)&&!empty($item_name)&&!empty($item_cost))
  {
    $quer11="INSERT INTO `$category` VALUES('','$item_name','$item_cost','$item_q')";
    if(mysqli_query($conn,$quer11))
    {
      echo "<script>alert('Item successully added in Database');</script>";
      echo "<script>location.href='additems.php';</script>";
    }
    else
    {
      echo mysqli_error($conn);
    }
  }
}
?>


<div id="d1"><a href="homepage2.php"><img src="logo.png" width="220px" height="80px" style="float: left;"></a><h1>ONLINE  FOOD  DELIVERY  SYSTEM</h1></div>
<div>
<ul>
  <li><a href="welcome_admin.php">Home</a></li>
  <li><a href="additems.php"  class="active">Add Items</a></li>
  <li><a href="admin_applied.php">Show Applied Candidates</a></li>
  <li><a href="admin_logout.php">Logout</a></li>
</ul>
</br></br></br></br>
<div>
  <form action="additems.php" method="post">
  <table style="margin-left: 600px;margin-top:80px;padding: 20px; ">
    <tr>
      <td>
        Category:
      </td>
      <td>
        <select name="category">
          <option value="nonveg">Non Veg</option>
          <option value="veg">Veg</option>
          <option value="breakfast">Break Fast</option>
          <option value="starter">Starters</option>
          <option value="fastfoods">Fast Foods</option>
          <option value="beverages">Beverages</option>
        </select>
      </td>
    </tr>
    <tr>
      <td>
        Item Name:
      </td>
      <td>
        <input type="text" name="item_name" placeholder="Item Name">
      </td>
    </tr>
    <tr>
      <td>
        Cost:
      </td>
      <td>
        <input type="text" name="item_cost" placeholder="Cost">
      </td>
    </tr>
    <tr>
      <td>
        Quantity:
      </td>
      <td>
        <input type="text" name="item_q" placeholder="quantity">
      </td>
    </tr>
    <tr>
      <td colspan="2" align="center"></br><input type="submit" name="submit" value="Add Items"></td>
    </tr>
  </table>
  </form>
</div>
</body>
</html>