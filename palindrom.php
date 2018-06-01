<?php

echo 'Вычисление палиндрома<br>';

class Deck
{
	private $deck;

	public function __construct()
	{
		$this->deck = [];
	}

	public function enqueue($item)
	{
		array_unshift($this->deck, $item);
	}

	public function push($item)
	{
		array_push($this->deck, $item);
	}
	public function dequeue()
	{
		return array_shift($this->deck);
	}

	public function pop()
	{
		return array_pop($this->deck);
	}

	public function size()
	{
		return count($this->deck);
	}
}

function isPalindrom(string $palindromRow)
{
	$deck = new Deck();
	$palindrom = str_split($palindromRow);
	foreach ($palindrom as $ch) {
		$deck->push($ch);
	}

	$error = false;
	$steps = 0;
	while ($deck->size() > 1 && $error == false) {
		$first = $deck->dequeue();
		$last = $deck->pop();
		$steps++;
		if ($first != $last)
			$error = true;
	}

	switch ($error) {
		case 1:
			$result = "не";
			break;
		default:
			$result = "";
			break;
	}
	echo 'Это '.$result.' палиндром<br>';
	echo 'Для вычесления палиндрома длинной '.count($palindrom).' потребовалось '.$steps.' шагов.<br><br>';
}

$palindrom1 = 'abba'; // true
$palindrom2 = 'abbdbba'; // true
$palindrom3 = 'abcdefg'; // false
$palindrom4 = 'bbbbb'; // true
$palindrom5 = 'abcdcfa'; // false

isPalindrom($palindrom1);
isPalindrom($palindrom2);
isPalindrom($palindrom3);
isPalindrom($palindrom4);
isPalindrom($palindrom5);
