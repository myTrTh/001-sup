<?php

echo 'Суммирование чисел';

summ1(10000);
summ2(10000);
summ3(10000);

function summ1($n)
{
	$start = microtime(true);

	$sum = 0;

	for ($i=0; $i < $n+1; $i++)
		$sum += $i;

	$finish = microtime(true);
	$speed = $finish - $start;
	echo '<br>summ1 for n: '.$n.' = '.$sum;
	echo '<br> Script time: '.$speed.'<br>';
}

function summ2($n)
{
	$start = microtime(true);

	$sum = 0;

	for ($i=0; $i < $n+1; $i++) {
		$tmp = $i;
		$sum = $sum + $tmp;
	}

	$finish = microtime(true);
	$speed = $finish - $start;
	echo '<br>summ1 for n: '.$n.' = '.$sum;
	echo '<br> Script time: '.$speed.'<br>';
}

function summ3($n)
{
	$start = microtime(true);

	$sum = ($n * ($n+1))/2;

	$finish = microtime(true);
	$speed = $finish - $start;
	echo '<br>summ1 for n: '.$n.' = '.$sum;
	echo '<br> Script time: '.$speed.'<br>';	
}