<?php

echo 'Простые числа до 100';

$list = [];

for ($i = 2; $i < 100; $i++) {
	$prime = true;
	for ($j = 2; $j < $i; $j++) {
		if (($i % $j) == 0) {
			$prime = false;
		} 
	}

	if ($prime == true) {
		$list[] = $i;
	}
}

echo '<br>';

foreach ($list as $key) {
	echo $key.', ';
}