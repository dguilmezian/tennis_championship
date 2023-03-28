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
        'tournament_id',
        'number'
    ];

    public function matchs()
    {
        return $this->hasMany(Match::class);
    }

    public function tournament()
    {
        return $this->belongsTo(Tournament::class, 'tournament_id');
    }


    public function createRound($id, $players)
    {
        while (count($players) > 0) {
            $match = new Match;
            $match->id_player_1 =  array_pop($players);
            $match->id_player_2 =  array_pop($players);
            $match->round_id = $id;
            $match->save();
        }
    }


    public function simulateRound($gender)
    {
        $players = [];

        $matchs = Match::getMatchs($this->id);
        foreach ($matchs as $match){
            $players[] = $match->simulateMatch($gender);
        }
        return $players;
    }

}
