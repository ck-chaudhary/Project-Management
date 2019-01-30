<?php
function logged_in()
{
	return (isset($_SESSION['user_id']))?true:false;
}

function user_id_from_username($username)
{
	global $connection;
	$username=sanitize($username);
	$query=mysqli_query($connection, "Select `id` from `login` where `username`='$username'");
	$result=mysqli_fetch_row($query);
	
	return $result[0];
}

function email($to, $subject,$body)
{
	mail($to, $subject, $body, 'From:hello@gmail.com');
	
}

function register_user_advisor($register_data)
{
	global $connection;
	
	
	array_walk($register_data, 'array_sanitize');
	
	$fields='`'.implode('`,`', array_keys($register_data)).'`';
	$data='\''.implode('\',\'', $register_data).'\' ';
	
	mysqli_query($connection, "Insert into `advisor` ($fields) values ($data)");
	
}


function login($username, $password)
{
	global $connection;
	$user_id=user_id_from_username($username);
	$username=sanitize($username);
	$password=md5($password);
	$query=mysqli_query($connection, "Select count(`id`) from `login` where `username`='$username' and `password`='$password'");
	$result=mysqli_fetch_row($query);
	return ($result[0]==1)?$user_id:false;
}

function get_gid($pid)
{
	
	global $connection;
	$query=mysqli_query($connection, "Select count(`g_id`) from `groups` where `p_id`=$pid");
	$result=mysqli_fetch_row($query);
	
	if($result[0]!=0)
	{
		$query=mysqli_query($connection, "Select `g_id` from `groups` where `p_id`=$pid");
		$result=mysqli_fetch_row($query);
		
		return $result[0];
	}
	else return false;
}

function get_pid($name)
{
	global $connection;
	$query=mysqli_query($connection, "Select `p_id` from `project` where `name`='$name'");
	$result=mysqli_fetch_row($query);
	return $result[0];
	
}

function  email_exists($email)
{
	
	global $connection;
	$email=sanitize($email);
	$query=mysqli_query($connection , "Select count(`id`) from `login` where `email`='$email'");
	$result=mysqli_fetch_row($query);
	
	$result=$result[0];
	return ($result==1)?true:false;
}

function  user_data($user_id)
{
	global $connection;
	$data=array();
	$user_id=(int)$user_id;
	$func_num_args=func_num_args();
	$func_get_args=func_get_args();
	if($func_num_args>1)
	{
		unset($func_get_args[0]);
		$fields='`'.implode('`,`', $func_get_args).'`';
		$data=mysqli_fetch_assoc(mysqli_query($connection, "Select $fields from `login` where `id`=$user_id"));
		return $data;
	}
}

function  user_data_name($user_id,$role)
{
	global $connection;
	
	$user_id=(int)$user_id;
	
	
		if($role==0)
		$data=mysqli_fetch_row(mysqli_query($connection, "Select concat(`first_name`,' ',`middle_name`,' ',`last_name`)as name from `student` where `s_id`=$user_id"));
		
		else if($role==1)
			$data=mysqli_fetch_row(mysqli_query($connection, "Select concat(`first_name`,' ',`middle_name`,' ',`last_name`)as name from `advisor` where `a_id`=$user_id"));
		
		return $data[0];
	
}

function get_title($pid)
{
	global $connection;
	$data=array();
	$p_id=implode(' ,', array_map('intval', $pid));
	$data=mysqli_fetch_assoc(mysqli_query($connection, "Select * from `project` where `p_id` in ($p_id)"));
	return $data;
}

function student_group($gid)
{
	global $connection;
	$query=mysqli_query($connection, "Select `stud_g_id` from `student_group` where `g_id`=$gid");
	$result=mysqli_fetch_row($query);
	return $result[0];
}

function advisor_group($gid)
{
	global $connection;
	$query=mysqli_query($connection, "Select `adv_g_id` from `advisor_group` where `g_id`=$gid");
	$result=mysqli_fetch_row($query);
	return $result[0];
}

function fetchstudent($pid)
{

	global $connection;
	$query="Select `s_id`,concat(`first_name`,\" \",`middle_name`,\" \",`last_name`) as `name` from `student_relation` where `p_id`=$pid";
	$result=mysqli_query($connection , $query);
	//$data[]=mysqli_fetch_assoc($result);
	$data=array();
	while($row=mysqli_fetch_assoc($result))
	{
		$data[]=array('s_id'=>$row['s_id'],'name'=>$row['name']);
	}
	return $data;
}

function fetchadvisor($pid)
{

	global $connection;
	$query="Select `a_id`,concat(`first_name`,\" \",`middle_name`,\" \",`last_name`) as `name` from `advisor_relation` where `p_id`=$pid";
	$result=mysqli_query($connection , $query);
	//$data[]=mysqli_fetch_assoc($result);
	$data=array();
	while($row=mysqli_fetch_assoc($result))
	{
		$data[]=array('a_id'=>$row['a_id'],'name'=>$row['name']);
	}
	
	return $data;
}

function fetchProject($uid,$role)
{
	global $connection;
	if($role=='0')
	{
		$query="Select `name` from `student_relation` where `s_id`=$uid and `status`='0'";
	}
	else if($role=='1')
	{
		$query="Select `name` from `advisor_relation` where `a_id`=$uid and `status`='0'";
	}
	
	$result=mysqli_query($connection , $query);
	$data=array();
	while($row=mysqli_fetch_assoc($result))
	{
		$data[]=array('name'=>$row['name']);
	}
	
	return $data;
}


