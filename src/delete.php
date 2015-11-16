<?php

include "SCS.php";
include "config.php";

if(count($argv) <= 1 )  {
	echo "ERROR\n";
	exit();
}

$bucketName = BUCKETNAME ;

date_default_timezone_set('UTC');
$scs = new SCS(AccessKey, SecretKey);
$m = $scs->deleteObject($bucketName,$argv[1]);
var_dump($m);
