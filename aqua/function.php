<?php
namespace Aqua;

function require_core($file_name)
{
	require(PATH_CORE."/${file_name}.php");
}

function require_controller($name_controller)
{
	require(PATH_CONTROLLER."/".$name_controller.".php");
}


