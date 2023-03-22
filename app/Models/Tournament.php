<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tournament extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'tournaments';
    protected $fillable = [
        'number_of_players',
        'number_of_rounds',
        'gender',
        'title'
    ];
}
