<?php
/**
 * 应用场景：拥有多个类时，如果需要使用这些类的实例
 * 则在每次使用时都需要new一次，过程不可控，类多了，到处
 * 都是new的身影。引进工厂模式，通过工厂统一创建对象实例。
 * 工厂模式是php项目开发中，最常见的设计模式，一般会配合单例
 * 模式一起使用，来加载php类库中的类
 */

class String
{
	public function write(){}
}

class Json
{
	public function getJsonData(){}
}

class Xml
{
	public function buildXml(){}
}

class Factory
{
	public static function create($class)
	{
		return new $class;
	}
}

Factory::create("Json");//获取json对象
Factory::create("String");//获取String对象
Factory::create("Xml");//获取Xmln对象
?>