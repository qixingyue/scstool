<?php

include "SCS.php";
include "config.php";

if(count($argv) <= 1 )  {
	echo "ERROR\n";
	exit();
}

$uploadFile = $argv[1];
if(!file_exists($uploadFile)) {
	echo "FILE NOT EXIST\n";
	exit();
}

$scs = new SCS(AccessKey, SecretKey);
$bucketName = BUCKETNAME;
$m = $scs->putObjectFile($uploadFile, $bucketName, PREFIX . baseName($uploadFile), SCS::ACL_PUBLIC_READ);
var_dump($m);
