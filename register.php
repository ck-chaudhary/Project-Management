<br><br><br><br><br><br><br><br><br><br><br>
<head>
<link rel="stylesheet" type="text/css" href="styling.css">
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<div class="col-sm-4">&nbsp;</div><div class="col-sm-4" style="background-color:#e5edff;"><br><br>
<?php
include 'init.php';

/*foreach ($_POST as $key=>$value)
{
	echo $key." ".$value."<br>";
}

$name=explode(" ", $_POST['sname']);
$middle_name=array_slice($name, 1,sizeof($name)-2);

$m_name=implode(" ", $middle_name);
echo $m_name;
*/



if(empty($_POST)==false)
{
		$required_fields=array('sname','suname','spwd1','spwd2','semailid','smobile_no');
		foreach ($_POST as $key=>$value)
		{
			if (empty($value) && in_array($key, $required_fields))
			{
				$errors[]='Fields marked with an asterisk are required!!';
				break;
			}
		}
		
		if (empty($errors))
		{
			if (preg_match("/(\\s) | (\.*)/", $_POST['suname'])==true)
				$errors[]='Your username must not contain space and asterisk';
			
			if(user_exists($_POST['suname'])==true)
			{
				$errors[]='Sorry, the username \''.$_POST['suname'].'\' is already taken!!';
			}
			
			if (strlen($_POST['spwd1'])<6)
			{
				$errors[]='Your password must be atleast 6 characters!!';
			}
		
			
			if($_POST['spwd1']!==$_POST['spwd2'])
				$errors[]='Your passwords do not match!!';
			
			if(filter_var($_POST['semailid'],FILTER_VALIDATE_EMAIL)===false)
					$errors[]='A valid email address is required';
			if(email_exists($_POST['semailid']))
					$errors[]='Sorry, the email \''.$_POST['semailid'].'\' is already in use!!';
			
		}
}

if (isset($_GET['success']) && empty($_GET['success']))
{

echo '<h3>You\'ve been registered successfully!!</h3>';
?>
<a href="index.php">Click here </a> to login!!
<?php 
}
else
{
	if (empty($_POST)==false && empty($errors)==true)
	{
		$register_data=array('username'=>$_POST['suname'],'password'=>$_POST['spwd1'],'email_code'=>md5($_POST['suname']+microtime()),'role'=>0,'email'=>$_POST['semailid']);
		register_user_login($register_data);
		
		$id=user_id_from_username($_POST['suname']);
		$name=explode(" ", $_POST['sname']);
		$middle_name=array_slice($name, 1,sizeof($name)-2);
		
		$m_name=implode(" ", $middle_name);
			
			
		$register_data_student=array('s_id'=>$id,'email'=>$_POST['semailid'],'mobile_no'=>$_POST['smobile_no'],'first_name'=>$name[0],'last_name'=>$name[sizeof($name)-1],'middle_name'=>$m_name,'CV'=>$_POST['scv']);
		register_user_student($register_data_student);
		header('Location:register.php?success');
	}
	else if (!empty($errors))
	{
		?>
		<h2 class="bigbox4"><p class="rightbox">Oops..</p></h2><br>
		<?php 
		echo output_errors($errors);?>
		<p class="highbox2" style="font-size: 125%"><a href="index.php"><b>Click here</b></a> to register again!</p>
		<?php 
	}
	
	
}

include 'index.php';
?>
	
