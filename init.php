<?php
session_start();
$lifetime = strtotime('+20 minutes', 0);
	
session_set_cookie_params($lifetime);



error_reporting(0);
require  'connect.php';
require 'functions.php';

$errors=array();
if(logged_in()===true)
{
	$session_user_id=$_SESSION['user_id'];
	$user_data=user_data($session_user_id,'id','username','password','role');
	if (user_active($user_data['username'])===false)
	{
		session_destroy();
		header('Location:index.php');
		exit();
	}
	if(time() > $_SESSION['expire'])
	{
		session_destroy();
		session_unset();
		echo "Your session has expired!\t<a href='index.php'>Login here</a>";
	}
	/*if($user_data['role']==0)
	{
		header('Location:index.php');
	}
	else if($user_data['role']==1)
	{
		header('Location:index.php');
	}*/
}
else
{
	
}


?>
