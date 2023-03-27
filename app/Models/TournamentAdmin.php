<?php

namespace App\Models;


use PhpParser\Node\Expr\Cast\Object_;

class TournamentAdmin
{

    public static function generateTournament(Tournament $tournament, $players)
    {
        $round_number = 1;

        //rounds logic
        while ($round_number <= $tournament->number_of_rounds) {
            $round = new Round();
            $round->tournament_id = $tournament->id;
            $round->number = $round_number;
            $round->save();

            //shuffle the players array so that a new tournament is always generated
            if ($round_number == 1){
                shuffle($players);
            }

            $round->createRound($round->id,$players);

            $players= $round->simulateRound($tournament->gender);

            $round_number++;
        }
        $tournament = Tournament::with('rounds.matchs')->find($tournament->id);
        foreach($tournament->rounds as $round){
            foreach($round->matchs as $match){
                $match->player_1=Player::select('name')->where('id',$match->id_player_1)->first();
                $match->player_2=Player::select('name')->where('id',$match->id_player_2)->first();
                if($round->number == $tournament->number_of_rounds){
                    $tournament->championship_winner = Player::select('name')->where('id',$match->winner)->first();
                }
            }
        }

        return $tournament;
    }
}
