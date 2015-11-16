<?php

include "SCS.php";
include "config.php";

if(count($argv) <= 1 )  {
	echo "ERROR\n";
	exit();
}

$scs = new SCS(AccessKey, SecretKey);
$uploadFile = $argv[1];
$bucketName = BUCKETNAME;
$obj = SCS::getAuthenticatedURL($bucketName,$uploadFile,3600);
echo $obj . "\n";
