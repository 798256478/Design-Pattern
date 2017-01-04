<?php  
/**
 * 观察者模式
 *
 * 应用场景：订单创建完成后，会做各种动作，比如发送EMAIL，或者改变订单状态等等。
 * 原始的方法，是将这些操作都写在create函数里面
 * 但是随着订单创建类的越来越庞大，这样的操作已经无法满足需求和快速变动
 * 这个时候，观察者模式出现了。
 */
class order {  
  
    protected $observers = array(); // 存放观察容器  
      
    //观察者新增  
    public function addObServer($type, $observer) {  
        $this->observers[$type][] = $observer;  
    }  
      
    //运行观察者  
    public function obServer($type) {  
        if (isset($this->observers[$type])) {  
            foreach ($this->observers[$type] as $obser) {  
                $a = new $obser;  
                $a->update($this); //公用方法  
            }  
        }  
    }  
      
    //下单购买流程  
    public function create() {  
        echo '购买成功';  
        $this->obServer('buy'); // buy动作  
    }  
}  
class orderEmail {  
    public static function update($order) {  
        echo '发送购买成功一个邮件';  
    }  
}  
class orderStatus {  
    public static function update($order) {  
        echo '改变订单状态';  
    }  
}  
$ob = new order;  
$ob->addObServer('buy', 'orderEmail');  
$ob->addObServer('buy', 'orderStatus');  
$ob->create();  