<?php
require 'conn.php';
require 'session.php';
if(isset($_SESSION['c_id'])&&isset($_SESSION['order']))
{
	unset($_SESSION['c_id']);
	unset($_SESSION['order']);
	header('Location: user_login.php');
}
else
{
	header('Location: user_login.php');

}
?>