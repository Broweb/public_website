<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
    $filename = 'images/' . $_GET['file_name'];
    $max_width = $_GET['max_width'];


// Content type
header('Content-Type: image/jpeg');

// Get new sizes
list($width, $height) = getimagesize($filename);
if ($width > $max_width){
	$percent = round($width/$max_width,4);
	$newwidth = round($width / $percent,0);
	$newheight = round($height / $percent,0);
	//echo  $percent." ".$newwidth." ".$newheight;
}else{
	$newwidth = $width ;
	$newheight = $height;
}

// Load
$thumb = imagecreatetruecolor($newwidth, $newheight);
$source = imagecreatefrompng($filename);

// Resize
imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

// Output
imagejpeg($thumb);
    //echo "huh".$url;
?>