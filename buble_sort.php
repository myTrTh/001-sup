<?php

include_once 'array.php';

// BUBBLE SORT
function bubble_sort(&$list)
{
	$n = count($list);

	for ($j = 0; $j < $n; $j++) {
		$reset = 0;
		for ($i = 0; $i < ($n - $j); $i++) {
			if ($list[$i] > $list[$i+1] && $list[$i+1] != '') {
				$reset++;
				$tmp = $list[$i+1];
				$list[$i+1] = $list[$i];
				$list[$i] = $tmp;
			}
		}
		if ($reset === 0)
			break;
	}
}

echo 'Сортировка пузырьком<br><br>';
print "<pre>";
print_r($list);
print "</pre>";
bubble_sort($list);
print "<pre>";
print_r($list);
print "</pre>";
echo 'Memory: ';
echo memory_get_usage();