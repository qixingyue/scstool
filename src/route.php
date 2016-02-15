
<?php

$len = count($argv);
if($len < 2) {
	help();
	echo "\n";
	exit();
}

$opt = $argv[1];
$argv = array_slice($argv,1);

if($opt == "listfile" || $opt == "ls") {
	include "listfile.php";
} else if($opt == "upload" || $opt == "up") {
	include "upload.php";
} else if($opt == "uploadBig" || $opt == "upb") {
	include "uploadBig.php";
} else if($opt == "delete" || $opt == "del") {
	include "delete.php";
} else if($opt == "download" || $opt == "get") {
	include "download.php";
} else if($opt == "tmp" || $opt == "tmp") {
	include "tmpurl.php";
} else {
	help();
} 

function help(){
	echo "scs.phar upload <file> \n";
	echo "         uploadBig <file> \n";
	echo "         listfile\n";
	echo "         delete <file>\n";
	echo "         download <file> <ttl>\n";
	echo "         tmp <file> <ttl>\n";
}

echo "\n";
