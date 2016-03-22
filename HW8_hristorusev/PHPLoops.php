<?php
#PHPPHPLoops
echo 'PHPLoops';
echo '<br/>EX1<br/>';
//EX1
for($i=100;$i<=999;$i++)
	{
		if($i==999)
			{
				echo $i;
			}
		else
			{
				echo$i.',';
			}
	}
echo '<br/>EX2<br/>';
//EX2
for($i=0;$i<=1000;$i++)
	{
		if((array_sum(str_split($i%3!=0))) && ($i%7!=0))  
			{
				echo $i.',';
			}
	}
echo '<br/>EX3<br/>';
//EX3
$n_array = array(3,4,5);
$x_array = array(2,3,-4);
for($i=0;$i<count($n_array);$i++)
	{
		$sum = 1;
		for($l=1;$l<=$n_array[$i];$l++)
		{
			$n_factorial=1;
			for($j=$l;$j>=1;$j--)
				{	
					$n_factorial=$n_factorial*$j;
				}
			$sum=$sum + $n_factorial/pow($x_array[$i],$l);
		}
		echo $sum.'<br/>';
	}
echo '<br/>EX4<br/>';
//EX4
function factorial($number)
{
	$n_factorial=1;
		for($j=$number;$j>=1;$j--)
			{	
				$n_factorial=$n_factorial*$j;
			}
	return $n_factorial;
}
$n_array = array(5,6,8);
$k_array = array(2,5,3);
for($i=0;$i<count($n_array);$i++)
	{
		if($k_array[$i]>1 && $n_array[$i]>$k_array[$i] && $n_array[$i]<100)
			{
				$fraction=factorial($n_array[$i])/factorial($k_array[$i]);
				echo $fraction.'<br/>';
			}
	}
echo '<br/>EX5<br/>';
//EX5
$n_array = array(2,3,4);
for($l=0;$l<count($n_array);$l++)
	{
		if(is_int($n_array[$l]))
			{
				for($i=1;$i<=$n_array[$l];$i++)
					{
						for($j=$i;$j<=$i+$n_array[$l];$j++)
							{
								echo $j.' ';
							}
						echo '<br/>';
					}
				echo '<br/>';
			}
	}		
?>

