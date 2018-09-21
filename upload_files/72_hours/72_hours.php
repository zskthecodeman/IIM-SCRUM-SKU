<?php

//time interval for deletion to occur...
$x = 259.200;  //72 hours

//timestamp
$current_time = time();

//the file you wish to delete
$file_name = 'file.txt';

//timestamp
$file_creation_time = filemtime($filename);

//extract difference
$difference = $current_time - $file_creation_time;

//if difference = $x...then delete file
if ($difference >= $x) {
unlink($file_name);
}?>
