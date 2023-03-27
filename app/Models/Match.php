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
        'player_1_stats',
        'player_2_stats',
        'lucky_player',
        'luck',
        'winner',
        'round_id'
    ];

    public static function getMatchs($round_id)
    {
        return self::where('round_id',$round_id)->get();
    }

    public function player1()
    {
        return $this->belongsTo(Player::class, 'id_player_1');
    }

    public function player2()
    {
        return $this->belongsTo(Player::class, 'id_player_2');
    }

    public function players(){
        return Player::whereIn('id',[$this->id_player_1,$this->id_player_2])->get();
    }

    public function round()
    {
        return $this->belongsTo(Round::class, 'round_id');
    }

    public function simulateMatch($gender)
    {
        $player1 = Player::find($this->id_player_1);
        $player2 = Player::find($this->id_player_2);
        $this->luck = rand(1, 100);
        $this->lucky_player = rand(1, 2);
        if ($this->lucky_player == 1) {
            $player1->skill_level += $this->luck;
        } else {
            $player2->skill_level += $this->luck;
        }

        switch ($gender) {
            case 0 :
                $this->player_1_stats = $player1->reaction + $player1->skill_level;
                $this->player_2_stats = $player2->reaction + $player2->skill_level;
                break;
            case 1 :
                $this->player_1_stats = $player1->strength + $player1->skill_level + $player1->velocity;
                $this->player_2_stats = $player2->strength + $player2->skill_level + $player2->velocity;
                break;
        }

        if ($this->player_1_stats > $this->player_2_stats) {
            $this->winner = $player1->id;
        } elseif ($this->player_1_stats < $this->player_2_stats) {
            $this->winner = $player2->id;
        } else {
            if ($this->lucky_player == 1) {
                $this->winner = $player1->id;
            } else {
                $this->winner = $player2->id;
            }
        }

        $this->update();

        return $this->winner;
    }


}
