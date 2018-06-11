<?php

echo 'Бинарное дерево<br>';

class BinaryTree
{
	private $root;
	private $leftChild;
	private $rightChild;

	public function __construct(int $root)
	{
		$this->root = $root;
		$this->leftChild = Null;
		$this->rightChild = Null;
	}

	public function insert(int $branch)
	{
		$element = $this;
		$end = true;
		while ($end) {
			if ($element->root > $branch) {
				if ($element->leftChild == Null) {
					$element->leftChild = new BinaryTree($branch);
					$end = false;
				} else {
					$element = $element->leftChild;
				}
			} else if ($element->root < $branch) {
				if ($element->rightChild == Null) {
					$element->rightChild = new BinaryTree($branch);
					$end = false;
				} else {
					$element = $element->rightChild;
				}
			}
		}
	}

	public function search(int $item) {
		$element = $this;
		$end = true;
		$step = 0;

		while ($end) {
			$step++;
			if ($element->root == $item) {
				echo '<br>Найден элемент '.$item.' на '.$step.' шаге.';
				$end = false;
			} else if ($element->root > $item) {
				if ($element->leftChild == Null) {
					echo '<br>Элемент '.$item.' не найден. Потребовалось шагов: '.$step;					
					$end = false;
				}
				$element = $element->leftChild;
			} else if ($element->root < $item) {
				if ($element->rightChild == Null) {
					echo '<br>Элемент '.$item.' не найден. Потребовалось шагов: '.$step;					
					$end = false;
				}
				$element = $element->rightChild;
			}
		}		
	}
}

$tree = new BinaryTree(11);
$tree->insert(9);
$tree->insert(7);
$tree->insert(2);
$tree->insert(5);
$tree->insert(1);
$tree->insert(12);
$tree->insert(10);

$tree->search(2);
$tree->search(5);
$tree->search(12);
$tree->search(1);
$tree->search(17);
$tree->search(0);