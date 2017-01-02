<?php

/*
 * 单例模式，一个类只允许实例化一次
 */
class Singleton
{
	//1.构造方法私有化
	private function __construct()
	{

	}

	//2.设置受保护的/私有化的属性
	protected static $singleton = null;

	//3.设置公开的静态实例化的方法
	public static function getInstance()
	{
		if(self::$singleton == null){
			self::$singleton = new self();
		}
		return self::$singleton;
	}

}

//var_dump(new Singleton); 普通的实例化方式无法使用
var_dump(Singleton::getInstance() instanceof Singleton);

?>