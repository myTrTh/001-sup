<?php
// FIRST 

$a = 3;
$b = 5;
echo 'a: '.$a.' b: '.$b.'<br>';

$b = $b-$a;
$a = $a+$b;
$b = $a-$b;

echo 'a: '.$a.' b: '.$b.'<br>';

// SECOND
$a = 1;
$n = 10;
function rec($a, $n)
{
	echo $a.' ';
	$a++;
	if ($a <= $n)
		rec($a, $n);
}

rec($a, $n);