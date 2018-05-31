<?php

echo 'Системы счисления<br>';

class Convert
{
	public function converter(int $item, int $system)
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
			echo 'Основание может быть 2 или 8, вы указали основание: '.$system;
		}
	}
}

$translator = new Convert();
$translator->converter(233, 8);
$translator->converter(233, 2);