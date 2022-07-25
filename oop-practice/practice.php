<?php



class person{
    public $name ;
    public $age;
    public $salary;

    function __construct($n,$a,$s)
    {
        $this->name = $n;
        $this->age = $a;
        $this->salary = $s;
    }

    function information(){
        echo "<h2>Employee Profile </h2>";
        echo "Employee Name: ". $this->name ."<br>";
        echo "Employee Age: ". $this->age ."<br>";
        echo "Employee Salary: ". $this->salary ."<br>";
    } 
}


class manager extends person{
    public $ta = 200;
    public $phone = 2000;
    public $totalSalary;

    function info(){
        $this->totalSalary = $this->ta + $this->phone + $this->salary;
        echo "<h2>Manager Profile </h2>";
        echo "Manager Name: ". $this->name ."<br>";
        echo "Manager Age: ". $this->age ."<br>";
        echo "Manager Salary: ". $this->totalSalary ."<br>";
    } 


}
$personObj = new manager("shawon Hossain",33,3000);
$personObj2 = new manager("Shakil Hossain",23,8000);

$personObj->info();
$personObj2->information();