<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HotelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('hotels')->insert([
            [
                'province_id' => 1,
                'district_id' => 1,
                'name' => 'Grand Ocean Hotel',
                'description' => 'A luxurious 5-star hotel with an ocean view, featuring a rooftop infinity pool, spa, and gourmet dining.',
                'location' => 'Colombo, Sri Lanka',
                'latitude' => 6.9271,
                'longitude' => 79.8612,
                'images' => json_encode([
                    'uploads/hotels/grand_ocean1.jpg',
                    'uploads/hotels/grand_ocean2.jpg',
                    'uploads/hotels/grand_ocean3.jpg'
                ]),
                'rating' => 4.8,
                'price_per_night' => 250.00,
                'amenities' => 'WiFi, Pool, Spa, Parking, Gym, Restaurant, Bar',
                'room_types' => json_encode(["Deluxe Room", "Suite", "Presidential Suite"]),
                'check_in_time' => '14:00:00',
                'check_out_time' => '11:00:00',
                'contact_number' => '+94 112 345 678',
                'email' => 'info@grandoceanhotel.com',
                'website' => 'https://grandoceanhotel.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
