<?php
session_start();
header('Content-type:image/jpeg');

$text=$_SESSION['secure'];

$font_size=30;
$image_width=120;
$image_height=40;

$image=imagecreate($image_width, $image_height);
imagecolorallocate($image, 255, 255, 255);
$textcolor=imagecolorallocate($image, 0, 0, 0);

for($x=1;$x<=20;$x++)
{
	$x1=rand(1,100);
	$x2=rand(1,100);
	$y1=rand(1,100);
	$y2=rand(1,100);
	imageline($image, $x1, $y1, $x2, $y2, $textcolor);
}

imagettftext($image, $font_size, 0, 15, 30, $textcolor, 'font.TTF', $text);
imagejpeg($image);

?>

