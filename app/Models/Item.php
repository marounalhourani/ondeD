<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Item extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    protected $guarded = [];

    /** @use HasFactory<\Database\Factories\ItemFactory> */
    use HasFactory;
}
