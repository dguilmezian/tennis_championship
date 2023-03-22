<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Match extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'matchs';
    protected $fillable = [
        'id_player_1',
        'id_player_2',
        'luck',
        'winner',
        'id_round'
    ];
}
