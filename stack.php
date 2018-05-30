<?php

echo 'Стэк';

class ReverseStack
{
	private $stack;
	private $limit;

	public function __construct(int $limit)
	{
		$this->stack = [];
		$this->limit = $limit;
	}

	public function push($item)
	{
		if (count($this->stack) < $this->limit) {
			array_unshift($this->stack, $item);
		} else {
			echo 'Нельзя расширить массив более чем на '.$this->limit.' элементов.';
		}
	}

	public function pop()
	{
		if (count($this->stack) > 0) {		
			return array_shift($this->stack);
		} else {
			echo 'Массив пусть. Нечего удалять';
		}
	}

	public function isEmpty() : bool
	{
		return empty($this->stack);

	}

	public function peek()
	{
		if (count($this->stack) > 0)
			return $this->stack[count($this->stack)-1];
		else
			echo 'Массив пусть, показывать нечего';
	}

	public function size() : int
	{
		return count($this->stack);
	}	
}

class Stack
{
	private $stack;
	private $limit;

	public function __construct(int $limit)
	{
		$this->stack = [];
		$this->limit = $limit;
	}

	public function push($item)
	{
		if (count($this->stack) < $this->limit) {
			array_push($this->stack, $item);
		} else {
			echo 'Нельзя расширить массив более чем на '.$this->limit.' элементов.';
		}
	}

	public function pop()
	{
		if (count($this->stack) > 0) {		
			return array_pop($this->stack);
		} else {
			echo 'Массив пусть. Нечего удалять';
		}
	}

	public function isEmpty() : bool
	{
		return empty($this->stack);

	}

	public function peek()
	{
		if (count($this->stack) > 0)
			return $this->stack[count($this->stack)-1];
		else
			echo 'Массив пусть, показывать нечего';
	}

	public function size() : int
	{
		return count($this->stack);
	}
}

$stack = new Stack(10);
$stack->push('string');
$stack->push(true);
$stack->push(232);
print "<pre>";
print_r($stack);
print "</pre>";
$stack->pop();
print "<pre>";
print_r($stack);
print "</pre>";
print "<pre>";
print_r($stack->peek());
print "</pre>";

$r = new ReverseStack(10);
$r->push('string');
$r->push(true);
$r->push(232);
print "<pre>";
print_r($r);
print "</pre>";
$r->pop();
print "<pre>";
print_r($r);
print "</pre>";
print "<pre>";
print_r($r->peek());
print "</pre>";