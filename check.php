<?php
include 'init.php';
$user_data_name=user_data_name($_SESSION['user_id'],$user_data['role']);
echo $user_data_name;
echo $user_data['role'];
echo $_SESSION['user_id'];