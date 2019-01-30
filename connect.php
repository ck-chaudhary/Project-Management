<?php
$connect_error='Sorry! we are experiencing problems.\nTry again later';

$connection=@mysqli_connect('localhost','root','','Project') or die($connect_error);

?>