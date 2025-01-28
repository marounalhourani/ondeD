<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BgCategory;

class BoardGame extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'bg_category_id'];

    // Relationship: A board game belongs to a category
    public function category()
    {
        return $this->belongsTo(BgCategory::class, 'bg_category_id');
    }// Foreign key 'bg_category_id' links to 'id' of BgCategory

}
