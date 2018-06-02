<?php

echo 'Ханойская башня<br><br>';
// реализовать ханойскую башню
// реализовать выдачу сдачи оптимальным способом (банкомат)

const MAX = 3;

function hanoi($a, $b, $c)
{
	if (!empty($a) and (empty($b) || $a[count($a)-1] < $b[count($b)-1]))
		array_unshift($b, array_shift($a));
	else if (!empty($a) and (empty($c) || $a[count($a)-1] < $c[count($c)-1]))
		array_unshift($c, array_shift($a));
	else if (!empty($b) and (empty($c) || $b[count($b)-1] < $c[count($c)-1]))
		array_unshift($c, array_shift($b));
	else if (!empty($c) and (empty($b) || $c[count($c)-1] < $b[count($b)-1]))
		array_unshift($b, array_shift($c));
	else if (!empty($b) and (empty($a) || $b[count($b)-1] < $a[count($a)-1]))
		array_unshift($a, array_shift($b));
	else if (!empty($c) and (empty($a) || $c[count($c)-1] < $a[count($a)-1]))
		array_unshift($a, array_shift($c));					

	if (count($b) == MAX || count($c) == MAX) {
		print "<pre>";
		print_r($a);
		print_r($b);
		print_r($c);
		print "</pre>";
	} else {
		print "<pre>";
		print_r($a);
		print_r($b);
		print_r($c);
		print "</pre>";
		echo '<br><br>';
		hanoi($a, $b, $c);
	}
}

$a = [1, 2, 3];
$b = [];
$c = [];

if (count($a) != MAX)
	throw new Exception('Неверное изначальное условие.');
hanoi($a, $b, $c);