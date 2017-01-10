<?php
/**
 * 委托模式
 * 通过分配或委托其他对象，委托设计模式能够去除核心对象中的判决和复杂的功能性
 * 应用场景：一个cd类，类中有mp3播放模式，和mp4播放模式
 * 未使用委托模式，需要在实例化类中判断选择什么方式的播放模式
 * 使用委托模式，播放模式当做一个参数传入playlist函数中就能自动找到对应的播放方法
 *
 */


class CDDelegate
{
	protected $cdInfo = array();

	public function addSong($song)
	{
		$this->cdInfo[$song] = $song;
	}

	public function play($type, $song)
	{
		$obj = new $type;
		return $obj->playLit($this->cdInfo, $song);
	}
}


class mp3
{
	public function playLit($list, $song)
	{
		echo 'mp3播放'.$list[$song];
	}
}


class mp4
{
	public function playLit($list, $song)
	{
		echo 'mp4播放'.$list[$song];
	}
}

$newCD = new CDDelegate;
$newCD->addSong("1");
$newCD->addSong("2");
$newCD->addSong("3");
$type = 'mp4';
$newCD->play($type, '3');
?>