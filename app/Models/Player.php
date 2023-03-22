<?php

namespace App\Models;

use Database\Factories\PlayerFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Player extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'players';
    protected $fillable = [
        'name',
        'skill_level',
        'gender',
        'velocity',
        'strength',
        'reaction'
    ];

    protected static function booted()
    {
        static::factory(function () {
            return new PlayerFactory();
        });
    }

}
