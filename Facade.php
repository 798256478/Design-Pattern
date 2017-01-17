<?php
/**
* 外观模式
* 通过在必需的逻辑和方法的集合前创建简单的外观接口，外观设计模式隐藏了调用对象的复杂性。
* 
* 应用场景
* 设计一个User类，里面有getUser获取用户信息接口
* 在使用getUser这个接口的时候，需要设置用户的用户名和用户年龄
* 所以在正常情况下，调用getUser接口，需要先实例化User类，然后设置用户信息，
* 最后才调用getUser方法，这个过程是复杂的，如果用户信息非常多的话，或者不断变化的话，
* 调用用户信息类将是维护成本很大的事情。
* 设计了一个UserFacade，里面有一个静态方法getUserCall，这个方法可以直接调用getUser函数。
*/

class User
{
	
	protected $userName;
	protected $userAge;

	public function setUserName($userName)
	{
		return $this->userName = $userName;
	}

	public function setUserAge($userAge)
	{
		return $this->userAge = $userAge;
	}

	public function getUser()
	{
		echo '用户姓名：'.$this->userName.';用户年龄：'.$this->userAge;
	}
}

class UserFacade
{
	
	public static function getUserCall($userInfo)
	{
		$user = new User;
		$user->setUserName($userInfo['username']);
		$user->setUserAge($userInfo['userage']);
		return $user->getUser();
	}
}

$userInfo = array('username' => 'zhangsan', 'userage' => 22);
UserFacade::getUserCall($userInfo);