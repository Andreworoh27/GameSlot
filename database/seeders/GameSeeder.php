<?php

namespace Database\Seeders;

use App\Models\Game;
use App\Models\GameGenre;
use Faker\Generator as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //
        DB::table('games')->insert([
            'GameTitle' => 'Counter Strike : Global Offensive',
            'gamegenre_id' => $faker->randomElement(DB::table('game_genres')->where('id', '>', 0)->pluck('id')),
            'GameImage' => 'CSGO.jpeg',
            'GamePrice' => $faker->numberBetween(0, 20),
            'GameDescription' => $faker->paragraphs(1, true),
            'PEGIRating' => $faker->randomElement([3, 7, 12, 16, 18]),
            'Created_at' => now()
        ]);
        DB::table('games')->insert([
            'GameTitle' => 'Apex Legends',
            'gamegenre_id' => $faker->randomElement(DB::table('game_genres')->where('id', '>', 0)->pluck('id')),
            'GameImage' => 'apex.jpg',
            'GamePrice' => $faker->numberBetween(0, 20),
            'GameDescription' => $faker->paragraphs(1, true),
            'PEGIRating' => $faker->randomElement([3, 7, 12, 16, 18]),
            'Created_at' => now()
        ]);
        DB::table('games')->insert([
            'GameTitle' => 'Cyberpunk',
            'gamegenre_id' => $faker->randomElement(DB::table('game_genres')->where('id', '>', 0)->pluck('id')),
            'GameImage' => 'cyberpunk.jpg',
            'GamePrice' => $faker->numberBetween(0, 20),
            'GameDescription' => $faker->paragraphs(1, true),
            'PEGIRating' => $faker->randomElement([3, 7, 12, 16, 18]),
            'Created_at' => now()
        ]);
        DB::table('games')->insert([
            'GameTitle' => 'Dota 2',
            'gamegenre_id' => $faker->randomElement(DB::table('game_genres')->where('id', '>', 0)->pluck('id')),
            'GameImage' => 'dota2.jpg',
            'GamePrice' => $faker->numberBetween(0, 20),
            'GameDescription' => $faker->paragraphs(1, true),
            'PEGIRating' => $faker->randomElement([3, 7, 12, 16, 18]),
            'Created_at' => now()
        ]);
        DB::table('games')->insert([
            'GameTitle' => 'Fifa 2023',
            'gamegenre_id' => $faker->randomElement(DB::table('game_genres')->where('id', '>', 0)->pluck('id')),
            'GameImage' => 'fifa23.jpg',
            'GamePrice' => $faker->numberBetween(0, 20),
            'GameDescription' => $faker->paragraphs(1, true),
            'PEGIRating' => $faker->randomElement([3, 7, 12, 16, 18]),
            'Created_at' => now()
        ]);
        DB::table('games')->insert([
            'GameTitle' => 'GTA V',
            'gamegenre_id' => $faker->randomElement(DB::table('game_genres')->where('id', '>', 0)->pluck('id')),
            'GameImage' => 'GTAV.jpg',
            'GamePrice' => $faker->numberBetween(0, 20),
            'GameDescription' => $faker->paragraphs(1, true),
            'PEGIRating' => $faker->randomElement([3, 7, 12, 16, 18]),
            'Created_at' => now()
        ]);
        DB::table('games')->insert([
            'GameTitle' => 'NBA 2023',
            'gamegenre_id' => $faker->randomElement(DB::table('game_genres')->where('id', '>', 0)->pluck('id')),
            'GameImage' => 'nba23.jpg',
            'GamePrice' => $faker->numberBetween(0, 20),
            'GameDescription' => $faker->paragraphs(1, true),
            'PEGIRating' => $faker->randomElement([3, 7, 12, 16, 18]),
            'Created_at' => now()
        ]);
        DB::table('games')->insert([
            'GameTitle' => 'Overwatch 2',
            'gamegenre_id' => $faker->randomElement(DB::table('game_genres')->where('id', '>', 0)->pluck('id')),
            'GameImage' => 'overwatch2.jpg',
            'GamePrice' => $faker->numberBetween(0, 20),
            'GameDescription' => $faker->paragraphs(1, true),
            'PEGIRating' => $faker->randomElement([3, 7, 12, 16, 18]),
            'Created_at' => now()
        ]);
        DB::table('games')->insert([
            'GameTitle' => 'PUBG',
            'gamegenre_id' => $faker->randomElement(DB::table('game_genres')->where('id', '>', 0)->pluck('id')),
            'GameImage' => 'pubg.jpg',
            'GamePrice' => $faker->numberBetween(0, 20),
            'GameDescription' => $faker->paragraphs(1, true),
            'PEGIRating' => $faker->randomElement([3, 7, 12, 16, 18]),
            'Created_at' => now()
        ]);
        DB::table('games')->insert([
            'GameTitle' => 'Valorant',
            'gamegenre_id' => $faker->randomElement(DB::table('game_genres')->where('id', '>', 0)->pluck('id')),
            'GameImage' => 'valorant.jpg',
            'GamePrice' => $faker->numberBetween(0, 20),
            'GameDescription' => $faker->paragraphs(1, true),
            'PEGIRating' => $faker->randomElement([3, 7, 12, 16, 18]),
            'Created_at' => now()
        ]);
    }
}
