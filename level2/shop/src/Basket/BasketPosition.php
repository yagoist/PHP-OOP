<?php

namespace App\Basket;

use App\Product;

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
