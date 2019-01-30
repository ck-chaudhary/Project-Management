<?php
include 'functions.php';
include 'connect.php';

// foreach ($_POST as $key => $value) {
// 	echo $key." ".$value; 
// 	?> 
 	</br> 
 	<?php
// }

$error = array();
    $a=$_REQUEST["aname"];
	$b=$_REQUEST["auname"];
	$c=$_REQUEST["apwd1"];
	$d=$_REQUEST["apwd2"];
    $e=$_REQUEST["aemailid"];
	$f=$_REQUEST["amobile_no"];
	$g=$_REQUEST["acv"];

if (empty($errors))
		{
			if (preg_match("/(\\s) | (\.*)/", $_POST['auname'])==true)
				$errors[]='Your username must not contain space and asterisk';
			
			if(user_exists($_POST['auname'])==true)
			{
				$errors[]='Sorry, the username \''.$_POST['auname'].'\' is already taken!!';
			}
			
			if (strlen($_POST['apwd1'])<6)
			{
				$errors[]='Your password must be atleast 6 characters!!';
			}
			
			if($_POST['apwd1']!==$_POST['apwd2'])
				$errors[]='Your passwords do not match!!';
			
			if(filter_var($_POST['aemailid'],FILTER_VALIDATE_EMAIL)===false)
					$errors[]='A valid email address is required';
			if(email_exists($_POST['aemailid']))
					$errors[]='Sorry, the email \''.$_POST['aemailid'].'\' is already in use!!';
			
		}


if (isset($_GET['success']) && empty($_GET['success']))
	echo 'You\'ve been registered successfully!!';
else
{
	if (empty($_POST)==false && empty($errors)==true)
	{
		$register_data=array('username'=>$_POST['auname'],'password'=>$_POST['apwd1'],'email_code'=>md5($_POST['auname']+microtime()),'role'=>1,'email'=>$_POST['aemailid']);
		register_user_login($register_data);
		
		$id=user_id_from_username($_POST['auname']);
		$name=explode(" ", $_POST['aname']);
		$middle_name=array_slice($name, 1,sizeof($name)-2);
		
		$m_name=implode(" ", $middle_name);
			
			
		$register_data_advisor=array('a_id'=>$id,'email'=>$_POST['aemailid'],'mobile_no'=>$_POST['amobile_no'],'first_name'=>$name[0],'last_name'=>$name[sizeof($name)-1],'middle_name'=>$m_name,'CV'=>$_POST['acv']);
		register_user_advisor($register_data_advisor);
		header('Location:index.php?success');
	}
	else if (!empty($errors))
	{
		echo output_errors($errors);
	}

}





// 	$s=split(' ',$a);
// 	$l=count($s);
// 	//echo "lengthofname=\n".$l."<br>";
// 	foreach ($s as $key => $value) {
// 		echo $value." <br>";
// 	}
// 	$middlename="";
// 	$fname=$s[0];
// 	$lname=$s[$l-1];
// 	for ($i=1; $i<($l-1); $i=$i+1) { 
// 		$middlename=$middlename.$s[$i];
// 		//echo "index=".$i."middle_name="."$middlename"."</br>";
// 	}

// 	    $connection=mysql_connect("localhost","root","password")or die("unable to connect to server");
// 	$db=mysql_select_db("pdbms_new",$connection)or die("database not found");








// //password re-entry vlidation
// 	if($c==$d)
// {
// 	$pass=$c;
// 	$query="insert into login(username,password,role,active,emailcode)values('$b','$c')";
// 	$res=mysql_query($query);
// 	if($res)
// 	{
// 	echo "DATA sucessfully inserted";
// 	}
// 	else
// 	{
// 	echo "some error found";
// 	}

// $sql="select id from login where username='$b' AND password='$c'";
// $res=mysql_query($sql) or die($sql."<br/><br/>".mysql_error());
// $ans=mysql_fetch_array($res);
// $a_id=$ans['id'];
// //echo $a_id;
// $a_id=$a_id." ";

// $query="insert into advisor(uname,password,a_id,dept,CV,email,mobile_no,first_name,middle_name,last_name) values('$b','$c','$a_id','$h','$g','$e','$f','$fname','$middlename','$lname')";
// $res=mysql_query($query) or die($query."<br/><br/>".mysql_error());
// if($res){
// 	echo "data sucessfully inserted in advisor table";
// }
// else
// echo "some error found";	
// }
		
// 	else
// 		echo "password entering error\n";
	
	



?>