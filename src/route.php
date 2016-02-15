<?php

$g_run_time = array();

$run_time_file = "/tmp/scstools.runtime";

if(file_exists($run_time_file)){
	$g_run_time = unserialize(file_get_contents($run_time_file));
}

function save_run_time($k,$v){
	global $g_run_time;
	$g_run_time[$k] = $v;
}

function k_run_time($k){
	global $g_run_time;
	return isset($g_run_time[$k]) ? $g_run_time[$k] : false;
}

function final_run_time(){
	global $g_run_time,$run_time_file;
	file_put_contents($run_time_file,serialize($g_run_time));
}

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

final_run_time();
echo "\n";
