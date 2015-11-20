<?php

include "SCS.php";
include "config.php";

$scs = new SCS(AccessKey, SecretKey);
$bucketName = BUCKETNAME;
$contents = $scs->getBucket($bucketName,PREFIX);

foreach($contents as $file){
	//var_dump($file);
	echo str_pad($file['name'], 64 ,".") . $file['size'] .  "\n";
}
