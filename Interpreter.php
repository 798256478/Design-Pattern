<?php
/**
* 解释器模式 用于分析一个实体的关键元素，并且针对每个元素提供自己的解释或相应动作。
* 解释器模式非常常用，比如PHP的模板引擎 就是非常常见的一种解释器模。
*/

class Interpreter
{
	private $left = "<!--{";
	private $right = "}-->";

	public function run($str)
	{
		return $this->init($str, $this->left, $this->right);
	}

	private function init($str, $left, $right)
	{
		$pattern = array('/'.$left.'/', '/'.$right.'/');
		var_dump($pattern);
		$repleacement = array('<h1>', '</h1>');
		return preg_replace($pattern, $repleacement, $str);
		//正则替换，preg_replace (正则表达式, 替换成, 字符串)
	}
}

$str = "这是一个模板类，简单的模板类，标题为：<!--{Hello World}-->";  
$interpreter = new Interpreter;  
echo $interpreter->run($str);  

?>