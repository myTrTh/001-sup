<?php

class BinaryTree
{
	private $root;
	private $leftChild;
	private $rightChild;

	public function __construct($root)
	{
		$this->root = $root;
		$this->leftChild = Null;
		$this->rightChild = Null;
	}

	public function insertLeft($newNode)
	{
		if ($this->leftChild == Null) {
			$this->leftChild = new BinaryTree($newNode);
		} else {
			$t = new BinaryTree($newNode);
			$t->leftChild = $this->leftChild;
			$this->leftChild = $t;
		}
	}

	public function insertRight($newNode)
	{
		if ($this->rightChild == Null) {
			$this->rightChild = new BinaryTree($newNode);
		} else {
			$t = new BinaryTree($newNode);
			$t->rightChild = $this->rightChild;
			$this->rightChild = $t;
		}
	}

	public function showRoot()
	{
		print "<pre>";
		print_r($this->root);
		print "</pre>";
	}

	public function getLeftChild()
	{
		return $this->leftChild;
	}

	public function getRightChild()
	{
		return $this->rightChild;
	}	
}

$tree = new BinaryTree("root");
$tree->insertLeft("left-1");
$tree->insertRight("right-1");
$tree->insertLeft("left-2");
$tree->insertLeft("left-3");

class Order
{
	public function preorder($tree)
	{
		if ($tree) {
			$tree->showRoot();
			if ($tree->getLeftChild()) {
				$this->preorder($tree->getLeftChild());
			}
			if ($tree->getRightChild()) {
				$this->preorder($tree->getRightChild());
			}			
		}
	}

	public function postorder($tree)
	{
		if ($tree) {
			if ($tree->getLeftChild()) {
				$this->postorder($tree->getLeftChild());
			}
			if ($tree->getRightChild()) {
				$this->postorder($tree->getRightChild());
			}
			$tree->showRoot();
		}
	}
}

$order = new Order();
$order->preorder($tree);
echo '<hr>';
$order->postorder($tree);