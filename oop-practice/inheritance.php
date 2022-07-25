<?php


class employee{
    public $name;
    public $age;
    public $salary;

    function __construct($n,$a,$s)
    {
        $this->name = $n;
        $this->age = $a;
        $this->salary = $s;
    }

    function Profile(){
        echo "<h3>Employee Profile </h3>";
        echo "Employee Name  : " . $this->name ."<br>";
        echo "Employee Age   :     " . $this->age ."<br>";
        echo "Employee Salary    :"  . $this->salary ."<br>";
    }
}

class manager extends employee{
    public $ta = 300;
    public $phone = 3000;
    public $totalSalary;
    function Profile(){
        $this->totalSalary = $this->ta + $this->phone + $this->salary;
        echo "<h3>Employee Profile </h3>";
        echo "Employee Name  : " . $this->name ."<br>";
        echo "Employee Age   :     " . $this->age ."<br>";
        echo "Employee Salary    :"  . $this->totalSalary ."<br>";
    }

}
$employeeObj = new manager("shawon hridoy",30,8000);




