<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Color extends Model
{
    public function cars(): BelongsToMany
    {
        return $this->belongsToMany(Car::class);
    }
}
