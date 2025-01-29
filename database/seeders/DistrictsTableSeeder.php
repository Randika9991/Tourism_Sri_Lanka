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
                'province_id' => 1,
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
                'province_id' => 1,
                'name' => 'Gampaha',
                'about' => 'Known for its serene countryside.',
                'mostly_popular' => 'Wildlife & nature, Adventure, Romantic',
                'location' => '7.0900° N, 79.9994° E',
                'image' => 'gampaha.jpg',
                'travel_season' => 'November to February',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'province_id' => 2,
                'name' => 'Kandy',
                'about' => 'A city rich in history, home to the Temple of the Tooth Relic.',
                'mostly_popular' => 'Cultural heritage, Scenic beauty, Pilgrimage',
                'location' => '7.2906° N, 80.6337° E',
                'image' => 'uploads/images/kandy.jpg',
                'travel_season' => 'December to March',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'province_id' => 2,
                'name' => 'Matale',
                'about' => 'Famous for its spice gardens and historical sites.',
                'mostly_popular' => 'Wildlife & nature, Adventure, Hiking',
                'location' => '7.4675° N, 80.6234° E',
                'image' => 'uploads/images/matale.jpg',
                'travel_season' => 'November to February',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
