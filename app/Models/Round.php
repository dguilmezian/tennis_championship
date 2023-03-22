<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Round extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'rounds';
    protected $fillable = [
        'id_tournament',
        'luck',
        'winner',
        'id_round',
        'number'
    ];
}
