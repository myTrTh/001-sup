<?php

echo 'Универсальная структура данных<br>';

class Struct
{
	private $limit;
	private $struct_type;
	private $struct;

	public function __construct(int $limit, string $struct_type)
	{
		$this->struct = [];
		$this->limit = $limit;
		if ($struct_type == 'stack' || $struct_type == 'queue') {
			$this->struct_type = $struct_type;
		} else {
			throw new Exception("Задан неправильный тип структуры.");
		}
	}

	public function push($item)
	{
		if ($this->struct_type == 'stack')
			return $this->push_tail($item);
		else if ($this->struct_type == 'queue')
			return $this->push_head($item);
	}

	public function pop()
	{
		if ($this->struct_type == 'stack')
			return $this->pop_head();
		else if ($this->struct_type == 'queue')
			return $this->pop_tail();
	}

	private function push_head($item)
	{
		array_unshift($this->struct, $item);
	}

	private function push_tail($item)
	{
		array_push($this->struct, $item);
	}
	private function pop_head()
	{
		return array_shift($this->struct);
	}

	private function pop_tail()
	{
		return array_pop($this->struct);
	}
}

$struct = new Struct(10, 'stack');
$struct->push(true);
$struct->push("string");
$struct->push(23);
echo 'СТЭК';
print "<pre>";
print_r($struct);
print "</pre>";
$struct->pop();
print "<pre>";
print_r($struct);
print "</pre>";

$struct = new Struct(10, 'queue');
$struct->push(true);
$struct->push("string");
$struct->push(23);
echo 'ОЧЕРЕДЬ';
print "<pre>";
print_r($struct);
print "</pre>";
$struct->pop();
print "<pre>";
print_r($struct);
print "</pre>";