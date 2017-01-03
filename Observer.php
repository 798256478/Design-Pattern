<?php
/*观察者模式
 *
 * 一个对象通过添加一个方法（该方法允许另一个对象，即观察者注册自己）使本身变得可观察。
 * 当可观察的对象更改时，它会将消息发送到已注册的观察者。
 *
 */

/*观察者接口*/
interface Observer
{
	function onChenged($sender, $args);
}

/*定义一个可被观察的对象*/
interface Observable
{
	function addObserver($observer);
}

/*实现可被观察接口，以使自身能够被观察*/
class UserList implements Observable
{
	private $_observers = array();

	public function addCustomer($name)
	{
		foreach ($this->_observers as $obs) {
			$obs->onChenged($this, $name);
		}
	}

	public function addObserver($observer)
	{
		$this->_observers[] = $observer;
	}
}

/*实现观察者接口，当被观察者改变时，执行操作*/
class UserListLogger implements Observer
{
	public function onChenged($sender, $args)
	{
		echo ("'$args' added to user list\n");
	}
}

$ul = new UserList();
$ul->addObserver(new UserListLogger());
$ul->addCustomer("jack");

?>