<?php
    class Employee{
        // Properties of our Class
        public $name;
        public $salary; 

        // Constructor
        function __construct($name1, $salary1){
            $this->name = $name1;
            $this->salary = $salary1;
        }

        // Destructor
        function __destruct(){
            echo "I am destructing $this->name <br>";
        }
    }

    $ab = new Employee("Abu Bakar", 73000);
    $umer = new Employee("Umer", 10000);
    $saif = new Employee("Saif", 56000); 

    echo "The salary of umer is $umer->salary <br>";
    echo "The salary of saif is $saif->salary <br>";
?>