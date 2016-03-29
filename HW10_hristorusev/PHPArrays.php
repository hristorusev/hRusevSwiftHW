<?php
#PHPArrays
echo '<pre>';
echo 'PHPArrays<br/>';

echo '<br/>EX1<br/>';
//EX1
$colors = ['white', 'green', 'blue'];
echo $colors[1].'<br/>'.$colors[2].'<br/>'.	$colors[0].'<br/>';

echo '<br/>EX2<br/>';
//EX2
$x = [1,2,3,4,5,6,7,8,9,10];
function deleteArrayItem($theArray,$itemIndex)	
	{
		unset($theArray[$itemIndex]);
		return $theArray;
	}
$x = deleteArrayItem($x,5);
print_r($x);

echo '<br/>EX3<br/>';
//EX3
function addArrayItem($theArray,$itemIndex,$itemValue)
	{
		$count = count($theArray);
		if($itemIndex >= ($count-1))
			{
				$theArray[$count] = $itemValue;
			}
		else
			{
				for($i = $count; $i >= 1; $i--)
					{
						if($i == $itemIndex)
							{
								break;
							}
						$theArray[$i] = $theArray[$i-1];
					}
				$theArray[$itemIndex] = $itemValue;
			}
		return $theArray;
	}
$x = [1,2,3,4,5,6,7,8,9,10];
$x = addArrayItem($x,4,89);
print_r($x);

echo '<br/>EX4<br/>';
//EX4
$temperatureArray = array(78, 60, 62, 68, 71, 68, 73, 85, 66, 64, 76, 63, 75, 76, 73, 68, 62, 73, 72, 65, 74, 62, 62, 65, 64, 68, 73, 75, 79, 73);
function sortArray($theArray)
	{
		$count = count($theArray);
	    for ($i = 1; $i < $count; $i++) {
	        for ($j = $count - 1; $j >= $i; $j--) {
	            if($theArray[$j-1] > $theArray[$j]) {
	                $temp = $theArray[$j - 1];
	                $theArray[$j - 1] = $theArray[$j];
	                $theArray[$j] = $temp;
	            }
	        }
	    }
     	return $theArray;
	}
$temperatureArray = sortArray($temperatureArray);
$firstFiveMinTemperatureArray = array();
$firstFiveMaxTemperatureArray = array();
for($i = 0; $i < count($temperatureArray); $i++)
	{
		if(count($firstFiveMinTemperatureArray) == 5)
			{
				break;
			}
		if(empty($firstFiveMinTemperatureArray))
			{
				array_push($firstFiveMinTemperatureArray, $temperatureArray[$i]);
			}
		else
			{
				if($firstFiveMinTemperatureArray[count($firstFiveMinTemperatureArray)-1] !=  $temperatureArray[$i])
					{
						array_push($firstFiveMinTemperatureArray, $temperatureArray[$i]);
					}
			}
	}
echo 'This is the first five different mintemperature: <br/>';
print_r($firstFiveMinTemperatureArray);
for($i = count($temperatureArray)-1; $i >= 0; $i--)
	{
		if(count($firstFiveMaxTemperatureArray) == 5)
			{
				break;
			}
		if(empty($firstFiveMaxTemperatureArray))
			{
				array_push($firstFiveMaxTemperatureArray, $temperatureArray[$i]);
			}
		else
			{
				if($firstFiveMaxTemperatureArray[count($firstFiveMaxTemperatureArray)-1] !=  $temperatureArray[$i])
					{
						array_push($firstFiveMaxTemperatureArray, $temperatureArray[$i]);
					}
			}
	}
echo 'This is the first five different maxtemperature: <br/>';
print_r($firstFiveMaxTemperatureArray);
$sumOfTemperature = 0;
for($i = 0; $i < count($temperatureArray); $i++)
	{
		$sumOfTemperature = $sumOfTemperature + $temperatureArray[$i];
	}
echo 'This is the average themperature '.($sumOfTemperature/count($temperatureArray)).' <br/>';

echo '<br/>EX5<br/>';
//EX5
$min = 11;
$max = 20;
$rangeArray = array();
$count =  $max - $min;
while ( count($rangeArray) != $count) 
	{
		if(empty($rangeArray))
			{
				array_push($rangeArray, mt_rand($min,$max));
			}
		else
			{
				$temp =  mt_rand($min,$max);
				if (in_array($temp, $rangeArray)==0)
					{
						array_push($rangeArray,$temp);
					}
			}
	}
print_r($rangeArray);
echo '<br/>EX6<br/>';
//EX6
$capitals = [ "Italy"=>"Rome", "Luxembourg"=>"Luxembourg", "Belgium"=> "Brussels", "Denmark"=>"Copenhagen", 
"Finland"=>"Helsinki", "France" => "Paris", "Slovakia"=>"Bratislava", "Slovenia"=>"Ljubljana", 
"Germany" => "Berlin", "Greece" => "Athens", "Ireland"=>"Dublin", "Netherlands"=>"Amsterdam", 
"Portugal"=>"Lisbon", "Spain"=>"Madrid", "Sweden"=>"Stockholm", "United Kingdom"=>"London",
"Cyprus"=>"Nicosia", "Lithuania"=>"Vilnius", "Czech Republic"=>"Prague", "Estonia"=>"Tallin",
"Hungary"=>"Budapest", "Latvia"=>"Riga", "Malta"=>"Valetta", "Austria" => "Vienna", "Poland"=>"Warsaw"];
foreach ($capitals as $country => $capital) 
	{
		echo 'The capital of '.$country.' is '.$capital.'<br/>';	
	}
?>

