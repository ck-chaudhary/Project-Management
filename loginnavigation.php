    <?php if(logged_in()==false)
    {?>
    <div class="col-sm-4"><form action="login.php" method="post" style="overflow:hidden;">
    <h5 class="bigbox3 btn-group-justified">LOGIN</h5>
    <table><tr><td><input type="text" name="lname" class="textbox btn-group-justified" placeholder="User ID"></td>
    <td><input type="password" name ="password" class="textbox btn-group-justified" placeholder="Password"></td></tr>
    <?php if (!isset($_POST['captcha']))
    {
    	$_SESSION['secure']=rand(1000,9999);
    }
    ?>
    <tr><td><img alt="" src="captcha.php" /></td>
    <td><input type="text" name ="captcha" class="textbox btn-group-justified" placeholder="Captcha here"></td></tr></table>
    <input type="submit" class="bigbox4 btn-group-justified" value="LOGIN"><table><tr>
    <tr><td><a href="recover.php?mode=username" class="bigbox3 btn-group-justified">Forgot username?</a></td><td><a href="recover.php?mode=password" class="bigbox3 btn-group-justified">Forgot Password?</a></td></tr></table>
    </form></div>
<?php 
    }
    else {
    	?><br><br>
    	<div class="col-sm-4">
    	<form action="logout.php" method = "post"><input type="submit" class ="bigbox2" value = "LOGOUT"></form>
    	</div>
    	<?php 
    }

?>

    