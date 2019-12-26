<?php

date_default_timezone_set('Europe/Istanbul');
setlocale(LC_TIME, 'TR');

session_start();
ob_start();

define('__PATH__', str_replace('\\', '/', realpath('.')) . '/');
if(isset($_SERVER['HTTP_X_FORWARDED_PROTO']))
	define('__PRTC__', $_SERVER['HTTP_X_FORWARDED_PROTO'] . '://');
else
	define('__PRTC__', 'http://');
define('__SRVR__', $_SERVER['SERVER_NAME']);
define('__DIRS__', '/');
define('__VERS__', '1');

define('__URLS__', __PRTC__ . __SRVR__ . __DIRS__);

spl_autoload_register(function($className) {
	$classFile = __DIR__ . '/controllers/class.' . strtolower($className) . '.php';
	if(file_exists($classFile)) {
		require_once($classFile);
	}
});

require_once('functions.php');

$key = 0;

$my_dataBase = new dataBase('localhost','sinamaOdev','root','');

new Controllers;
?>