<?php

include_once 'array.php';

// INSERTION SORT
function insertion_sort(&$arr)
{
	$n = count($arr);

	for ($j=1; $j<$n; $j++) {
		for ($x = $j-1; $x >= 0; $x--) {
			if ($arr[$x+1] < $arr[$x]) {
				$tmp = $arr[$x+1];
				$arr[$x+1] = $arr[$x];
				$arr[$x] = $tmp;
			}
			if ($arr[$x] >= $arr[$x-1])
				break;
		}
	}
}

echo 'Сортировка вставками<br><br>';
print "<pre>";
print_r($list);
print "</pre>";
insertion_sort($list);
print "<pre>";
print_r($list);
print "</pre>";
echo 'Memory: ';
echo memory_get_usage();