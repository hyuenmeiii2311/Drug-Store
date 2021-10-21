<?php

/*set your website title*/
define("WEBSITE_TITLE","Pharma");


/*set database variables*/
define('DB_TYPE','mysql');
define('DB_NAME','drugstore');
define('DB_USER','root');
define('DB_PASS','');
define('DB_HOST','localhost');


/*protocal type http or https*/
define('PROTOCAL','http');

/*root and asset paths*/
$_SERVER['SERVER_NAME'] = "localhost:81";
$path = str_replace("\\", "/",PROTOCAL ."://" . $_SERVER['SERVER_NAME'] . __DIR__  . "/"); //check server name and directory name
$path1 = str_replace("\\", "/",PROTOCAL ."://" . $_SERVER['SERVER_NAME'] . __DIR__ ) ."/"; //check server name and directory name

// $path = str_replace("\\", "/",PROTOCAL ."://" . "localhost:81" . __DIR__  . "/"); //check server name and directory name
$path = str_replace($_SERVER['DOCUMENT_ROOT'], "", $path);

//define('ROOT', str_replace("client/core", "", $path));
define('ROOT',str_replace("app/core/", "", $path));
define('ASSETS', str_replace("app/core", "public/client", $path));
define('ASSETS_ADMIN', str_replace("app/core", "public/admin", $path));

/*set to true to allow error reporting
set to false when you upload online to stop error reporting*/
define('DEBUG',true); 

if(DEBUG)
{
	ini_set("display_errors",1);
}
ini_set("display_errors",0);