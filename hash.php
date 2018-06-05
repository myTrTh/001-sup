<?php

echo 'Хэш таблица без проверки колизий';

class HashTable
{
	private $hash;
	private $size;

	public function __construct(int $size)
	{
		$this->hash = [];
		$this->size = $size;
	}

	public function add(int $item)
	{
		$key = $item % $this->size;

		if (empty($this->hash[$key])) {
			$this->hash[$key] = $item;
			$this->show();
		} else {
			echo 'Возникла коллизия, так как ключ '.$key.' уже использован';
		}
	}

	public function search(int $item)
	{
		$key = $item % $this->size;
		if ($this->hash[$key] == $item)
			echo '<br>Значение '.$item.' найдено в ячейке с ключом '.$key;
		else
			echo '<br>Значение отсутствует';
	}

	private function show()
	{
		print "<pre>";
		print_r($this->hash);
		print "</pre>";
	}
}

$hash = new HashTable(11);
$hash->add(23);
$hash->add(24);
$hash->add(26);
$hash->add(28);
$hash->add(32);
$hash->add(37);

$hash->search(54);
$hash->search(28);
