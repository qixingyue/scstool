<?php

include "SCS.php";
include "config.php";

if(count($argv) <= 1 )  {
	echo "ERROR\n";
	exit();
}

$ttl = isset($argv[2]) ? $argv[2] : 3600 ;

$scs = new SCS(AccessKey, SecretKey);
$uploadFile = $argv[1];
$bucketName = BUCKETNAME;

if(preg_match("/\d+/",$uploadFile) > 0 ) {
	$m = k_run_time("files");
	$uploadFile = $m[$uploadFile]["name"];
}


$obj = SCS::getAuthenticatedURL($bucketName,$uploadFile,$ttl);

echo "DOWNLOAD URL IS : \n";

echo $obj . "\n";

