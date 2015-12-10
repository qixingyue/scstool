This is an scs tool to transfer your own file to scs use command line.

https://github.com/SinaCloudStorage/SinaCloudStorage-SDK-PHP

* You Need A SCS ACCOUNT . 
http://www.sinacloud.com/scs.html

* Create A Config File In Src Dir, Content is :

config.php

```PHP 
<?php

if(!defined("MYCONFIG_H")) {
	define("MYCONFIG_H",1);
	define("PREFIX","software/");
	define("BUCKETNAME","Yourbucketname");
	define('AccessKey', 'Your AccessKey');
	define('SecretKey', 'Your SecretKey');
}

```

* Run php package.php

* Copy you phar file to your bin dir

*	Also You can replace your wget dir . 
	SET YOUR ENV export scsget="quickget " , " -O filename <URL>" will be added to the Command .
