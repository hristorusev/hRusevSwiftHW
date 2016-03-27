<?php
#PHPFunctions
echo 'PHPFunctions';
echo '<br/>EX1<br/>';
function writeMyName($name)
	{
		echo 'Hello '.$name.':) </br/>';
	}
writeMyName('Hristo');
echo '<br/>EX2<br/>';
function getMaxNum($numA, $numB)
	{
		if($numA>$numB)
			{
				echo $numA.'</br/>';
			}
		else if($numB>$numA)
			{
				echo $numB.'</br/>';;
			}
		else
			{
				echo $numA.'='.$numB.'<br/>';
			}
	}
getMaxNum(5,6);
echo '<br/>EX3<br/>';
function nFacturial($numN)
	{	$nFacturialNum=1;
		for($i=2;$i<=$numN;$i++)
			{
				$nFacturialNum=$nFacturialNum*$i;
			}
		return $nFacturialNum;
	}
echo nFacturial(5).'<br/>';
echo '<br/>EX4<br/>';
function reverse($numReverse)
	{
		return strrev($numReverse).'<br/>';		
	}
echo reverse(123);

echo '<br/>EX5<br/>';
function arithmeticMean($numA,$numB)
	{
		return ($numA+$numB)/2;
	}
echo arithmeticMean(3,6);
?>