<?php
/**
* 中介者模式用于开发一个对象，这个对象能够在类似对象相互之间不直接相互的情况下传送或者调解
* 对这些对象的集合的修改。一般处理具有类似属性，需要保持同步的非耦合对象时，最佳的做法就是中
* 介者模式。
*
* 应用场景：
* 有一个CD类和一个MP3类，两个类的结构相似。
* 需要在CD类更新的时候，同步更新MP3类。
* 传统的做法就是在CD类中实例化MP3类，然后去更新，但是这么做的话，代码就会很难维护，如果新
* 增一个同样的MP4类，那么就没法处理了。
* 中介者模式很好的处理了这种情况，通过中介者类，CD类中只要调用中介者这个类，就能同步更新这
* 些数据。
*/

class CD
{
	public $band = '';
	public $title = '';
	protected $mediator;

	public function __construct($mediator = null)
	{
		$this->mediator = $mediator;
	}

	public function save()
	{
		var_dump($this);
	}

	public function changeBandName($bandname)
	{
		if(!is_null($this->mediator)){
			$this->mediator->change($this, array('band' => $bandname));
		}

		$this->band = $bandname;
		$this->save();
	}
}

class MP3
{
	protected $mediator;

	public function __construct($mediator = null)
	{
		$this->mediator = $mediator;
	}

	public function save()
	{
		var_dump($this);
	}

	public function changeBandName($bandname)
	{
		if(!is_null($this->mediator)){
			$this->mediator->change($this, array('band' => $bandname));
		}

		$this->band = $bandname;
		$this->save();
	}
}

/**
* 中介者类
*/
class Mediator
{
	protected $containers = array();
	
	public function __construct()
	{
		$this->containers[] = "CD";
		$this->containers[] = "MP3";
	}

	public function change($object, $value)
	{
		$title = $object->title;
		$band = $object->band;

		foreach ($this->containers as $container) {
			if(!($object instanceof $container)){
				$object = new $container;
				$object->title = $title;
				$object->band = $band;
				foreach ($value as $key => $value) {
					$object->$key = $value;
				}
				$object->save();
			}
		}
	}

}

$title = "Waste of a Rib";         
$band = "Never Again";         
$mediator = new Mediator();         
$cd = new CD($mediator);         
$cd->title = $title;         
$cd->band  = $band;         
$cd->changeBandName("Maybe Once More"); 
?>