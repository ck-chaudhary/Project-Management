<?php

include 'init.php';

global $connection;
$mode_allowed=array('author','invest');
if(isset($_GET['mode']) && in_array($_GET['mode'],$mode_allowed))
{
	$mode=$_GET['mode'];
	$project=$_GET['project'];
	
	if($mode=='author')
	{
		if(isset($_POST['nauthor']))
		{
			$uname=$_POST['nauthor'];
			if(user_exists($_POST['nauthor']))
			{
				
				$pid=get_pid($project);
				
				$gid=get_gid($pid);
				
				
				$uid=user_id_from_username($uname);
				
				if($gid !=false)
				{
					$data=user_data($uid,'role');
					
					foreach ($data as $key=>$value)
					{
						if($key=="role")
						{
							$role=$value;
						}
					}
					
					if($role=="0")
					{
						
						$st_g=student_group($gid);
						
						mysqli_query($connection, "Insert into `s_g_rel` (`s_id`,`stud_g_id`) values ($uid,$st_g)");
						
					}
					else if($role=="1")
					{
						$ad_g=advisor_group($gid);
						mysqli_query($connection, "Insert into `a_g_rel` (`a_id`,`adv_g_id`) values ($uid,$ad_g)");	
					}
					header('Location:index.php');
				}
				else
				{
					$data=user_data($uid,'role');
					foreach ($data as $key=>$value)
					{
						if($key=="role")
						{
							$role=$value;
						}
					}
				}
				
				
			}
			else 
			{
				echo 'User doesn\'t exists';
			}
		}
		
	}
	
	if ($mode=='invest')
	{
		if (isset($_POST['ninvest']))
		{
			//
		}
	}
}
?>