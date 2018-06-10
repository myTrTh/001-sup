<?php

echo 'Бинарный поиск<br><br>';

$list_sort = [1, 3, 12, 23, 34, 45, 56, 78, 99, 101, 121, 132, 144, 150, 169, 170];

function binary(int $item, array $list)
{
	$steps = 0;
	$break = false;
	$first = 0;
	$last = count($list) - 1;
	while ($first <= $last || $break == false) {
		$steps++;
		$midpoint = intdiv(($first + $last), 2);
		if ($item == $list[$midpoint]) {
			echo "Значение ".$list[$midpoint]." найдено на ".$steps.' шаге';
			$break = true;
			break;
		} else if ($item < $list[$midpoint]) {
			$last = $midpoint-1;
		} else if ($item > $list[$midpoint]) {
			$first = $midpoint+1;
		}
	}
}

binary(56, $list_sort);