<?php
#PHPConditionalStatements
echo 'PHPConditionalStatements';
echo '<br/>EX1<br/>';
//EX1
$a_array = array(5,3,5.5);
$b_array = array(2,4,4.5);
for ($i=0; $i < count($a_array); $i++) 
{
	if($a_array[$i]>$b_array[$i]) 
	{
		echo $a_array[$i].' '.$b_array[$i].'<br/>';  
	}
	else if($a_array[$i]<$b_array[$i])
	{
		echo $b_array[$i].' '.$a_array[$i].'<br/>'; 	
	}
	else
	{
		echo $a_array[$i].' and '.$b_array[$i].' are equal<br/>'; 
	}
}
echo '<br/>EX2<br/>';
//EX2
$score_array = array(2,4,9,-1,'a',10);
for ($i=0; $i < count($score_array); $i++) 
	{
		if( is_string ($score_array[$i]) || $score_array[$i] < 0)
			{
				$score_array[$i] = $score_array[$i].' is an invalid score!';
			}
		else if ( $score_array[$i] >= 10)
			{
				$score_array[$i] = $score_array[$i]*100; 
			}
		else
			{
				switch ($score_array[$i]) 
					{
				    	case 0:       
				    	case 1:
				    	case 2:
				    	case 3: $score_array[$i] = $score_array[$i]*10; break; 
				    	case 4:
				    	case 5:
				    	case 6: $score_array[$i] = $score_array[$i]*15; break;
				    	case 7:
				    	case 8:
				    	case 9: $score_array[$i] = $score_array[$i]*20; break;
				    	default: $score_array[$i] = $score_array[$i].' is an invalid score!'; 
				    }
			}		
		echo $score_array[$i].'<br/>';
	 }	
echo '<br/>EX3<br/>';	
//EX3
$character_array = array(5,1,'Q','q');
for ($i=0; $i < count($character_array); $i++) 
	{
		if  ( ($character_array[$i]>=2 && $character_array[$i]<=10 && is_int($character_array[$i]) ) || 
			  ($character_array[$i]=='J') ||
		      ($character_array[$i]=='Q') || 
		      ($character_array[$i]=='K') || 
		      ($character_array[$i]=='A')
			)
		  
		    {
		    	echo $character_array[$i].' - yes<br/>';
		    }
		else
			{
				echo $character_array[$i].' - no<br/>';
			}
	}
echo '<br/>EX4<br/>';	
//EX4
$a_array = array(5,-2,-2,0);
$b_array = array(2,-2,1,9);
$c_array = array(2,1,3,-1);
for ($i=0; $i < count($a_array); $i++) 
	{
		if( ($a_array[$i]>0 && $b_array[$i]>0 && $c_array[$i]>0) ||
			($a_array[$i]>0 && $b_array[$i]<0 && $c_array[$i]<0) ||
			($a_array[$i]<0 && $b_array[$i]>0 && $c_array[$i]<0) ||
			($a_array[$i]<0 && $b_array[$i]<0 && $c_array[$i]>0)
		  )
			{
				echo '+ <br/>';
			}
		else if($a_array[$i]==0 || $b_array[$i]==0 || $c_array[$i]==0)
			{
				echo '0 <br/>';
			}
		else
			{
				echo '- <br/>';
			}

	}
echo '<br/>EX5<br/>';	
//EX5
$ex5_array =  array(
					 array(5,2,2),
					 array(-2,-2,1),
					 array(-2,4,3),
					 array(0,-2.5,5)
					);
function find_max($array)
{	
	$max = $array[0];
	for ($i=1; $i < count($array); $i++) 
	{
		if($max<$array[$i])
			{
				$max = $array[$i];
			}
	}
	return $max;
}
for ($i=0; $i < count($ex5_array); $i++) 
	{
		echo 'MaX is '.find_max($ex5_array[$i]).'<br/>';
	}
echo '<br/>EX6<br/>';	
//EX6
$ex6_array =  array(
					 array(5,2,2,4,1),
					 array(-2,-22,1,0,0),
					 array(-2,4,3,2,0),
					 array(0,-2.5,5,5,5)
					);
for ($i=0; $i < count($ex6_array); $i++) 
	{
		echo 'MaX is '.find_max($ex6_array[$i]).'<br/>';
	}
echo '<br/>EX7<br/>';	
//EX7
$ex7_array =  array(
					 array(5,1,2),
					 array(5,2,1),
					 array(5,1,7),
					 array(-2,-2,1),
					 array(-2,3,4),
					 array(-2,4,3),
					 array(1,2,3),
					 array(0,1,-1)
					);
