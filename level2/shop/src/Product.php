<?php

namespace App;

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
