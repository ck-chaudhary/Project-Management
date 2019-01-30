 <!DOCTYPE html Iteration=2>
<html lang="en">
<?php include 'init.php'; ?>
<?php if(isset($_GET['success']))
{
	echo '<h3 style="color:blue;margin-left:30px;">You have registered successfully!! <br>Activate your account!<br></h3>';
}
?>
<head>
 <style>

    .sidenav {
       height: 100%; /* Full-height: remove this if you want "auto" height */
       width: 25%; /* Set the width of the sidebar */
       position: fixed; /* Fixed Sidebar (stay in place on scroll) */
       z-index: 1; /* Stay on top */
       top: 0; /* Stay at the top */
       right: 0;
       background-color: #d3d3d3; /* Black */
       color: white;
       overflow-x: hidden; /* Disable horizontal scroll */
       overflow-y: scroll;
       padding-top: 20px;
    }

  .bigbox2 {
  	background-color: #111; /*#C0C0C0; */
  	align: right;
  	border: none;
  	color: white;
  	padding: 15px 32px;
  	Text-align: left;
        text-decoration: none;
  	display: inline-block;
  	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  	}

  .bigbox2:hover {
	background-color: white; 
	align: right;
	border: none;
	color: black;
	padding: 15px 32px;
	Text-align: left;
        text-decoration: none;
	display: inline-block;
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  	}
  	  .bigbox4 {
  	background-color: #111; /*#C0C0C0; */
  	align: right;
  	border: none;
  	color: white;
  	padding: 15px 32px;
  	Text-align: center;
        text-decoration: none;
 /* 	display: inline-block;*/
  	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  	}

  .bigbox4:hover {
	background-color: white; 
	align: right;
	border: none;
	color: black;
	padding: 15px 32px;
	Text-align: center;
        text-decoration: none;
/*	display: inline-block;*/
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  	}
  .bigbox3 {
  	background-color: #a9a9a9; /*#C0C0C0; */
  	align: right;
  	border: none;
  	color: black;
  	padding: 15px 32px;
  	Text-align: left;
        text-decoration: none;
 /* 	display: inline-block;*/
  	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  	}

  .bigbox3:hover {
	background-color: black; 
	align: right;
	border: none;
	color: white;
	padding: 15px 32px;
	Text-align: left;
        text-decoration: none;
/*	display: inline-block;*/
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  	}
  .highbox {
  	background-color: #B8CBFF; /*#C0C0C0; */
  	align: right;
  	border: none;
  	color: white;
  	font-weight: bold;
  	padding: 13px 32px;
  	Text-align: center;
        text-decoration: none;
/*  	display: inline-block;*/
 /*  	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);*/
  	}

  .highbox:hover {
	background-color: #E5EDFF; 
	align: right;
	border: none;
	color: #011E70;
	Text-align: center;
        text-decoration: none;
	padding: 13px 32px;
/*	display: outline-block;*/
/*	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);*/
  	}
  .highbox2 {
  	background-color: #E5EDFF; /*#C0C0C0; */
  	align: right;
  	border: none;
  	color: #011E70;
  	padding: 13px 32px;
  	Text-align: center;
	font-weight: bold;
        text-decoration: none;
 /* 	display: inline-block;*/
  /*	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);*/
  	}

  .highbox2:hover {
	background-color: #ffffff; 
	align: right;
	border: none;
	color: #091534;
	padding: 13px 32px;
	Text-align: center;
	font-weight: bold;
        text-decoration: none;
/*	display: inline-block;*/
/*	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);*/
  	}

ul {
    padding:0;
    margin:0 0 20px 0;
    list-style:none;
}

  .textbox {
  	background-color: white; /*#C0C0C0; */
  	align: right;
  	border: none;
  	color: black;
  	padding: 15px 32px;
  	Text-align: left;
        text-decoration: none;
  	display: outline-block;
  	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  	}

  .textbox:hover {
	background-color: #303030; 
	align: right;
	border: none;
	color: white;
	padding: 15px 32px;
	Text-align: left;
        text-decoration: none;
/*	display: inline-block;*/
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  	}
  .rightbox {
  	background-color: #3d3d3d; /*#C0C0C0; */
  	text-align: right;
  	border: none;
  	color: #ededed;
  	padding: 15px 32px;
        text-decoration: none;
 	display: outline-block;
  	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  	}

  .rightbox:hover {
	background-color: black;
	text-align:right; 
	border: none;
	color: white;
	padding: 15px 32px;
        text-decoration: none;
	display: outline-block;
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  	}

  .bigbox1 {
	background-color: #111; /*#C0C0C0; */
	align: right;
	border: none;
	color: white;
	/*padding: 15px 32px;*/
	Text-align: left;
        text-decoration: none;
	display: inline-block;
	font-size: 16px;
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  	}

  .bigbox1:hover {
  		background-color: white; 
  		align: right;
  		border: none;
  		color: black;
/*  		padding: 15px 32px; */
  		Text-align: left;
  	        text-decoration: none;
  		display: inline-block;
  	/*	font-size: 16px;*/
/*		overflow:hidden;*/
  		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  	}

  </style>
<?php 

include 'navigation.php';
include 'loginnavigation.php';
include 'navtabs.php';
include 'tabcontent.php';
include 'registerwidget.php';

?>
    
      
      