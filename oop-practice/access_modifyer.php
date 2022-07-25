<?php


// there are three types of access modifyier

// public 
// protected
// private -->

// <!-- public  -->

// public property bahire theke access kora jabe 
// er value bahire theke access kora jabe 
// er value inherit kora onno class eo use kora jabe

// public function bahire theke object banai access kora jabe 

// public function inherit kore onno class eo use kora jabe 


// protected 

// protected property bahire access kora jabe na ebong bahire er value change kora jabe na 

// tobe protected property inherit kore onno class use kora jabe 

// protected method bahire object banai access kora jabe na tobe inherit kore er value onno class a use kora jabe 

// private 

// private value sudo class er vitor e bebohar kora jabe 



// public ====================
// class employe{
//     public $name;
//     public $age;

//     function data(){
//         return "My name is ".$this->name.". I am ". $this->age ." years old";
//     }
// }

// $obj = new employe();

// $obj->name = "shawon";
// $obj->age = 20;

// echo $obj->data();

// ========================

// protected 
class employe{
    protected $name;
    protected $age;

    protected function data(){
        return "My name is ".$this->name.". I am ". $this->age ." years old";
    }
}

class manager extends employe{
    function __construct($n,$a)
    {
        $this->name = $n;
        $this->age = $a;
    }
     function data1(){
        return "My name is ". $this->name.". I am ". $this->age ." years old";
    }

}



$obj = new manager("shawon",20);

echo $obj->data1();


