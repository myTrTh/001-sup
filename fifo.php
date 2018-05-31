<?php

echo 'Очередь<br>';

class Queue
{
	private $queue;
	private $limit;

	public function __construct(int $limit)
	{
		$this->queue = [];
		$this->limit = $limit;
	}

	public function push($item)
	{
		if (count($this->queue) < $this->limit) {
			array_unshift($this->queue, $item);
		} else {
			echo 'Нельзя расширить очередь более чем на '.$this->limit.' элементов.';
		}
	}

	public function pop()
	{
		if (count($this->queue) > 0) {		
			return array_pop($this->queue);
		} else {
			echo 'Очередь пуста. Нечего удалять';
		}
	}

	public function isEmpty() : bool
	{
		return empty($this->queue);

	}

	public function peek()
	{
		if (count($this->queue) > 0)
			return $this->queue[count($this->queue)-1];
		else
			echo 'Очередь пуста, показывать нечего';
	}

	public function size() : int
	{
		return count($this->queue);
	}
}

$queue = new Queue(10);
$queue->push(1);
$queue->push(2);
$queue->push(3);

print "<pre>";
print_r($queue);
print "</pre>";

$queue->pop();

print "<pre>";
print_r($queue);
print "</pre>";