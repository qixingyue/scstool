<?php

$len = count($argv);
if($len < 2) {
	help();
	exit();
}

$opt = $argv[1];
$argv = array_slice($argv,1);

if($opt == "listfile") {
	include "listfile.php";
} else if($opt == "upload") {
	include "upload.php";
} else if($opt == "uploadBig") {
	include "uploadBig.php";
} else if($opt == "delete") {
	include "delete.php";
} else if($opt == "download") {
	include "download.php";
} else {
	help();
} 

function help(){
	echo "scs.phar upload <file> \n";
	echo "         uploadBig <file> \n";
	echo "         listfile\n";
	echo "         delete <file>\n";
	echo "         download <file> <ttl>\n";
}
