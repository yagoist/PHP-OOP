<?php

namespace App\Repositories;

use App\Contracts\CarsRepositoryContract;
use App\Models\Car;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class CarsRepository implements CarsRepositoryContract
{
    public function getCars(?int $count = null): Collection
    {
        return Car::query()
            ->when($count > 0, fn (Builder $query) => $query->limit($count))
            ->get();
    }

    public function load(int $id): Car
    {
        return Car::with(['colors', 'category'])->findOrFail($id);
    }

    public function update(array $car): void
    {
        $category = CategoryRepository::getCategory()->toArray();
        $categoryId = null;
        foreach ($category as $item) {
            if ($car['category'] === $item['name']) {
                $categoryId = $item['id'];
            }
        }

        Car::query()
            ->where('id', $car['id'])
            ->update([
                'name' => $car['name'],
                'price' => $car['price'],
                'category_id' => $categoryId
            ]);
    }

    public function addCar(array $car): void
    {
        $category = CategoryRepository::getCategory()->toArray();
        $categoryId = null;
        foreach ($category as $item) {
            if ($car['category'] === $item['name']) {
                $categoryId = $item['id'];
            }
        }

        Car::query()
            ->create([
                'name' => $car['name'],
                'price' => $car['price'],
                'category_id' => $categoryId
            ])
            ->save();
    }

    public function destroy(int $id): void
    {
        Car::query()
            ->where('id', $id)
            ->delete();
    }
}