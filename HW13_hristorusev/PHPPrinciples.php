<?php
interface SoundInterface
   {
      public function makeSound();
   }

abstract class Animal implements SoundInterface  
   {
      protected $name;
      protected $age;
      protected $sex;
      abstract public function getAge();
   }

class Frog extends Animal
   {
   
    public function __construct($name, $age, $sex) 
      {
         $this->name = $name;
         $this->age = $age;
         $this->sex = $sex;
      }
    public function makeSound()
      {
         echo 'Frog makes ribbit!</br>';
      }  
    public function getAge()
      {
         return $this->age;
      }
   }
abstract class Cat extends Animal
   {   
    public function makeSound()
      {
         echo 'Cat makes meow!</br>';
      }  
    public function getAge()
      {
         return $this->age;
      }
   }

class Kitten extends Cat
{
   const KittensSex = 'f';
   public function __construct($name, $age)
   {
      $this->name = $name;
      $this->age = $age;
      $this->sex = self::KittensSex;
   }
}
class Tomcat extends Cat
{
   const KittensSex = 'm';
   public function __construct($name, $age)
   {
      $this->name = $name;
      $this->age = $age;
      $this->sex = self::KittensSex;
   }
}
class AnimalArray
{
   protected $animals = array();
   public function addAnimal(Animal $singleAnimal)
      {
         array_push($this->animals, $singleAnimal);
      }
   public function arithmeticMeanAge()
      {
         $ageSum = 0;
         foreach ($this->animals as $singleAnimal) 
            {
               $ageSum += $singleAnimal->getAge();
            }
         return $ageSum/count($this->animals);
      }
}
echo '<pre>';
$myFrog = new Frog('Ugly Frog', 12, 'f');
var_dump($myFrog);
$myFrog->makeSound();
echo '<br/>';
$myKitten = new Kitten('Pussycat', 5);
var_dump($myKitten);
$myKitten->makeSound();
echo '<br/>';
$myTomcat = new Tomcat('Tom', 4);
var_dump($myTomcat);
$myTomcat->makeSound();
echo '<br/>';
$myZoo = new AnimalArray();
echo 'Before added the  animals:<br/>';
var_dump($myZoo);
$myZoo->addAnimal($myFrog);
$myZoo->addAnimal($myKitten);
$myZoo->addAnimal($myTomcat);
echo 'After added the  animals:<br/>';
var_dump($myZoo);
echo 'The arithmetic mean of animals age is '.$myZoo->arithmeticMeanAge();    
?>



























