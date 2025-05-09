<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeeklyOffer extends Model
{
    use HasFactory;

    protected $fillable = [
        'letter', 'category', 'description',
    ];
}
