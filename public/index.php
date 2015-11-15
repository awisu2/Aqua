<?php
// boot
define("PATH_BASE", realpath(dirname(__file__)."/.."));
if(!defined("PATH_CORE")) {
	define ("PATH_CORE", PATH_BASE."/aqua");
}
require(PATH_CORE."/init.php");

\Aqua\boot();

