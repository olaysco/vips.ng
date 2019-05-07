<?php
session_start();
require_once 'inc/database.inc.php';
$operation_type = $_POST['opetration_type']??'';



if($operation_type == 'register')
{
	$db = new database();
	$expected_keys = ['full_name', 'email', 'phone_number', 'password'];
	$success = true;
	foreach($expected_keys as $key)
	{
		$success = array_key_exists($key,$_POST);
	}

	if(!$success)
	{
		header('location:formpage.html?error=fill in all required fields');
	}
	else 
	{
		header('location:login.php?success='.$db->register($_POST));
	}

}
else if($operation_type == 'login')
{
	$db = new database();
	$expected_keys = ['email','password'];
	$success = true;
	foreach($expected_keys as $key)
	{
		$success = array_key_exists($key,$_POST);
	}
	if(!$success)
	{
		header('location:login.php?error=fill in all details');
	}
	else 
	{
		$log = $db->login($_POST);
		if($log)
		{
			$user = $db->fetchUser($log[0]['id']);
			$_SESSION['user'] = base64_encode(serialize($user));
			header('location:dashboard/pages/profile.php');
			
		}else
		{
			echo 'failed';
		}
	}
	
}
else
{
	die('invalid access to script');
}




?>
