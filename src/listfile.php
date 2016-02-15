<?php

include "SCS.php";
include "config.php";

$scs = new SCS(AccessKey, SecretKey);
$bucketName = BUCKETNAME;
$contents = $scs->getBucket($bucketName,PREFIX);
$all_size = 0;
$index = 0;

foreach($contents as $file){
	$all_size += $file['size'];
	//var_dump($file);
	echo str_pad($index++  . ". "  .  $file['name'], 64 ,".") . $file['size'] .  "\n";
}

echo "All file size: " . $all_size . "\n";
