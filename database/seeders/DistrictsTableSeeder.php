<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistrictsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('districts')->insert([
            [
                'province_id' => 1, // Example province ID
                'name' => 'Colombo',
                'about' => 'The commercial capital of Sri Lanka.',
                'mostly_popular' => 'Arts & culture, Family friendly',
                'location' => '6.9271° N, 79.8612° E',
                'image' => 'colombo.jpg',
                'travel_season' => 'December to March',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'province_id' => 1, // Example province ID
                'name' => 'Gampaha',
                'about' => 'Known for its serene countryside.',
                'mostly_popular' => 'Wildlife & nature, Adventure, Romantic',
                'location' => '7.0900° N, 79.9994° E',
                'image' => 'gampaha.jpg',
                'travel_season' => 'November to February',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            //more 23
        ]);
    }
}
