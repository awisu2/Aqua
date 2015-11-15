<?php
namespace Aqua;

// define
define("PATH_APP", PATH_BASE."/app");
define("PATH_CLASSES", PATH_BASE."/classes");
define("PATH_CONTROLLER", PATH_CLASSES."/controller");

// require
require(PATH_CORE."/function.php");
require_core("config");
require_core("boot");
require_core("Rooter");

// error
error_reporting(E_ALL);

//set_error_handler(function($errno, $errstr, $errfile, $errline){
//	throw new ErrorException($errstr, $errno, 0, $errfile, $errline);
//});

register_shutdown_function(
	function(){
		$e = error_get_last();
		if( $e['type'] == E_ERROR ||
			$e['type'] == E_PARSE ||
			$e['type'] == E_CORE_ERROR ||
			$e['type'] == E_COMPILE_ERROR ||
			$e['type'] == E_USER_ERROR )
		{
			echo "<pre>";
			echo "Error:";
			echo $e["file"]."[".$e["line"]."] "."(".$e["type"].")".$e["message"];
			echo "</pre>";
		}
	}
);

