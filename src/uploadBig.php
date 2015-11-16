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

SCS::setAuth(AccessKey, SecretKey);

$bucket = BUCKETNAME;

$object =  PREFIX . basename($uploadFile);
$file = $uploadFile;
$fp = fopen($file, 'rb');

//初始化上传
$info = SCS::initiateMultipartUpload($bucket, $object, SCS::ACL_PUBLIC_READ);

$uploadId = $info['upload_id'];

$fp = fopen($file, 'rb');

$i = 1;

$part_info = array();
$piece_size = 1024 * 512;

while (!feof($fp)) {
	$udata = SCS::inputResourceMultipart($fp, $piece_size , $uploadId, $i);
	$res = SCS::putObject($udata, $bucket, $object);
	if (isset($res['hash']))
	{	
		echo 'Part: ' . $i . " OK! \n";
		$part_info[] = array(
			'PartNumber' => $i,
			'ETag' => $res['hash'],
		);
		$i++;
	} else {
		fseek($fp, - strlen($udata['data']) , SEEK_CUR);	
	} 
}

//列分片
$parts = SCS::listParts($bucket, $object, $uploadId);
if (count($parts) > 0 && count($parts) == count($part_info)) {
	foreach ($parts as $part_number => $part) {
		if ($part['etag'] != $part_info[$part_number-1]['ETag']) {
			exit('分片不匹配');
			break;
		}
	}
	//合并分片
	echo "开始合并\n";
	SCS::completeMultipartUpload($bucket, $object, $uploadId, $part_info);
	echo "上传完成\n";
	fclose($fp);
}
