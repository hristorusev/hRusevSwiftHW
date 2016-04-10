<?php
/*Да се създаде клас Square. 
Класа да съдържда:
- Квадрата, трябва да има точки О(х,у)
пресечна точка на диагоналите - от декартовата координатна система;
- метод, който по дадена страна да изчислява площ;
- метод, който по дадена страна да изчислява периметър;

Да се създаде клас Circle:
- Кръгът трябва да има точки Ох и Оу - от декартовата координатна система;
- Кръгът да може да пресмята лице и периметър;

Да се напише програма, която по даден Кръг и Квадрат да пресмята
дали кръгът може да бъде вписан в квадрата (приемаме че страните на квадрата са успоредни на Ох оста и Оу оста
- а.к.а квадрата не е завъртян по оста си);

Да се провери дали точката Ох/Оу на квадрата съвпада с тази на Кръгът;
*/
class Square
{
	private $xO;
	private $yO;
	private $a;
	public function __construct($xO,$yO,$a)
		{
			$this->xO = $xO;
			$this->yO = $yO;
			$this->a = $a;
		}
	public function  circumference()
		{
			return 4*$this->a;
		}
	public function  area()
		{
			return $this->a*$this->a;
		}
	public function getXo()
		{
			return $this->xO;
		}
	public function getYo()
		{
			return $this->yO;
		}
	public function getA()
		{
			return $this->a;
		}
}
class Circle
{
	private $xO;
	private $yO;
	private $r;
	public function __construct($xO,$yO,$r)
		{
			$this->xO = $xO;
			$this->yO = $yO;
			$this->r = $r;
		}
	public function  circumference()
		{
			return 2*$this->r*3.14;
		}
	public function  area()
		{
			return 3.14*$this->r*$this->r;
		}
	public function getXo()
		{
			return $this->xO;
		}
	public function getYo()
		{
			return $this->yO;
		}
	public function getR()
		{
			return $this->r;
		}
}
/*Вписана в изпъкнал многоъгълник окръжност е окръжността 
с център пресечната точка на ъглополовящите на ъглите на 
многоъгълника и радиус, равен на разстоянието от тази 
точка до коя да е от страните му.*/
class Incircle
{
	private $square;
	private $circle;
	public function __construct($square,$circle)
		{
			$this->square = $square;
			$this->circle = $circle;
		}
	public function compareXYsquareXYcircle()
		{
			if(($this->square->getXo() == $this->circle->getXo()) &&
			   ($this->square->getYo() == $this->circle->getYo())
			  )
				{
					return true;
				}
			else
				{
					return false;
				}
		}
	public function isItIncircle()
		{
			if(($this->compareXYsquareXYcircle()) &&
			   ($this->square->getA()/2 == $this->circle->getR())			  
			  )
				{
					return true;
				}
			else
				{
					return false;
				}
		}
}
$mySquare = new Square(1,2,6);
echo 'Square circumference:'.$mySquare->circumference().'<br/>';
echo 'Square area:'.$mySquare->area().'<br/><br/>';
$myCircle = new Circle(1,2,3);
echo 'Circle circumference:'.$myCircle->circumference().'<br/>';
echo 'Circle area:'.$myCircle->area().'<br/><br/>';
$myIncircle = new Incircle($mySquare,$myCircle);
echo 'Is it an incircle:'.$myIncircle->isItIncircle();

?>