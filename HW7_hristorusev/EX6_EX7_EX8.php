<?php
//EX 6
echo 'Tomorrow I\'ll learn PHP global variables. <br/> This is a bad command : del c:\*.* <br/><br/>';
//EX 7
echo 'Current PHP version is ' . phpversion().'<br/>';
echo basename($_SERVER['PHP_SELF']).' was last modified: ' . date ('F d Y H:i:s.', filemtime(basename($_SERVER['PHP_SELF']))).'<br/><br/>';
//EX 8	
echo 'Current URL is '.$_SERVER['REQUEST_URI'].'<br/>';
?>