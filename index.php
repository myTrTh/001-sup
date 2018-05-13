<?php
$arr = [2, 6, 4, 5, 13, 1, 7, 10, 9, 11, 8, 3, 12];
// $arr = [1, 3, 4, 2];

$n = count($arr);
$step = 0;
$end = 0;

foreach ($arr as $key) {
	echo $key.' ';
}
echo '<br>';

bubble_sort($arr);

// BUBBLE SORT
function bubble_sort ($arr)
{
	echo '<br>Сортировка пузырьком<br>';
	$steps = 0;
	$n = count($arr);

	for ($j = 0; $j < $n; $j++) {
		$reset = 0;
		for ($i = 0; $i < ($n - $j); $i++) {
			if ($arr[$i] > $arr[$i+1] && $arr[$i+1] != '') {
				$reset++;
				$tmp = $arr[$i+1];
				$arr[$i+1] = $arr[$i];
				$arr[$i] = $tmp;
			}
			$steps++;
		}
		if ($reset === 0)
			break;
	}

	foreach ($arr as $key) {
		echo $key.' ';
	}
	echo '<br>Шаги: '.$steps;
}

// INSERTION SORT
function insertion_sort ($arr)
{
	echo '<br>Сортировка вставками<br>';
	$steps = 0;
	$n = count($arr);

	for ($j = 0; $j < $n; $j++) {
		echo '';
	}

	foreach ($arr as $key) {
		echo $key.' ';
	}
	echo '<br>Шаги: '.$steps;
}