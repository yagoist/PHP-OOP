<?php

namespace App\Basket;

use App\Product;

class Basket
{
    public function __construct(private array $positions = [])
    {
    }

    public function getPositions(): array
    {
        return $this->positions;
    }

    public function addProduct(Product $product, int $quantity): self
    {
        $this->positions[] = new BasketPosition($product, $quantity);
        return $this;
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

    public function getCount(): int
    {
        return count($this->getPositions());
    }
}

