<?php

if(!file_exists("counter.txt")) {
	$counter = fopen("counter.txt", "w");
	fwrite($counter,"0");
	fclose($counter);
}

$counter = fopen('counter.txt', "r");
$value = fread($counter, filesize("counter.txt"));
$value = $value + 1;
fclose($counter);

$counter = fopen('counter.txt', "w");
fwrite($counter, $value);
fclose($counter);

?>