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

include 'functions.php';
logged_in_redirect();
include 'connect.php';
if (isset($_GET['success'])==true && empty($_GET['success'])==true)
{
	?>
	<h1 class="bigbox4"> Thanks, we've emailed you!!</h1>
<?php 
}
else 
{	 
	$mode_allowed=array('username','password');
	if (isset($_GET['mode'])==true && in_array($_GET['mode'],$mode_allowed))
	{
		if (isset($_POST['email'])==true && empty($_POST['email'])==false)
		{
			if (email_exists($_POST['email']))
			{
				
				recover($_GET['mode'], $_POST['email']);
				header('Location:recover.php?success');
				exit();
			}
			else {
				echo '<h1 class=\"bigbox3\">Oops, wecouldn\'t find that email address!</h1>';
			}
		}
		?><p class="rightbox">Please enter your email address</p>
            <form action="" method="post">
            <table class="table">
            	<tr><td><input type="text" name="email" class="textbox btn-group-justified"></td>
            	<td><input type="submit" value="Recover" class="bigbox2 btn-group-justified"></td></tr>
            
            </table>
            </form>
            
            <?php 
        }
        else {
            
            header('Location:index.php');
            exit();
        }
    }

?>

</div><div class="col-sm-4">&nbsp;</div>
