<?php

include_once 'array.php';

function merge(&$list)
{
	if (count($list) > 1) {
		$middlePoint = intdiv(count($list), 2);
		$left = array_slice($list, 0, $middlePoint);
		$right = array_slice($list, $middlePoint);

		merge($left);
		merge($right);

		$i = 0;
		$j = 0;
		$k = 0;

		while ($i < count($left) && $j < count($right)) {
			if ($left[$i] < $right[$j]) {
				$list[$k] = $left[$i];
				$i++;
			} else {
				$list[$k] = $right[$j];
				$j++;
			}
			$k++;
		}

		while ($i < count($left)) {
			$list[$k] = $left[$i];
			$i++;
			$k++;
		}

		while ($j < count($right)) {
			$list[$k] = $right[$j];
			$j++;
			$k++;
		}		
	}
}

echo 'Сортировка слиянием<br><br>';
print "<pre>";
print_r($list);
print "</pre>";
merge($list);
print "<pre>";
print_r($list);
print "</pre>";
echo 'Memory: ';
echo memory_get_usage();