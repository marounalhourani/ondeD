<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Date;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'date_id'];

    public function date()
    {
        return $this->belongsTo(Date::class,'date_id');
    }
}
