<?php
namespace Aqua;

class Rooter
{
	var $patterns = array(
		"(:controller)(/:method)?",
	);
	var $default_method = "index.php";
	var $base_txt = "/";
	
	function __construct()
	{
		if(isset($_SERVER['PATH_INFO']))
		{
			$this->base_txt = $_SERVER['PATH_INFO'];
		}

	}

	public function set_pattern()
	{
	}

	public function set_basestring()
	{
	}

	private function convert_pattern($subject, $values=array())
	{
		$pattern_convert = "";
		if(strpos($subject, ":"))
		{
			$pattern = "|\(([^:]*):([^\\)]+)\)|";
			$replacement = '(?:(?:$1)([^/]+))';
			$pattern_convert = preg_replace($pattern, $replacement, $subject);
			$pattern_convert = "|/" . $pattern_convert."|";
		}
		return $pattern_convert;
	}

	public function matche_pattern()
	{
		$ms = array(
			"controller" => "base",
			"method" => "index",
		);

		foreach($this->patterns as $pattern)
		{
			if(is_array($pattern)){
			}

			// パターンの取得
			$pattern = $this->convert_pattern($pattern);

			// 検索
			if(preg_match("${pattern}", $this->base_txt, $matches))
			{
				$count = count($matches);
				if($count >= 2) $ms['controller'] = $matches[1];
				if($count >= 3) $ms['method']     = $matches[2];

				break;
			}
		}

		return $ms;
	}

	
}
