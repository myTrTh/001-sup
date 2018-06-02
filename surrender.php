<?php

echo 'Сдача<br><br>';

class Cashbox
{
	private $coins;
	private $surrender;
	private $cash;
	private $arr_s;

	public function __construct()
	{
		$this->coins = [1, 2, 5, 10, 50, 100, 500, 1000];
	}

	public function get(int $cash)
	{
		$this->cash = $cash;
		// define surrender
		$this->surrender = rand(1, $this->cash);
		$this->proccessing();
	}

	public function proccessing()
	{
		$this->arr_s = [];
		$surrender = $this->surrender;
		while ($this->coins) {
			$coin = array_pop($this->coins);

			while ($surrender >= $coin) {
				
				if (isset($this->arr_s[$coin])) {
					$this->arr_s[$coin] += 1;
				} else {
					$this->arr_s[$coin] = 1; 
				}

				$surrender = $surrender - $coin;
				if ($surrender < $coin)
					break;
			}
		}
	}

	public function issue()
	{
		echo 'Получено: '.$this->cash.'<br>';
		echo 'Сдача: '.$this->surrender.'<br>';
		echo 'Выдано:<br>';
		foreach ($this->arr_s as $key => $value) {
			echo $value.'x'.$key.'<br>';
		}
	}
}

$cashbox = new Cashbox();
$cashbox->get(1100);
$cashbox->issue();
