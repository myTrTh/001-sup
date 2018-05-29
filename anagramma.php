<?php
echo 'Определение аннаграммы<br><br>';

$first = 'KjasdfjhwjkhekjhcoushflkjhwKjasdfjhwjkhekjhcoushflkjhwelhtodjhaslqkjwerhisdfalkcjvjhwiertjjelhtodjhaslqkjwerhisdfalkcjvjhwiertjj';
$second = 'jhsjhsdfjhcouhtodjhaslqkjwwjartjjerhiswjhshflkjhweldfiekalkcjvkhekjdfjhcouhtodjhaslqkjwwjartjjerhiswjhshflkjhweldfiekalkcjvkhekj';

label($first, $second);
asc_sort($first, $second);
counter($first, $second);

function label(string $first, string $second) : void {
	$start = microtime(true);
	echo 'Метод: Метка<br>';
	if (mb_strlen($first) !== mb_strlen($second)) {
		echo 'Слова не являются анаграммами';
	} else {
		$arr1 = str_split($first);
		$arr2 = str_split($second);
		$steps = 0;
		for ($j=0; $j<count($arr1); $j++) { 
			for ($i=0; $i<count($arr2); $i++) { 
				if ($arr1[$j] === $arr2[$i]) {
					$arr1[$j] = null;
					$arr2[$i] = null;
					break;
				}
				$steps++;
			}
		}
		if ($arr1 === $arr2) {
			echo 'Слова являются анаграммами';
			echo '<br>Шаги для вычисления: '.$steps;
		} else {
			echo 'Слова не является анаграммами';
		}
	}
	$finish = microtime(true);
	$speed = $finish - $start;
	echo '<br> Script time: '.$speed.'<br>';
	echo '<br><br>';
}

function asc_sort(string $first, string $second) : void {
	$start = microtime(true);
	echo 'Метод: Сортировка и сравнение<br>';
	if (mb_strlen($first) !== mb_strlen($second)) {
		echo 'Слова не являются анаграммами';
	} else {	
		$arr1 = str_split($first);
		sort($arr1);
		$arr2 = str_split($second);
		sort($arr2);
		if ($arr1 === $arr2) {
			echo 'Слова являются анаграммами';
		} else {
			echo 'Слова не является анаграммами';
		}
	}
	$finish = microtime(true);
	$speed = $finish - $start;
	echo '<br> Script time: '.$speed.'<br>';
	echo '<br><br>';	
}

function counter(string $first, string $second) : void {
	$start = microtime(true);	
	echo 'Метод: Подсчет и сравнение<br>';
	if (mb_strlen($first) !== mb_strlen($second)) {
		echo 'Слова не являются анаграммами';
	} else {
		$arr1 = str_split($first);		
		$arr2 = str_split($second);
		$counter1 = [];
		$counter2 = [];

		for ($i = 0; $i < count($arr1); $i++) {
			$pos1 = ord($arr1[$i]) - ord('a');
			$counter1[$pos1] = $counter1[$pos1] + 1;
			$pos2 = ord($arr2[$i]) - ord('a');
			$counter2[$pos2] = $counter2[$pos2] + 1;
		}
		ksort($counter1);
		ksort($counter2);

		if ($counter1 === $counter2) {
			echo 'Слова являются анаграммами';
		} else {
			echo 'Слова не является анаграммами';
		}			
	}
	$finish = microtime(true);
	$speed = $finish - $start;
	echo '<br> Script time: '.$speed.'<br>';
	echo '<br><br>';	
}