<?php

namespace shop;

class Product
{
    public function __construct(private readonly string $title, private readonly int $price)
    {
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function getTitle(): string
    {
        return $this->title;
    }
}

class BasketPosition
{
    public function __construct(private readonly Product $product, private readonly int $quantity)
    {
    }

    public function getProduct(): Product
    {
        return $this->product;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function getPrice(): int
    {
        return $this->product->getPrice() * $this->getQuantity();
    }
}

class Basket
{
    public function __construct(private array $positions = [])
    {
    }

    public function getPositions(): array
    {
        return $this->positions;
    }

    public function addProduct(Product $product, int $quantity): void
    {

        $this->positions[] = new BasketPosition($product, $quantity);
    }

    public function getPrice(): int
    {
        $price = 0;
        foreach ($this->getPositions() as $position) {
            $price += $position->getProduct()->getPrice() * $position->getQuantity();
        }
        return $price;
    }

    public function describe(): string
    {
        $describe = '';
        foreach ($this->getPositions() as $position) {
             $describe = $describe . "{$position->getProduct()->getTitle()} - {$position->getProduct()->getPrice()} - {$position->getQuantity()}" . PHP_EOL;
        }
        return $describe;
    }
}

class Order
{
    public function __construct(private readonly Basket $basket)
    {
    }

    public function getBasket(): Basket
    {
        return $this->basket;
    }

    public function getPrice(int $delivery): int
    {
        return $this->getBasket()->getPrice() + $delivery;
    }
}


$delivery = 300;
$basket = new Basket();
$basket->addProduct(new Product('Носки', 200), 5);
$basket->addProduct(new Product('Перчатки', 300), 3);
$basket->addProduct(new Product('Платки', 100), 10);

$order = new Order($basket);

print_r("Создан заказ, на общую сумму: {$order->getPrice($delivery)}. \nСостав заказа: \n{$order->getBasket()->describe()}");