for ($i=0; $i < count($ex7_array); $i++) 
	{	$temp;
		if($ex7_array[$i][0]>$ex7_array[$i][1])
			{
				if($ex7_array[$i][0]>$ex7_array[$i][2])
					{
						if( $ex7_array[$i][1]<$ex7_array[$i][2])
							{
						$temp = $ex7_array[$i][1];
						$ex7_array[$i][1] = $ex7_array[$i][2];
						$ex7_array[$i][2] = $temp;
							}
					}
				else
					{
						$temp = $ex7_array[$i][2];
						$ex7_array[$i][2] = $ex7_array[$i][1];
						$ex7_array[$i][1] = $temp;

						$temp = $ex7_array[$i][0];
						$ex7_array[$i][0] = $ex7_array[$i][1];
						$ex7_array[$i][1] = $temp;

					}
			}
		else
			{
				if($ex7_array[$i][0]<$ex7_array[$i][2])
					{	
						$temp = $ex7_array[$i][0];
						$ex7_array[$i][0] = $ex7_array[$i][2];
						$ex7_array[$i][2] = $temp;
						if($ex7_array[$i][0]<$ex7_array[$i][1])
							{ 
								$temp = $ex7_array[$i][0];
								$ex7_array[$i][0] = $ex7_array[$i][1];
								$ex7_array[$i][1] = $temp;
							}
					}
				else
					{
						$temp = $ex7_array[$i][0];
						$ex7_array[$i][0] = $ex7_array[$i][1];
						$ex7_array[$i][1] = $temp;
					}
			}

		echo $ex7_array[$i][0].' '.$ex7_array[$i][1].' '.$ex7_array[$i][2].'<br/>';
	}
echo '<br/>EX8<br/>';	
//EX8
$ex8_array = array(2,1,0,-0.1,'hi',10);
for ($i=0; $i < count($ex8_array); $i++) 
{
	if  ($ex8_array[$i]>=0 && $ex8_array[$i]<=9 && is_int($ex8_array[$i]))
		{
			switch ($ex8_array[$i]) 
						{
					    	case 0: echo $ex8_array[$i].' is zero <br/>';  break;     
					    	case 1:	echo $ex8_array[$i].' is one <br/>';  break;
					    	case 2: echo $ex8_array[$i].' is two <br/>';  break;
					    	case 3: echo $ex8_array[$i].' is tree <br/>';  break; 
					    	case 4: echo $ex8_array[$i].' is four <br/>';  break;
					    	case 5: echo $ex8_array[$i].' is five <br/>';  break;
					    	case 6: echo $ex8_array[$i].' is six <br/>';  break;
					    	case 7: echo $ex8_array[$i].' is seven <br/>';  break;
					    	case 8: echo $ex8_array[$i].' is eight <br/>';  break;
					    	case 9: echo $ex8_array[$i].' is nine <br/>';  break;
					    	default: echo $ex8_array[$i].' is not a digit! <br/>'; 
					    }
		}
	else
		{
			echo $ex8_array[$i].' is not a digit! <br/>'; 
		}
}
echo '<br/>EX9<br/>';	
//EX9
function units_and_number_to_20($number)
{
	switch ($number) 
		{
	    	case 0: echo 'zero ';  break;     
	    	case 1:	echo 'one  ';  break;
	    	case 2: echo 'two  ';  break;
	    	case 3: echo 'tree ';  break; 
	    	case 4: echo 'four ';  break;
	    	case 5: echo 'five ';  break;
	    	case 6: echo 'six ';  break;
	    	case 7: echo 'seven ';  break;
	    	case 8: echo 'eight ';  break;
	    	case 9: echo 'nine ';  break;
	    	case 10: echo'ten ';  break;
	    	case 11: echo'eleven ';  break;
	    	case 12: echo'twelve ';  break;
	    	case 13: echo'thirteen ';  break;
	    	case 14: echo'foutreen ';  break;
	    	case 15: echo'fifteen ';  break;
	    	case 16: echo'sixteen ';  break;
	    	case 17: echo'seventeen ';  break;
	    	case 18: echo'eighteen ';  break;
	    	case 19: echo'nineteen ';  break;
	    	default: echo'Not a number! '; 
	    }
}
function tenths($number)
{
	switch ($number)
		{
			case 2: echo 'twenty  ';  break;
	    	case 3: echo 'thirty ';  break; 
	    	case 4: echo 'forty ';  break;
	    	case 5: echo 'fifty ';  break;
	    	case 6: echo 'sixty ';  break;
	    	case 7: echo 'seventy ';  break;
	    	case 8: echo 'eightty ';  break;
	    	case 9: echo 'ninety ';  break;
	    	default: echo'Not a number! '; 
		}
}

$ex9_array = array(0,9,25,98,400,617,999,20,100,487,511,-2,0.2,'a');
for ($i=0; $i < count($ex9_array); $i++) 
{
	echo $ex9_array[$i].' - ';
	if(is_int($ex9_array[$i]) && $ex9_array[$i]>=0 && $ex9_array[$i]<=999)
		{
			if($ex9_array[$i]<20)
				{
					units_and_number_to_20($ex9_array[$i]);
				}
			else if($ex9_array[$i]<=99)
				{
					tenths((int)($ex9_array[$i]/10));
					if(($ex9_array[$i]%10)!=0)
						{
							units_and_number_to_20($ex9_array[$i]%10);
						}
				}
			else if ($ex9_array[$i]<=999)
				{
					units_and_number_to_20((int)($ex9_array[$i]/100));
					echo 'hundred';
					if($ex9_array[$i]%100!=0)
						{
							echo ' and ';
							if($ex9_array[$i]%100<20)
								{
									echo units_and_number_to_20($ex9_array[$i]%100);
								}
							else
								{
									tenths((int)($ex9_array[$i]%100/10));
									if(units_and_number_to_20($ex9_array[$i]%100%10)!=0)
										{
											echo units_and_number_to_20($ex9_array[$i]%100%10);
										}
								}
						}
				}
		}
	else
		{
			echo 'It is out of range or it is not  number!';
		}
	echo '<br/>';
}
?>

