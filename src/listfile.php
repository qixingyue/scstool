<?php

include "SCS.php";
include "config.php";

$scs = new SCS(AccessKey, SecretKey);
$bucketName = BUCKETNAME;
$contents = $scs->getBucket($bucketName,PREFIX);
var_dump(array_keys($contents));
