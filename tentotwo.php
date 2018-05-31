<?php

echo 'Системы счисления<br>';

class Convert
{
	public function converterFromTen(int $item, int $system)
	{
		/*
		Получаем остаток от деления на два 1 или 0, записываем
		Делим на 2 с округлением в меньшую сторону
		Повторяем пока не останется 0
		 */
		if ($system == 2 || $system == 8) {
			$stack = [];
			$toStringStack = '<br>'.$item.' по основанию '.$system.': ';
			while ($item > 0) {
				$rem = $item % $system;
				array_unshift($stack, $rem);
				$item = intdiv($item, $system);
			}
			$toStringStack .= implode($stack);
			echo $toStringStack;
		} else {
			echo '<br>Основание может быть 2 или 8, вы указали основание: '.$system;
		}
	}

	public function converterToTen(int $item, int $system)
	{
		if ($system == 2 || $system == 8) {		
			$arr = str_split($item);
			$arr = array_reverse($arr);
			$sum = 0;
			for ($i=0; $i < count($arr) ; $i++) {
				$rem = $arr[$i] * pow($system, $i);
				$sum += $rem;				
			}
			$toStringStack = '<br><br>'.$item.' в системе счисления '.$system.' по основанию 10 будет '.$sum;
			echo $toStringStack;
		} else {
			echo '<br>Основание может быть 2 или 8, вы указали основание: '.$system;
		}
	}
}

$translator = new Convert();
$translator->converterFromTen(233, 8);
$translator->converterFromTen(233, 2);

$translator->converterToTen(11101001, 2);
$translator->converterToTen(351, 8);