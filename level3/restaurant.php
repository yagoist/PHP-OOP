<?php

namespace restaurant;

abstract class Dish
{
    abstract public function getName(): string;

    abstract public function getPrice(): int;
}

class Cook
{
    /** @var array|Dish[] */
    protected array $order = [];

    public function addDishToOrder(Dish $dish): self
    {
        $this->order[] = $dish;
        return $this;
    }

    public function prepareFood(): void
    {
        foreach ($this->order as $item) {
            print_r("Повар приготовил: {$item->getName()}" . PHP_EOL);
        }
        print_r("Стоимость заказа: {$this->getOrderPrice()}" . PHP_EOL);
    }

    protected function getOrderPrice(): int
    {
        $totalPrice = 0;
        foreach ($this->order as $item) {
            $totalPrice += $item->getPrice();
        }
        return $totalPrice;
    }
}

class Chef extends Cook
{
    public function prepareFood(): void
    {
        foreach ($this->order as $item) {
            print_r("Шеф повар приготовил: {$item->getName()}" . PHP_EOL);
        }
        $price = parent::getOrderPrice() * 5;
        print_r("Стоимость заказа: {$price}" . PHP_EOL);
    }
}

class Salad extends Dish
{

    public function getName(): string
    {
        return 'Салат';
    }

    public function getPrice(): int
    {
        return 300;
    }
}

class Chicken extends Dish
{

    public function getName(): string
    {
        return 'Запеченая курица';
    }

    public function getPrice(): int
    {
        return 1000;
    }
}

class TomatoSoup extends Dish
{

    public function getName(): string
    {
        return 'Томатный суп';
    }

    public function getPrice(): int
    {
        return 500;
    }
}

$cook = (new Cook())
        ->addDishToOrder(new Chicken())
        ->addDishToOrder(new TomatoSoup())
        ->addDishToOrder(new Salad());
$cook->prepareFood();

$chef = (new Chef())
        ->addDishToOrder(new Chicken())
        ->addDishToOrder(new TomatoSoup())
        ->addDishToOrder(new Salad());
$chef->prepareFood();