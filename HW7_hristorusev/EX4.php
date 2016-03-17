<?php
//EX4
$a_array = array(6,3,8,-7);
$b_array = array(-4,4,-10,-8);
$c_array = array(1,-10,4,14);

class quadratic_equation
{
	private $_a;
	private $_b;
	private $_c;

	function __construct($a,$b,$c)
	{
		  $this->_a = isset($a) ? $a : null;
		  $this->_b = isset($b) ? $b : null;
		  $this->_c = isset($c) ? $c : null;
		
	}
	public function setA($a) 
	{
        $this->_a = $a;
    }
    public function setB($b) 
	{
        $this->_b = $b;
    }
    public function setC($c) 
	{
        $this->_c = $c;
    }
	public function getA() 
	{
        return $this->_a;
	}
	public function getB() 
	{
        return $this->_b;
	}
	public function getC() 
	{
        return $this->_c;
	}

	function solvingTheQuadraticEquation()
	{
		$discriminant = pow($this->_b,2) - 4*$this->_a*$this->_c;
		if($discriminant < 0) 
			{ 
				return 'There are no real roots <br/>'; 
				break;
			}
		if($discriminant == 0) 
			{ 
				$x = (-1)*$this->_b/2*$this->_a;
				return 'The answer is x = '.$x.'<br/>'; 
				break;
			}
		if($discriminant > 0) 
			{
				$x1 = ((-1)*$this->_b + sqrt($discriminant))/(2*$this->_a);
				$x2 = ((-1)*$this->_b - sqrt($discriminant))/(2*$this->_a);
				return 'The answers are x1 = '.$x1.' and x2 = '.$x2.' <br/>';
				break;
			}
	}

}
for ($i=0; $i < count($a_array); $i++) 
	{ 
		$single_quadratic_equation = new quadratic_equation($a_array[$i],$b_array[$i],$c_array[$i]);
		echo 'a = '.$single_quadratic_equation->getA().'<br/>';
		echo 'b = '.$single_quadratic_equation->getB().'<br/>';
		echo 'c = '.$single_quadratic_equation->getC().'<br/>';
		echo $single_quadratic_equation->solvingTheQuadraticEquation();
		echo '<br/>';
	}
?>