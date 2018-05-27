<?php

class Gate
{
	protected $label;
	protected $output;

	public function __construct()
	{
		$this->label = "Gate";
		$this->output = Null;
	}

	public function getLabel()
	{
		return $this->label;
	}

	public function getOutput()
	{
		$this->output = $this->GateLogic();
		echo $this->label.': '.$this->output.'<br>';
	}

	public function out()
	{
		return $this->GateLogic();
	}

	public function GateLogic() {}
}

class BinaryGate extends Gate
{
	protected $pinA;
	protected $pinB;

	public function __construct()
	{
		parent::__construct();
		$this->label = "BinaryGate";

		$this->pinA = Null;
		$this->pinB = Null;
	}

	public function setPin(int $pinA = Null, int $pinB = Null)
	{
		$this->pinA = $pinA;
		$this->pinB = $pinB;
	}	
}

class AndGate extends BinaryGate
{
	public function __construct()
	{
		parent::__construct();
		$this->label = "AndGate";
	}

	public function GateLogic(): int
	{
		if ($this->pinA == 1 and $this->pinB == 1)
			return 1;
		else
			return 0;
	}
}

class OrGate extends BinaryGate
{
	public function __construct()
	{
		parent::__construct();
		$this->label = "OrGate";
	}

	public function GateLogic(): int
	{
		if ($this->pinA == 0 and $this->pinB == 0)
			return 0;
		else
			return 1;
	}
}

class UnaryGate extends Gate
{
	protected $pin;

	public function __construct()
	{
		parent::__construct();
		$this->label = "UnaryGate";

		$this->pin = Null;
	}

	public function setPin(int $pin = Null)
	{
		$this->pin = $pin;
	}
}

class NotGate extends UnaryGate
{
	public function __construct()
	{
		parent::__construct();
		$this->label = "NotGate";
	}

	public function GateLogic(): int
	{
		if ($this->pin == 1)
			return 0;
		else
			return 1;
	}
}

class Connector
{
	private $fromGate1;
	private $fromGate2;
	private $toGate;

	public function __construct($toG, Gate $fromG1, $fromG2 = null)
	{
		$this->toGate = $toG;
		$this->fromGate1 = $fromG1;
		if ($fromG2 != null)
			$this->fromGate2 = $fromG2;
		else
			$this->fromGate2 = null;
	}

	public function connect()
	{
		if ($this->fromGate2 == null) {
			$this->toGate->setPin($this->fromGate1->out());
			echo 'Connect from '.$this->fromGate1->getLabel().' to '.$this->toGate->getLabel().': '.$this->toGate->out().'<br>';
		} else {
			$this->toGate->setPin($this->fromGate1->out(), $this->fromGate2->out());
			echo 'Connect from '.$this->fromGate1->getLabel().' and '.$this->fromGate2->getLabel().' to '.$this->toGate->getLabel().': '.$this->toGate->out().'<br>';
		}
	}
}

$from1 = new AndGate();
$from1->setPin(1, 1);
$to1 = new NotGate();

$connector1 = new Connector($to1, $from1);
$connector1->connect();

$from2 = new AndGate();
$from2->setPin(1, 0);
$to2 = new NotGate();

$connector2 = new Connector($to2, $from2);
$connector2->connect();

$from3 = new OrGate();
$from3->setPin(0, 0);
$to3 = new NotGate();

$connector3 = new Connector($to3, $from3);
$connector3->connect();

$from4 = new OrGate();
$from4->setPin(1, 1);
$from41 = new NotGate();
$from41->setPin(0);
$to4 = new AndGate();

$connector4 = new Connector($to4, $from4, $from41);
$connector4->connect();