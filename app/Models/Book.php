<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Book extends Model
{
    protected $fillable = ['title', 'author', 'published_year', 'is_available'];

    public function cover(): HasOne
    {
        return $this->hasOne(Cover::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }
}
