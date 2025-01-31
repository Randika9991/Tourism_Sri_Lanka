<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Province;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = [
        'district_id',
        'province_name',
        'name',
        'description',
        'category',
        'location',
        'latitude',
        'longitude',
        'images',
        'rating',
        'price_per_night',
        'amenities',
        'room_types',
        'check_in_time',
        'check_out_time',
        'contact_number',
        'email',
        'website',
    ];

    protected $casts = [
        'images' => 'array', // Cast images column to an array
        'room_types' => 'array', // Cast room_types column to an array
    ];

    // Relationships
    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }
}
