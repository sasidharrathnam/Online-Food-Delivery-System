<?php
require 'conn.php';
require 'session.php';
if(isset($_SESSION['del_id']))
{
	session_destroy();
	header('Location: delivery_login.php');
}
else
{
	header('Location: delivery_login.php');

}
?>