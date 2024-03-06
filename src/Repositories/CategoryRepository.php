<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoryRepository
{
    public static function getCategory(): Collection
    {
        return Category::query()->get();
    }
}