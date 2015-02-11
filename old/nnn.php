<?php

$test = file_get_contents('http://www.omdbapi.com/?s=Murphy\'s+Law&y=&r=json&type=episode');

$NEW = json_decode($test);


foreach($NEW as $testt=>$tt){
	print( $testt. " = " . $tt);
	echo "<br>";
}
?>