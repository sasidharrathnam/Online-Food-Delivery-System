<!DOCTYPE html>
<html>
<head>
<style>

#d1
{
	padding: 5px;
	background-color: powderblue;
	text-align: center;
	margin-top: 0px;
	width: 80%;
	margin-left: 110px;

}
ul {
  list-style-type: none;
  margin-top: 0px;
  padding: 0;
  overflow: hidden;
  background-color: #333;
  width: 80.7%;
  margin-left: 110px;

}

li {
  float: left;
  font-size: 20px;
}

li a, .dropbtn {
  display: inline-block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover, .dropdown:hover .dropbtn {
  background-color: red;
}

li.dropdown {
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {background-color: #f1f1f1;}

.dropdown:hover .dropdown-content {
  display: block;
}
#d9
{
	margin-left: 160px;
	width: 1100px;
	height: 500px;
	background-image: url('bg.jpg');
	background-size: 100% 100%;
	animation-name: example;
	animation-duration: 15s;
	animation-iteration-count: infinite;

}
@keyframes example {
  0%  {background-image:url('bg.jpg');}  
  25% {background-image:url('dosa.jpeg');}
  50% {background-image:url('chicken.jpeg');}
  75% {background-image:url('puff.jpeg');}
  100%{background-image:url('bg.jpg');}
}
</style>
<link href='s_logo_1.png' rel='icon' type='image/ico'>
</head>
<body>

<div id="d1"><a href="homepage2.php"><img src="logo.png" width="220px" height="80px" style="float: left;"></a><h1>ONLINE  FOOD  DELIVERY  SYSTEM</h1></div>

<ul>
  <li><a href="homepage2.php">Home</a></li>
  <li><a href="homepage2.php">About us</a></li>
  <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">Login</a>
    <div class="dropdown-content">
      <a href="user_login.php">User Login</a>
      <a href="delivery_login.php">Delivery Boy</a>
      <a href="admin_login.php">Admin Login</a>
    </div>
  </li>
</ul>
<div id="d9" align="center"></div>
</br></br></br>
</body>
</html>
