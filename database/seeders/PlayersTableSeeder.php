<?php

namespace Database\Seeders;

use App\Models\Player;
use Illuminate\Database\Seeder;

class PlayersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        Player::create([
            'name' => 'Male Player',
            'velocity' => 80,
            'gender' => 1,
            'skill_level' => 90,
            'strength' => 85,
            'reaction' => 0
        ]);

        Player::create([
            'name' => 'Female Player',
            'velocity' => 70,
            'gender' => 0,
            'skill_level' => 85,
            'strength' => 80,
            'reaction' => 10
        ]);


    }

}
