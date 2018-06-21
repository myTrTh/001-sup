<?php

// сиба ину мопс такса 
// плюшевый лабрадор резиновая такса с пищалской
// Звуки и охота 

class Dog
{
	private $name;

	public function __construct(string $name)
	{
		$this->name = $name;
	}

	public function sayName(): void
	{
		echo '<br><br>'.$this->name.'<br>';
	}
}

class SoundDog extends Dog
{
	public function sound()
	{
		echo 'woof woof<br>';
	}
}

class PischDog extends SoundDog
{
	public function sound()
	{
		echo 'psch!!! psch!!!';
	}
}

class HuntingDog extends SoundDog
{
	public function hunting()
	{
		echo "I'm ready hunting!";
	}
}

class LazyDog extends SoundDog
{
	public function hunting()
	{
		echo "I'm lazy for hunting...";
	}
}

$sibu = new HuntingDog('Сибу ину');
$sibu->sayName();
$sibu->sound();
$sibu->hunting();

$taksa = new HuntingDog('Такса');
$taksa->sayName();
$taksa->sound();
$taksa->hunting();

$mops = new LazyDog('Мопс');
$mops->sayName();
$mops->sound();
$mops->hunting();

$labrador = new Dog('Плюшевый лабрадор');
$labrador->sayName();

$rTaksa = new PischDog('Резиновая такса');
$rTaksa->sayName();
$rTaksa->sound();