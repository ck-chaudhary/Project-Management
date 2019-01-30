<?php
include 'functions.php';
include 'connect.php';
$errors=array();
foreach ($_POST as $key=>$value)
{

	echo $key." ".$value."<br>";
}

    $a=$_REQUEST["paim"];
	$b=$_REQUEST["ptitle"];
	$c=$_REQUEST["pfield"];
	$d=$_REQUEST["pdept"];
	
	if(empty($_POST)==false)
	{
  
	$query="insert into project(name,field,dept,status,history_to)values('$b','$c','$d','0','null')";
 	$res=mysqli_query($connection,$query) or die($query."<br/><br/>".mysql_error());
 	if(!$res)
 		$errors[]='failed to add this project!!';
 	

 

 
 	//finding p_id from project for current project
 	if(empty($errors)){
 	$pid ;
 	$sql = "select p_id from project order by p_id DESC LIMIT 1";
 	$result = $connection->query($sql);
 	
 	if ($result->num_rows > 0) {
 		// output data of each row
 		while($row = $result->fetch_assoc()) {
 			echo "id: " . $row["p_id"]. "<br>";
 			$pid=$row["p_id"];
 		}
 	} else {
 		$errors[]='failed to assign a new project id for this project!!';
 	}
 	
 	}
 	
 	if(empty($errors))
 	{
 	$query="insert into groups(p_id)values('$pid')";
 	$res=mysqli_query($connection,$query) or die($query."<br/><br/>".mysql_error());
 	if($res)
 		echo "inserted sucessfully into groups"."<br>";
 		else
 			$errors[]='unable to add project in group!!';
 	}
 		
 	if(empty($errors))
 	{
 	$gid ;	
 	$sql = "select g_id from groups order by g_id DESC LIMIT 1";
 	$result = $connection->query($sql);
		if ($result->num_rows > 0) {
 				// output data of each row
 				while($row = $result->fetch_assoc()) {
 			   		echo "id: " . $row["g_id"]. "<br>";
 					$gid=$row["g_id"];
 				}
 			} else {
 				$errors[]='error in finding out group id!!';
 				
 			}
 	}
 			
 			foreach ($_POST as $key=>$value)
 			{
 				echo $key." ".$value."<br><br><br>";
 				echo substr_compare($key, "adv", 0);
 				
 				if (substr_compare($key, "adv", 0,3,false)==0)
 				{
 					$query="insert into advisor_group(g_id)values('$gid')";
 					$res=mysqli_query($connection,$query) or die($query."<br/><br/>".mysql_error());
 					if(!$res)
 					
 							$errors[]='failed to insert gid  into advisor_group!!';
 						
 							$advgid ;
 							$sql = "select adv_g_id from advisor_group order by g_id DESC LIMIT 1";
 							$result = $connection->query($sql);
 							if ($result->num_rows > 0) {
 								// output data of each row
 								while($row = $result->fetch_assoc()) {
 									echo "adv_g_id: " . $row["adv_g_id"]. "<br>";
 									$advgid=$row["adv_g_id"];
 								}
 							} else {
 								$errors[]='failed to find out  advisor  group id!!';
 								
 							}
 							
 							$aid ;
 							echo $value."<br>";
 							$sql = "select id from login where username='$value' and role='1'";
 							$result = $connection->query($sql);
 							if ($result->num_rows > 0) {
 								// output data of each row
 								while($row = $result->fetch_assoc()) {
 									//echo "aid: " . $row["id"]. "<br>";
 									$aid=$row["id"];
 								}
 							} else {
 								
 								
 								$errors[]=$value.'username  has not been registered as advisor  yet.Please register first!!! ';
 								
 							}
 							
 							
 							$query="insert into a_g_rel(adv_g_id,a_id)values('$advgid','$aid')";
 							$res=mysqli_query($connection,$query) or die($query."<br/><br/>".mysql_error());
 							if(!$res)
 								$errors[]='failed to insert into  a_g_rel!!';
 				}
 				
 				
 				else if (substr_compare($key, "stu", 0,3,false)==0)
 				{
 					$query="insert into student_group(g_id)values('$gid')";
 					$res=mysqli_query($connection,$query) or die($query."<br/><br/>".mysql_error());
 					if(!$res)
 						$errors[]='failed to add this project!!';
 							
 							$studgid ;
 							$sql = "select stud_g_id from student_group order by g_id DESC LIMIT 1";
 							$result = $connection->query($sql);
 							if ($result->num_rows > 0) {
 								// output data of each row
 								while($row = $result->fetch_assoc()) {
 									echo "stud_g_id: " . $row["stud_g_id"]. "<br>";
 									$studgid=$row["stud_g_id"];
 								}
 							} else {
 								$errors[]='failed to add this project!!';
 								
 							}
 							
 							$sid ;
 							echo $value."<br>";
 							$sql = "select id from login where username='$value' and role='0'";
 							$result = $connection->query($sql);
 							if ($result->num_rows > 0) {
 								// output data of each row
 								while($row = $result->fetch_assoc()) {
 									echo "sid: " . $row["id"]. "<br>";
 									$sid=$row["id"];
 								}
 							} else {
 								
 								
 								$errors[]=$value.' username  has not been registered as student  yet.Please register first!!! ';
 								
 							}
 							
 							
 							$query="insert into s_g_rel(stud_g_id,s_id)values('$studgid','$sid')";
 							$res=mysqli_query($connection,$query) or die($query."<br/><br/>".mysql_error());
 							if(!$res)
 								$errors[]='failed to add this project!!';
 				}
 				
 				
 			}
	}
	
	
	if (isset($_GET['success']) && empty($_GET['success']))
		echo 'project have been added successfully!!';
	else {
		if (!empty($errors))
		{
			echo output_errors($errors);
		}
		
		else 
			header("location:index.php");
			
	}
 	
 	
 			
 		
 	
 	
//  	$query="select p_id from project order by p_id DESC LIMIT 1";
//  	$res=mysqli_query($connection,$query);
//  $ans=mysql_fetch_array($res);
//  $a_id=$ans['p_id'];
// echo $a_id;

?>
