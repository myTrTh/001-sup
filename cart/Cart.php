<?php

class Cart
{
	private $_user;
	private $_discount;
	private $firstOrder;
	private $discountShow = [];

	private $_items = [];

	public function __construct(?User $user)
	{
		$this->_user = $user;
		$this->_discount = 0;
		$this->firstOrder = 0;
	}

	public function getUser(): ?User
	{
		return $this->_user;
	}

	// item_id, price, sku, etc.
	public function addItem(array $item): void
	{
		$this->_items[] = $item;
	}

	public function getTotalAmount(): int
	{
		$ret = 0;
		foreach ($this->_items as $item)
			$ret += $item['price'];
		return $ret;
	}

	public function getDiscountedTotalAmount(): int
	{
		return $this->getTotalAmount() * $this->_getDiscount();
	}

	private function _getDiscount(): float
	{
		return 0;
	}

	public function firstOrder(): void
	{
		$this->firstOrder = 1;
	}

	public function showTotal(): void
	{
		echo '<br>Сумма заказа: '.$this->getTotalAmount();
		if ($this->getTotalAmount() > 10000) {
			$this->_discount += 500;
			$this->discountShow[] = [500, 'Скидка за сумму заказа более 10000р.'];
		}
		if ($this->firstOrder) {
			$this->_discount += 100;
			$this->discountShow[] = [100, 'Скидка за первый заказ.'];
		}
		if ($this->_user->getAge() >= 60) {
			$cnt = $this->getTotalAmount() * 0.05;
			$this->_discount += $cnt;
			$this->discountShow[] = [$cnt, 'Скидка для пенсионеров 5%.'];
		}
		foreach ($this->discountShow as $val) {
			echo '<br>'.$val[1].' '.$val[0];			
		}
		echo '<br>Скидка итого: '.$this->_discount;

		$total = $this->getTotalAmount() - $this->_discount;
		echo '<br>ИТОГО: '.$total;
	}
}