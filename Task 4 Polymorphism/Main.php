<?php
require_once 'Dog.php'; 
require_once 'Cat.php'; 


function AnimalSound(Animal $animal) {
    echo $animal->makeSound() . "\n";
}


$Golden_Retriever = new Dog();
$Abyssinian = new Cat();


AnimalSound($Golden_Retriever); 
AnimalSound($Abyssinian); 
?>