<?php
/**
* 迭代器模式
* 可帮助构造特定的对象，那些对象能够提供单一标准接口循环或迭代任何类型的可计数数据。
* 1.访问一个聚合对象的内容而无需暴露它的内部表示。
* 2.支持对聚合对象的多种遍历。
* 3.为遍历不同的聚合结构提供一个统一的接口
*/

//具体迭代器
class MyIterator implements Iterator
{

    private $var = array();  
      
    public function __construct($array) {      
        $this->var = $array;  
    }  
     
    //重置迭代器
    public function rewind() {       
        reset($this->var);  
    }  
    
    //获取当前内容
    public function current() {     
        $var = current($this->var);  
        return $var;  
    }  
    
    //验证迭代器是否有数据
    public function valid() {      
        $var = $this->current() !== false;  
        return $var;  
    }  
    
    //移动key到下一个 
    public function next() {      
        $var = next($this->var);  
        return $var;  
    }  
    
    //迭代器位置key 
    public function key() {      
        $var = key($this->var);  
        return $var;  
    }  

}

$values = array('a', 'b', 'c'); 

$it = new MyIterator($values); 

foreach ($it as $a => $b) {   
    echo "$a: $b<br>";    
}  

?>