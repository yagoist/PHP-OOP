<?php

namespace factory;

class Car
{
    public function __construct(private readonly string $name, private readonly int $price)
    {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): int
    {
        return $this->price;
    }
}

class CarFactory
{
    public function createCar(string $name): Car
    {
        return new Car($name, rand(10000000, 20000000));
    }
}

$carNames = ['kia', 'ford', 'lada', 'cadillac', 'chevrolet', 'mazda', 'toyota', 'nissan', 'skoda', 'li'];
$cars = [];
$totalPrice = 0;
$randomCarsNumber = rand(5, 20);

$factory = new CarFactory();


for ($i = 0; $i < $randomCarsNumber; $i++) {
    $cars[] = $factory->createCar($carNames[rand(0, 9)]);
}

foreach ($cars as $car) {
    print_r("{$car->getName()}" . " - " . "{$car->getPrice()}" . PHP_EOL);
    $totalPrice += $car->getPrice();
}

print_r("Итого - " . "$totalPrice");
