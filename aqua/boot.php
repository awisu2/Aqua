<?php
namespace Aqua;

function boot()
{
	try {
		// configで動作
		$Rooter = new Rooter();
		$matches = $Rooter->matche_pattern();
	
		$controller = ucfirst($matches['controller']);
		$method = $matches['method'];
a();	
		// controllerの読み込みと実行
		require_controller($controller);
		$class_name = "\\Aqua\\Controller\\${controller}";
		$Class = new $class_name();
		$Class->$method();

	} catch (Exception $e) {
		echo "gtetea";
		var_dump($e->getMessage());
	}
}

