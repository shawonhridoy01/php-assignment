<?php 



// what is oop?

// object orienented programming 

// coding style / methodology

// jodi amra php er kotha boli tahole php programming patterns 2 ta 

// 1 . Procedural 
// 2.Object Oriented

// benifit of oop :

	// code more moduler and reusable 
	// well organised code 
	// easier to debug 
	// best for medium to large website project 


//how we work in oop?

//oop bujar jonno amader k dui ta jinis valo vhabe bujte hobe class & object 


// er jonno akta example newa jak :

// mone koren ja apni akta bari banaben sei onojai apnar kache akta barir noksa ache ar noksar modde ache bari ki color hobe er height width kto hobe barir bitor e koita room hobe etc.

// akhon ai ja barir noksa jei khane apnar bari kivabe hobe tar sokol details dewa ache seta holo class 

// ar ai noksa bebohar kore apni joto gula bari banaben seta holo apnar object 

// class apni akbar e banaben ar er object apni jotobar icca totobare banate paren 

// object er vitor amon kicho rakha jabe na ja tar class er vitor rakha nai



class calculation {
	public $a,$b,$c;
	function sum(){
		$this->c = $this->a + $this->b;
		return $this->c;
	}
	function sub(){
		$this->c = $this->a - $this->b;
		return $this->c;
	}
	function mul(){
		$this->c = $this->a * $this->b;
		return $this->c;
	}
	function div(){
		$this->c = $this->a / $this->b;
		return $this->c;
	}

}
$obj1 = new calculation();
$obj2 = new calculation();

$obj1->a = 20;
$obj1->b = 10;

$obj2->a = 10;
$obj2->b = 5;

echo $obj1->sum();
echo "<br>";

echo $obj1->sub();
echo "<br>";

echo $obj1->mul();
echo "<br>";

echo $obj1->div();
echo "<br>";
echo "object 2 data ";
echo "<br>";
echo $obj2->sum();
echo "<br>";

echo $obj2->sub();
echo "<br>";

echo $obj2->mul();
echo "<br>";

echo $obj2->div();
echo "<br>";
