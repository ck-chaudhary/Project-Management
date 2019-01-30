</div>
    </div>
  </div>
  </div>
  <?php //<!<div class="col-sm-3">
   // <!<div class="container">
   
if (logged_in()==false)
{

?>
      <div class="sidenav">
      
   	<h2 class="bigbox2" style="text-align:right;">Register&nbsp;&nbsp;</h2><p class="rightbox"><b>Stay Connected and work together for a better tomorrow!</b></p>
	<div>
	  <p><h3 class="bigbox2">Interested to work in Research Based Projects?</h3></p><p class="rightbox"><b>Signup as a student now</b></p>
	  <form action="register.php" method="post">
	  <table>
	    <tr>
	      <td><p class="bigbox3">NAME*</p></td>
	      <td><p><input type="text" class="textbox" name="sname" placeholder="Name"></p></td>
	    </tr>
	    <tr>
	      <td><p class="bigbox3">USER NAME*</p></td>
	      <td><p><input type="text" class="textbox" name="suname" placeholder="User ID"></p></td>
	    </tr>
	    <tr>
	      <td><p class="bigbox3">PASSWORD*</p></td>
	      <td><p><input type="password" class="textbox" name="spwd1" placeholder="Password"></p></td>
	    </tr>
	    <tr>
	      <td><p class="bigbox3">CONFIRM*</p></td>
	      <td><p><input type="password" class="textbox" name="spwd2" placeholder="Password"></p></td>
	    </tr>
	    <tr>
	      <td><p class="bigbox3">EMAIL ID*</p></td>
	      <td><p><input type="text" name="semailid" class="textbox" placeholder="me@someplace.domain"></p></td>
	    </tr>
	    <tr>
	      <td><p class="bigbox3">CONTACT*</p></td>
	      <td><p><input type=text" class="textbox" name="smobile_no" placeholder="+91"></p></td>
	    </tr>
	    <tr>
	      <td><p class="bigbox3">CV</p></td>
	      <td><p><input type="text" class="textbox" name="scv" placeholder="www.someplace.com"></p></td>
	    </tr>
	    
	    <tr>
	      <td><p></p></td>
	      <td><p><input type="submit" class="bigbox2"></p></td>
	    </tr>
	  </table>
	  </form>
	</div>
	<div>
	  <p><h3 class="bigbox2">Guide in Research Based Projects</h3></p><p class="rightbox"><b>Signup as an Advisor now</b></p>
	  <form action="reg_advisor_insert.php" method="post">
	  <table>
	    <tr>
	      <td><p class="bigbox3">NAME*</p></td>
	      <td><p><input type="text" name="aname" placeholder="Name" class="textbox"></p></td>
	    </tr>
	    <tr>
	      <td><p class="bigbox3">USER NAME*</p></td>
	      <td><p><input type="text" name="auname" class="textbox" placeholder="User ID"></p></td>
	    </tr>
	    <tr>
	      <td><p class="bigbox3">PASSWORD*</p></td>
	      <td><p><input type="password" name="apwd1" class="textbox" placeholder="Password"></p></td>
	    </tr>
	    <tr>
	      <td><p class="bigbox3">CONFIRM*</p></td>
	      <td><p><input type="password" name="apwd2" class="textbox" placeholder="Password"></p></td>
	    </tr>
	    <tr>
	      <td><p class="bigbox3">EMAIL ID*</p></td>
	      <td><p><input type="text" name="aemailid" class="textbox" placeholder="me@someplace.domain"></p></td>
	    </tr>
	    <tr>
	      <td><p class="bigbox3">CONTACT*</p></td>
	      <td><p><input type=text" name="amobile_no" class="textbox" placeholder="+91"></p></td>
	    </tr>
	    <tr>
	      <td><p class="bigbox3">CV</p></td>
	      <td><p><input type="text" name="acv" class="textbox" placeholder="www.someplace.com"></p></td>
	    </tr>
	    <tr>
	      <td><p></p></td>
	      <td><p><input class="bigbox2" type="submit"></p></td>
	    </tr>
	  </table>
	  </form>
	</div>
	<!ELSE  __THE OTHER FILE__ WHERE PROFILE IS DISPLAYED>
      <!</div>
    <!</div>
  </div>
  <?php 
}
else {  
 	$user_data_name=user_data_name($_SESSION['user_id'],$user_data['role']);
 	$user_dat=user_details($_SESSION['user_id'],$user_data['role'],'email','mobile_no');
 	$e;
 	$mob;
 	foreach($user_dat as $key=>$value)
 	{
 		if($key=="email")
 			$e=$value;
 			if($key=="mobile_no")
 				$mob=$value;
 	}
 	
	 ?>
  <div class="sidenav">
    <div class="textbox"><a href="#"><h2 color="black"><?php echo $user_data_name ;?></h2></a></div><br>
    <br>
    <p class="rightbox"><?php echo "email: ".$e ;?></p><br><p class="rightbox"><?php echo"mobile no.:". $mob ;?></p>
    <h3 class="textbox">CURRENTLY WORKING ON</h3>
    <?php $uid=$user_data['id'];
    	$titles=fetchProject($uid,$user_data['role']);
    	
    	$title=array();
    	
    	foreach ($titles as $t)
    	{
    		foreach ($t as $key=>$value)
    			$title[]=$value;
    	}
    ?>
    <table> <tr> <td class="bigbox2"> <?php echo output_errors($title)?> </td> </tr> </table>
  </div>
<?php }?>
</body> 
</html> 
