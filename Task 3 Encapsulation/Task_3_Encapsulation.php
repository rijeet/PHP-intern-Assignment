<?php
class Employee {
    private $name;
    private $age;
    private $salary;
    private $joiningDate;
    private $phoneNumber;

    public function __construct($name, $age, $salary, $joiningDate, $phoneNumber) {
        $this->setName($name);
        $this->setAge($age);
        $this->setSalary($salary);
        $this->joiningDate = $joiningDate;  
        $this->phoneNumber = $phoneNumber;  
    }

    
    public function setName($name) {
        if (!empty($name)) {
            $this->name = $name;
        } else {
            throw new Exception("Name cannot be empty.");
        }
    }

    
    public function getName() {
        return $this->name;
    }

    
    public function setAge($age) {
        if ($age > 0) {
            $this->age = $age;
        } else {
            throw new Exception("Age must be positive.");
        }
    }

    
    public function getAge() {
        return $this->age;
    }

   
    public function getSalary() {
        return $this->salary;
    }

   
    public function setSalary($salary) {
        if ($salary > 0) {
            $this->salary = $salary;
        } else {
            throw new Exception("Salary must be positive.");
        }
    }

    
    public function getJoiningDate() {
        return $this->joiningDate;
    }

    
    public function getPhoneNumber() {
        return $this->phoneNumber;
    }

    
    public function employeeInfo() {
        echo "Employee Information:\n";
        echo "Name: " . $this->getName() . "\n";
        echo "Age: " . $this->getAge() . "\n";
        echo "Salary: " . $this->getSalary() . "\n";
        echo "Joining Date: " . $this->getJoiningDate() . "\n";
        echo "Phone Number: " . $this->getPhoneNumber() . "\n";
    }
}


$employee1 = new Employee("Rahim", 25, 5000, "2023-01-01", "01987350115");
$employee2 = new Employee("Karim", 30, 10000, "2022-06-15", "01439492964");


$employee1->employeeInfo();
echo "\n";
$employee2->employeeInfo();
?>
