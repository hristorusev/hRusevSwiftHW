<?php
/*EX1*/
echo '<br/>EX1<br/><br/>';
/**
* class ArraySort
* @author Hristo Rusev
*/
class ArraySort  
{
   /**
   * A private variable
   * the array that will be sort
   * @var array
   */
   private $ArrayWillBeSort;
   /**
   * Sets $ArrayWillBeSort to a new value upon class instantiation
   * @param array $ArrayWillBeSort a value required for the class
   * @return void
   */
   public function __construct($ArrayWillBeSort)
		{
			$this->ArrayWillBeSort = $ArrayWillBeSort;
		}
   /**
   * sort the array
   * @return void 
   */
   public function sortTheArray()
		{
			sort($this->ArrayWillBeSort);
		}
   /**
   * use when echo an object
   * @return string 
   */
   public function __toString() 
      {
         return implode(',',$this->ArrayWillBeSort);
      }
}
$array = new ArraySort(array(3,45,6,78,9,812,4566));
$array->sortTheArray();
echo $array;
/*EX2*/
echo '<br/><br/>EX2<br/><br/>';
/**
* class Factorial
* @author Hristo Rusev
*/
class Factorial
{
   /**
   * A private variable
   * n number
   * @var signed 32-bit integer
   */
   private $n;
   /**
   * Sets $n to a new value upon class instantiation
   * @param signed 32-bit integer $n a value required for the class
   * @return void
   */
   public function __construct($n)
      {
         $this->n = $n;
      }
   /**
   * calculate the N Factorial
   * @return signed 32-bit integer 
   */
   public function nFactorialCalculate()
      {
         $nFactorial = 1;
         for ($i = 1;$i <= $this->n;$i++) 
            { 
               $nFactorial = $nFactorial*$i;
            }
         return $nFactorial;
      }
}
$nNumber = new Factorial(5);
echo $nNumber->nFactorialCalculate();
/*EX3*/
echo '<br/><br/>EX3<br/><br/>';
/**
* class Vehicle
* @author Hristo Rusev
*/
class Vehicle
{
   /**
   * A private variable
   * year of the Vehicle
   * @var signed 32-bit integer
   */ 
   private $year;
   /**
   * A private variable
   * price of the Vehicle
   * @var signed 32-bit integer
   */ 
   private $price;
   /**
   * A private variable
   * vehicleType of the Vehicle
   * @var string
   */ 
   private $vehicleType;
   /**
   * A private variable
   * make of the Vehicle
   * @var string
   */ 
   private $make;
   /**
   * A private variable
   * model of the Vehicle
   * @var string
   */ 
   private $model;
   /**
   * A private variable
   * kilometres of the Vehicle
   * @var signed 32-bit integer
   */ 
   private $kilometres;
   /**
   * Sets $year, $price, $vehicleType, $make, $model and $kilometres to a new values upon class instantiation
   * @param signed 32-bit integer $year a value required for the class
   * @param signed 32-bit integer $price a value required for the class
   * @param string $vehicleType a value required for the class
   * @param string $make a value required for the class
   * @param string $model a value required for the class
   * @param signed 32-bit integer $kilometres a value required for the class
   * @return void
   */
   public function __construct($year,$price,$vehicleType,$make,$model,$kilometres)
      {
         $this->year = $year;
         $this->price = $price;
         $this->vehicleType = $vehicleType;
         $this->make = $make;
         $this->model = $model;
         $this->kilometres = $kilometres;
      }
   /**
   * return the year of the vehicle
   * @return signed 32-bit integer 
   */
   public function getYear()
      {
         return $this->year;
      }
   /**
   * return the price of the vehicle
   * @return signed 32-bit integer 
   */
   public function getPrice()
      {
         return $this->price;
      }
   /**
   * return the vehicle type
   * @return string 
   */
   public function getVehicleType()
      {
         return $this->vehicleType;
      }
   /**
   * return the maker of the vehicle
   * @return string 
   */
   public function getMake()
      {
         return $this->make;
      }
   /**
   * return the model of the vehicle
   * @return string 
   */
   public function getModel()
      {
         return $this->model;
      }
    /**
   * return the kilometres of the vehicle
   * @return  signed 32-bit integer 
   */
   public function getKilometres()
      {
         return $this->kilometres;
      }
   /**
   * is the vehicle used or not
   * @return  boolean 
   */
   public function isItUsedOrNot()
      {
         if($this->kilometres!=0)
            {
              return true; 
            } 
         else
            {
              return false;  
            }
      }
   /**
   * gives full information about the vehicle properties
   * @return  void 
   */
   public function info()
      {
         echo 'year: '.$this->getYear().'<br/>
               price: '.$this->getPrice().'<br/>
               vehicle type: '.$this->getVehicleType().'<br/>
               make: '.$this->getMake().'<br/>
               model: '.$this->getModel().'<br/>
               kilometres: '.$this->getKilometres().'<br/>
               used: '.$this->isItUsedOrNot();
      }
}
$bmw = new vehicle(2012,24000,'car','BMW','X5','130000');
$bmw->info();
/*EX4*/
echo '<br/><br/>EX4<br/><br/>';
/**
* class MobileDevice
* @author Hristo Rusev
*/
/*модел,производител, собственик, тип на батерията, тип на екрана*/
class MobileDevice
{
   /**
   * A private variable
   * make of the Mobile Device
   * @var string
   */ 
   private $make;
   /**
   * A private variable
   * model of the Mobile Device
   * @var string
   */ 
   private $model;
   /**
   * A private variable
   * owner of the Mobile Device
   * @var string
   */ 
   private $owner;
   /**
   * A private variable
   * battery type of the Mobile Device
   * @var signed 32-bit integer
   */ 
   private $batteryType;
   /**
   * A private variable
   * screen type of the Mobile Device
   * @var float
   */ 
   private $screenType;
   /**
   * Sets $make, $model, $owner, $batteryType and $screenType to a new values upon class instantiation
   * @param string $make a value required for the class
   * @param string $model a value required for the class
   * @param string $owner a value required for the class
   * @param signed 32-bit integer $batteryType a value required for the class
   * @param float $screenType a value required for the class
   * @return void
   */
   public function __construct($make,$model,$owner,$batteryType,$screenType)
      {
         $this->make = $make;
         $this->model = $model;
         $this->owner = $owner;
         $this->batteryType = $batteryType;
         $this->screenType = $screenType;
      }
   /**
   * gives full information about the Mobile Device
   * @return  void 
   */
   public function info()
      {
         echo 'make: '.$this->make.'<br/>
               model: '.$this->model.'<br/>
               owner: '.$this->owner.'<br/>
               battery: '.$this->batteryType.' mAh<br/>
               screen: '.$this->screenType.' \'\'<br/><br/>';
      }
}
$iphone = new MobileDevice('Apple','6s','Ivan',1810,5);
$samsung = new MobileDevice('Samsung','6','Peter',1860,5.4);
$lenovo = new MobileDevice('Lenovo','s90','Hristo',2010,5.5);
$iphone->info();
$samsung->info();
$lenovo->info();
?>
