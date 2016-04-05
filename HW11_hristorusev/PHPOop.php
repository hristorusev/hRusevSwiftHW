<?php
/**
* class dog
* @author Hristo Rusev
*/
class dog  
{
   /**
   * A public variable
   * The color of  the fur
   * @var string 
   */
   public $furColor;
   /**
   * A public variable
   * The breed of the dog
   * @var string 
   */
   public $breed;
   /**
   * A public variable
   * The color of the eyes
   * @var string 
   */	
   public $eyesColor;
   /**
   * A public variable
   * The legnth of the fur
   * @var signed 32-bit integer 
   */	
   public $furLength;
   /**
   * Sets $furColor, $breed, $eyesColor and $furLength to a new value upon class instantiation
   * @param string $furColor a value required for the class
   * @param string $breed a value required for the class
   * @param string $eyesColor a value required for the class
   * @param signed 32-bit integer $furLength a value required for the class
   * @return void
   */
   public function __construct($furColor,$breed,$eyesColor,$furLength)
		{
			$this->furColor = $furColor;
			$this->breed = $breed;
			$this->eyesColor = $eyesColor;
			$this->furLength = $furLength;
		}
   /**
   * show that the dog is walking
   * @return boolean
   */
   public function walk()
		{
			echo 'Dog is walking.<br/>';
			return true;
		}
   /**
   * show that the dog is running
   * @return boolean
   */
   public function run()
		{
			echo 'Dog is running.<br/>';
			return true;
		}
   /**
   * show that the dog is yelping
   * @return boolean
   */
   public function yelp()
		{
			echo 'Dog is yelping.<br/>';
			return true;
		}
   /**
   * show that the dog is biting
   * @return boolean
   */
   public function bite()
		{
			echo 'Dog is biting.<br/>';
			return true;
		}
   /**
   * show that the dog is drinking water
   * @return boolean
   */
   public function drinkWater()
		{
			echo 'Dog is drinking water.<br/>';
			return true;
		}
   /**
   * show that the dog is eating
   * @return boolean
   */
   public function eat()
		{
			echo 'Dog is eating.<br/>';
			return true;
		}
}
/**
* class human
* @author Hristo Rusev
*/
class human 
{
   /**
   * A public variable
   * The name of  the human
   * @var string 
   */
   public $name;
   /**
   * A public variable
   * The sev of  the human
   * @var string 
   */
   public $sex;
   /**
   * A public variable
   * The weight of  the human
   * @var signed 32-bit integer  
   */
   public $weight;
   /**
   * A public variable
   * The hight of  the human
   * @var signed 32-bit integer  
   */
   public $hight;
   /**
   * A public variable
   * The dog of  the human
   * @var dog variable 
   */
   public $dog;
   /**
   * Sets $name, $sex, $weight, $hight and $dog to a new value upon class instantiation
   * @param string $name a value required for the class
   * @param string $sex a value required for the class
   * @param signed 32-bit integer $weight a value required for the class
   * @param signed 32-bit integer $hight a value required for the class
   * @param dog $dog a object required for the class
   * @return void
   */
   public function __construct($name,$sex,$weight,$hight,$dog)
		{
			$this->name = $name;
			$this->sex = $sex;
			$this->weight = $weight;
			$this->hight = $hight;
			$this->dog = $dog;
		}
   /**
   * show that the human is walking
   * @return boolean
   */
   public function walk()
		{
			echo $this->name.' is walking.<br/>';
			return true;
		}
   /**
   * show that the human is running
   * @return boolean
   */
   public function run()
		{
			echo $this->name.' is running.<br/>';
			return true;
		}
   /**
   * show that the human is eating
   * @return boolean
   */
   public function eat()
		{
			echo $this->name.' is eating.<br/>';
			return true;
		}
   /**
   * show that the human is speaking
   * @return boolean
   */
   public function speak()
		{
			echo $this->name.' is speaking.<br/>';
			return true;
		}
   /**
   * show the possibility that two people ccan meet each other, according their sex 
   * @param human $someone need for the method
   * @return boolean
   */
   public function meetWithSomeone($someone)
		{
			if($this->sex != $someone->sex)
				{
					echo $this->name.' and '.$someone->name.' can meet each other.</br>';
					return true;
				}
			else
				{
					echo $this->name.' and '.$someone->name.' can not meet each other.</br>';
					return false;
				}
		}
}
/**
* class meetingInPark
* @author Hristo Rusev
*/
class meetingInPark
{
   /**
   * A public variable
   * @var human variable 
   */
   public $firstHuman;
   /**
   * A public variable
   * @var human variable 
   */
   public $secodHuman;
   /**
   * Sets $firstHuman and $firstHuman to a new value upon class instantiation
   * @param human $firstHuman a object required for the class
   * @param human $secodHuman a object required for the class
   * @return void
   */
   public function __construct($firstHuman,$secodHuman)
		{
			$this->firstHuman = $firstHuman;
			$this->secodHuman = $secodHuman;
		}
	   /**
   * show the possibility that two people can meet each other, while walking in the park with their dogs 
   * @return boolean
   */
   public function canTheyMeetInThePark()
   		{
   			if($this->firstHuman->walk() &&
   			   $this->secodHuman->walk() &&
   			   $this->firstHuman->dog->walk() &&
   			   $this->secodHuman->dog->walk() &&
   			   $this->firstHuman->meetWithSomeone($this->secodHuman)
   			   )
   			{
   				echo $this->firstHuman->name.' and '.$this->secodHuman->name.' are walking in the park with their dogs and can meet each other.<br/>';
   				return true;
   			}
   			else
   			{
   				echo $this->firstHuman->name.' and '.$this->secodHuman->name.' can not meet each other, while walking in the park with their dogs.<br/>';
   				return false;
   			}
   		}
}
$hristo = new human('Hristo','m',85,181,new dog('white','golden retriever','brown',20));
$marina = new human('Marina','f',55,168,new dog('brown','golden retriever','brown',15));
$theMeetingBetweenHristoAndMarina = new meetingInPark($hristo,$marina);
$theMeetingBetweenHristoAndMarina->canTheyMeetInThePark();
?>
