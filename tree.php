<?php

echo 'Деревья<br><br>';

function binaryTree($r)
{
	return [$r, [], []];
}

function insertLeft($root, $branch)
{
	$t = array_slice($root, 1);
	if (count($t)) {
		$root[1] = [$branch, $t, []];
	} else {
		$root[1] = [$branch, [], []];
	}
	return $root;
}

function insertRight($root, $branch)
{
	$t = array_slice($root, 2);
	if (count($t)) {
		$root[2] = [$branch, $t, []];
	} else {
		$root[2] = [$branch, [], []];
	}
	return $root;
}

$root = binaryTree("a");
$root = insertLeft($root, "lb");
$root = insertLeft($root, "lc");
$root = insertRight($root, "rb");
$root = insertRight($root, "rc");
print "<pre>";
print_r($root);
print "</pre>";