function fetchProjectAll($uid,$role)
{
	global $connection;
	if($role=='0')
	{
		$query="Select `name` from `student_relation` where `s_id`=$uid";
	}
	else if($role=='1')
	{
		$query="Select `name` from `advisor_relation` where `a_id`=$uid";
	}
	
	$result=mysqli_query($connection , $query);
	$data=array();
	while($row=mysqli_fetch_assoc($result))
	{
		$data[]=array('name'=>$row['name']);
	}
	
	return $data;
}

function get_project_details($title)
{
	global  $connection;
	$query=mysqli_query($connection , "Select * from `project` where `name`= '$title'");
	$result=mysqli_fetch_assoc($query);
	return $result;
}

function user_details($user_id ,$user_role)
{
	global $connection;
	
	$data=array();
	$user_id =(int)$user_id;
	$func_num_args=func_num_args();
	$func_get_args=func_get_args();
	if($user_role=='0')
		$table="student";
	else $table ="advisor";
	if ($func_num_args >2)
	{
		unset($func_get_args[0]);
		unset($func_get_args[1]);
		$fields='`'.implode('`,`', $func_get_args).'`';
		if($table=="student")
		$data=mysqli_fetch_assoc(mysqli_query($connection, "Select $fields from `student_relation` where `s_id`=$user_id"));
		
		else 
			$data=mysqli_fetch_assoc(mysqli_query($connection, "Select $fields from `advisor_relation` where `a_id`=$user_id"));
			
		return $data;
	}
}

function logged_in_redirect()
{
	if(logged_in()===true)
	{
		header('Location:index.php');
		exit();
	}
}

function protect_page()
{
	if(logged_in()===false)
	{
		header('Location:protected.php');
		exit();
	}
}

function array_sanitize(&$item)
{
	global $connection;
	$item=htmlentities(strip_tags(mysqli_real_escape_string($connection, $item)));
}

function  user_exists($username)
{
	global $connection;
	
	$username=sanitize($username);
	$query=mysqli_query($connection , "Select count(`id`) from `login` where `username`='$username'");
	$result=mysqli_fetch_row($query);
	$result=$result[0];
	return ($result==1)?true:false;
}



function output_errors($errors)
{
	
	return '<ul><li>'.implode('</li><li>', $errors).'</li></ul>';
}

function user_active($username)
{
	global $connection;
	$username=sanitize($username);
	$query=mysqli_query($connection, "Select count(`id`) from `login` where `username`='$username' and `active`=1");
	$result=mysqli_fetch_row($query);
	$result=$result[0];
	
	return ($result==1)?true:false;
}

function  sanitize($data)
{
	global $connection;
	return htmlentities(strip_tags(mysqli_real_escape_string($connection, $data)));
}

function register_user_login($register_data)
{
	global $connection;
	array_walk($register_data, 'array_sanitize');
	$register_data['password']=md5($register_data['password']);
	
	$fields='`'.implode('`,`', array_keys($register_data)).'`';
	$data='\''.implode('\',\'', $register_data).'\' ';
	
	mysqli_query($connection, "Insert into `login` ($fields) values ($data)");
	//email($register_data['email'], 'Activate your account.', "Hello".$register_data['first_name'].",You need to activate your account, so use the link below:\n\nhttp://localhost/PHP_Practice/LoginRegister/activate.php?email=".$register_data['email']."&email_code=".$register_data['email_code']."\n\n-myWebsite.org");
}

function register_user_student($register_data)
{
	global $connection;
	
	
	array_walk($register_data, 'array_sanitize');
	
	$fields='`'.implode('`,`', array_keys($register_data)).'`';
	$data='\''.implode('\',\'', $register_data).'\' ';
	
	mysqli_query($connection, "Insert into `student` ($fields) values ($data)");
	
}

function getRole($email)
{
	global $connection;
	$userrole=mysqli_fetch_row(mysqli_query($connection, "Select `role` from `login` where `email`=$email"));
	return $userrole[0];
}

function recover($mode,$email)
{
	$mode=sanitize($mode);
	$email=sanitize($email);
	$role=getRole($email);
	$user_data=user_details(user_id_from_email($email),$role,'user_id','first_name','username');
	if($mode='username')
	{
		email($email, 'Your username', "Hello ".$user_data['first_name']." ,\n\n Your username is <strong>".$user_data['username']."</strong>\n\nmyWebsite.org");
	}
	else if ($mode=='password') {
		$generated_password=substr(md5(rand(9999,999999)), 0,8);
		change_password($user_data['user_id'], $generated_password);
		update_user($user_data['user_id'], array('password_recover'=>'1'));
		//email($email, 'Your password recovery', "Hello ".$user_data['first_name']." ,\n\n Your new password is <strong>".$generated_password."</strong>\n\nPlease login using this password to change your password.\n\nmyWebsite.org");
	}
}

function user_id_from_email($email)
{
	global $connection;
	$email=sanitize($email);
	
	$query=mysqli_query($connection, "Select `id` from `login` where `email`='$email'");
	$result=mysqli_fetch_row($query);
	
	return $result[0];
}

function change_password($user_id,$password)
{
	global $connection;
	$user_id=(int)$user_id;
	$password=md5($password);
	mysqli_query($connection, "Update `users` set `password`='$password' where `id`=$user_id");
}

