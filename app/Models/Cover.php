<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cover extends Model
{
    protected $fillable = ['book_id', 'color', 'format'];

    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }
}
