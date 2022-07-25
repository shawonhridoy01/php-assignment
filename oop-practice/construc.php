<?php


// what is constructor

// constructor function called automatically 

// class er object bannaor shate shate constructor function call hoye jai 


// class person{
//     public $name = "no name" ;
//     public $age = "39" ;

//     function show(){
//         return "hello this is ".$this->name ." .I am ".$this->age." years old";
//     }

// }
// $obj = new person();

// $obj->name = "shawon hossain";
// $obj->age = "30";

// echo $obj->show();

class person {
    public $name ;
    public $age ;

    function __construct($n = "shawon hridoy",$a = 20)
    {
        $this->name = $n;
        $this->age = $a;
    }

    function show(){
        return "hello this is ".$this->name ." .I am ".$this->age." years old";
    }
}

$obj = new person("shawon hossain","20");
echo $obj->show();


// construct function sobar age call hoi 
// construct function call automatically
// class er object bananor shate shate construct function call hoi
// construct function er vitor value set kora jai 
