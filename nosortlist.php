<?php

echo '<b>Несортированный список</b><br>';
echo 'Последовательный поиск<br>';
$list_not_sort = [3, 5, 2, 1, 6, 9, 7, 8];

function searchInNotSort(int $value, array $list)
{
	$steps = 0;
	$result = 0;
	foreach ($list as $item) {
		$steps++;
		if ($value == $item) {
			echo 'Найден на '.$steps.' шаге';
			$result = 1;
			break;
		}
	}
	if (!$result)
		echo 'Элемент не найден. Пройдено шагов: '.$steps;
	echo '<br>';
}

searchInNotSort(1, $list_not_sort);
searchInNotSort(7, $list_not_sort);
searchInNotSort(12, $list_not_sort);