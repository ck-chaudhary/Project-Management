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
	
		if(isset($_POST['lname']) && isset($_POST['password']))
	{
		$username=$_POST['lname'];
		$password=$_POST['password'];
		$captcha = $_SESSION['secure'];
		
		if(!empty($username) && !empty($password))
		{
			if(user_exists($username)==false)
			{
				$errors[]='We can\'t find that username!!<br>Have you registered?';
			}
			else if(user_active($username)==false)
			{
				$errors[]='You haven\'t activated your account!!';
			}
			else if (strlen($password) > 32)
				$errors[]='Password too long!!';
			else if ($_POST['captcha']!=$_SESSION['secure'])
				$errors[]='Captcha incorrect!!';
			
				else
				{
					
					$login=login($username, $password);
					
					if($login==false)
					{
						$errors[]='Invalid username or password!!';
					}
					else
					{
						$_SESSION['user_id']=$login;
						$_SESSION['start'] = time();
						$_SESSION['expire'] = $_SESSION['start'] + (20 * 60);
						
						header('Location:index.php');
						exit();
					}
				}
				
		}
		else 
		{
			$errors[]='You need to enter username and password!!';   
		}
		
		
	}
	
	if(empty($errors)===false)
	{
	

?>

<h2 class="bigbox4"><p class="rightbox">We tried to log you in, but ...</p></h2><br>
<div style="font-size: 150%">
<?php 
    echo output_errors($errors);

?>
</div>
<?php 
 
$_SESSION['secure']=rand(1000,9999);

	}
	?>
	
	<p class="highbox2" style="font-size: 125%"><a href="index.php"><b>Click here</b></a> to login!</p>
	<?php 

include 'index.php';

?>
</div><div class="col-sm-4"></div>
	
	


