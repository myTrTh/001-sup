<?php

include_once 'Cart.php';
include_once 'User.php';

$user1 = new User();

$cart1 = new Cart($user1);

$product1 = ['id' => 1, 'price' => 5250.00, '100001', 'TV Samsung SKL100'];
$product2 = ['id' => 2, 'price' => 3500.00, '100002', 'Indezit NV5L'];
$product3 = ['id' => 3, 'price' => 3000.00, '100003', 'Xiaomi XLL'];

$cart1->addItem($product1);

$cart1->firstOrder();

echo '<br>';
$cart1->showTotal();

$cart2 = new Cart($user1);
$cart2->addItem($product1);
$cart2->addItem($product2);
$cart2->addItem($product3);

echo '<br>';
$cart2->showTotal();

$cart3 = new Cart($user1);
$cart3->addItem($product1);
$cart3->addItem($product2);

echo '<br>';
$cart3->showTotal();
// первый заказ скидка 100 руб
// персионерам 5%
// 500 руб если сумма заказ больше 10000

