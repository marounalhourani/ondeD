<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BoardGame;


class BgCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // Relationship: A category has many board games
    public function boardGames()
    {
        return $this->hasMany(BoardGame::class);
    } 
}
