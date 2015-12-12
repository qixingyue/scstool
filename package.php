<?php

if(!file_exists("./src/config.php")) {
	echo "You Need a config file, see README.md if help. \n";
	exit();
}

$builddir = "src/";

$phar = new Phar('scstool.phar');
$phar->buildFromDirectory($builddir, '/\.php$/');
$phar->compressFiles(Phar::GZ);
$phar->stopBuffering();
$defaultStub = $phar->createDefaultStub('route.php');
$stub = "#!/usr/bin/env php\n".$defaultStub;
$phar->setStub($stub);
$phar->stopBuffering();

if(isset($argv[1]) && $argv[1] == "install") {
	system("cp scstool.phar ~/bin/");
}
