<?php
/**
 * 策略模式
 * 使用场景：有一个Strategy类, 类中有一个可以直接调用的getData方法
 * 返回xml数据，随着业务扩展要求输出json数据，这时就可以使用策略模式
 * 根据需求获取返回数据类型
 */

class Strategy
{
	protected $arr;

	function __construct($title, $info)
	{
		$this->arr['title'] = $title;
		$this->arr['info'] = $info;
	}

	public function getData($objType)
	{
		return $objType->get($this->arr);
	}
}

/**
* 返回json类型的数据格式
*/
class Json
{
	public function get($data)
	{
		return json_encode($data);
	}
}

/**
* 返回xml类型的数据格式
*/
class Xml
{
	public function get($data)
	{
		$xml = '<?xml version = "1.0" encoding = "utf-8"?>';
		$xml .= '<return>';
		$xml .= '<data>'.serialize($data).'</data>';
		$xml .= '</return>';
		return $xml;
	}
}

$strategy = new Strategy('cd_1', 'cd_1');
echo $strategy->getData(new Json);
echo $strategy->getData(new Xml);

?>