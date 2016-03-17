<?php
$first_list_of_number = array(5,10,12,4,9,0);
$second_list_of_number = array(-5,-0,0.2,20,9,0);
for ($i=0; $i < count($first_list_of_number); $i++) 
	{	echo $first_list_of_number[$i].'<'.$second_list_of_number[$i].'<br/>';
		var_dump($first_list_of_number[$i] < $second_list_of_number[$i]);
		echo '<br/>';
		echo $first_list_of_number[$i].'>'.$second_list_of_number[$i].'<br/>';
		var_dump($first_list_of_number[$i] > $second_list_of_number[$i]);
		echo '<br/>';
		echo $first_list_of_number[$i].'<='.$second_list_of_number[$i].'<br/>';
		var_dump($first_list_of_number[$i] <= $second_list_of_number[$i]);
		echo '<br/>';
		echo $first_list_of_number[$i].'>='.$second_list_of_number[$i].'<br/>';
		var_dump($first_list_of_number[$i] >= $second_list_of_number[$i]);
		echo '<br/>';
		echo $first_list_of_number[$i].'=='.$second_list_of_number[$i].'<br/>';
		var_dump($first_list_of_number[$i] == $second_list_of_number[$i]);
		echo '<br/>';
		echo $first_list_of_number[$i].'!='.$second_list_of_number[$i].'<br/>';
		var_dump($first_list_of_number[$i] != $second_list_of_number[$i]);
		echo '<br/><br/>';
	}
?>