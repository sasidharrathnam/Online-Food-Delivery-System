<?php
require 'session.php'; 
if(isset($_SESSION['username']))
{
	session_destroy();
	header('Location: admin_login.php');
}
else
{
	header('Location: admin_login.php');

}

?>