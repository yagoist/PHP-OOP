<?php


namespace App;

use App\Basket\Basket;

require_once __DIR__ . '/autoload.php';

$basket = (new Basket())
    ->addProduct(new Product('Носки', 100), 2)
    ->addProduct(new Product('Перчатки', 200), 3)
    ->addProduct(new Product('Платки', 50), 8)
;

echo 'Товаров в корзине: ' . $basket->getCount(). PHP_EOL;
echo 'Стоимость товаров в корзине: ' . $basket->getPrice() . PHP_EOL;
