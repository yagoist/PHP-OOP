<?php

namespace kitchen;

class Fork
{
    public function __construct(public int $numberOfTeeth)
    {
    }
}

class Cup
{
    public function __construct(public int $volume)
    {
    }
}

class Table
{
    public function __construct(public string $color)
    {
    }
}

class Kitchen
{
    private array $items = [];

    public function addItem(Cup|Table|Fork $item): static
    {
        $this->items[] = $item;
        return $this;
    }

    public function getItems(): array
    {
        return $this->items;
    }
}

$kitchen = new Kitchen();
$kitchen
    ->addItem(new Cup(300))
    ->addItem(new Cup(500))
    ->addItem(new Cup(400))
    ->addItem(new Table('white'))
    ->addItem(new Fork(4))
    ->addItem(new Fork(5));

print_r($kitchen->getItems());
