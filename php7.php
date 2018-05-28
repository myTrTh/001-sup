<?php
declare(strict_types=1);

class Human
{
	public function hello(string $name)
	{
		echo 'hello '.$name;
	}	
}

class Name extends Human
{
	//
}

function get(Human $obj, $name)
{
	$obj->hello($name);
}

$name = new Name();

get($name, 1);