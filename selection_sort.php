<?php

include_once 'array.php';

// SELECTION SORT
function selection_sort(&$arr)
{
	$n = count($arr);

	for ($j = 0; $j < $n; $j++) {
		$min = $j;
		for ($i = $j+1; $i < ($n); $i++) {
			if ($arr[$i] < $arr[$min])
				$min = $i;
			$steps++;
		}
		if ($arr[$j] > $arr[$min]) {
			$tmp = $arr[$j];
			$arr[$j] = $arr[$min];
			$arr[$min] = $tmp;
		}
	}
}

echo 'Сортировка выбором<br><br>';
print "<pre>";
print_r($list);
print "</pre>";
selection_sort($list);
print "<pre>";
print_r($list);
print "</pre>";
echo 'Memory: ';
echo memory_get_usage();