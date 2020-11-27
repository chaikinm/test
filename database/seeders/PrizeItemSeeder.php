<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrizeItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('prize_items')->insert([
            'kind' => 'money',
            'count' => 100000,
            'min' => 50,
            'max' => 5000,
        ]);
        DB::table('prize_items')->insert([
            'kind' => 'points',
            'count' => 100000,
            'min' => 10,
            'max' => 1000,
        ]);
        DB::table('prize_items')->insert([
            ['kind' => 'items', 'count' => 5, 'name' => 'Предмет 1'],
            ['kind' => 'items', 'count' => 1, 'name' => 'Предмет 2'],
            ['kind' => 'items', 'count' => 10, 'name' => 'Предмет 3'],
            ['kind' => 'items', 'count' => 3, 'name' => 'Предмет 4'],
            ['kind' => 'items', 'count' => 6, 'name' => 'Предмет 5'],
            ['kind' => 'items', 'count' => 2, 'name' => 'Предмет 6'],
            ['kind' => 'items', 'count' => 1, 'name' => 'Предмет 7'],
            ['kind' => 'items', 'count' => 4, 'name' => 'Предмет 8'],
        ]);
    }
}
