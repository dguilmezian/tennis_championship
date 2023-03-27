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
        $menNames = ['Roger Federer', 'Rafael Nadal', 'Novak Djokovic', 'Andy Murray', 'Stefanos Tsitsipas', 'Daniil Medvedev', 'Dominic Thiem', 'Alexander Zverev', 'Diego Schwartzman', 'Fabio Fognini', 'Karen Khachanov', 'Gael Monfils', 'David Goffin', 'Matteo Berrettini', 'Roberto Bautista Agut', 'Felix Auger-Aliassime', 'Denis Shapovalov', 'Grigor Dimitrov', 'Borna Coric', 'Kyle Edmund', 'Nick Kyrgios', 'Stan Wawrinka', 'Jo-Wilfried Tsonga', 'Milos Raonic'];

        $womenNames = ['Serena Williams', 'Simona Halep', 'Naomi Osaka', 'Bianca Andreescu', 'Ashleigh Barty', 'Karolina Pliskova', 'Elina Svitolina', 'Sofia Kenin', 'Kiki Bertens', 'Belinda Bencic', 'Petra Kvitova', 'Johanna Konta', 'Garbiñe Muguruza', 'Aryna Sabalenka', 'Madison Keys', 'Marketa Vondrousova', 'Elena Rybakina', 'Anett Kontaveit', 'Donna Vekic', 'Maria Sakkari', 'Alison Riske', 'Karolina Muchova', 'Angelique Kerber', 'Venus Williams'];

        foreach ($menNames as $name) {
            Player::create([
                'name' => $name,
                'velocity' => rand(0, 100),
                'gender' => 1,
                'skill_level' => rand(0, 100),
                'strength' => rand(0, 100),
                'reaction' => rand(0, 100),
            ]);
        }

        foreach ($womenNames as $name) {
            Player::create([
                'name' => $name,
                'velocity' => rand(0, 100),
                'gender' => 0,
                'skill_level' => rand(0, 100),
                'strength' => rand(0, 100),
                'reaction' => rand(0, 100),
            ]);
        }
    }
}
