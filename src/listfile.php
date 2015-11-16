<?php

include "SCS.php";
include "config.php";

$scs = new SCS(AccessKey, SecretKey);
$bucketName = BUCKETNAME;
$contents = $scs->getBucket($bucketName,PREFIX);

foreach($contents as $file){
	echo $file['name'] . "\n";
}
