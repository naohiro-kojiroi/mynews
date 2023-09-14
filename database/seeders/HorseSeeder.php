<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Horse;

class HorseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Horse::create([
            'name' => 'タップ',
        ]);
        Horse::create([
            'name' => 'ダンス',
        ]);
        Horse::create([
            'name' => 'スカイ',
        ]);
        Horse::create([
            'name' => 'さくら',
        ]);
        Horse::create([
            'name' => 'ケンタ',
        ]);
        
    }
}
