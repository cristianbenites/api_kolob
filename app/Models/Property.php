<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'district',
        'street',
        'number',
        'complement',
        'city',
        'uf',
        'bedrooms',
        'suites',
        'living_rooms',
        'kitchens',
        'room_kitchen_combined',
        'parking_spaces',
        'building_area',
        'total_area',
        'property_type',
        'property_full_price',
        'property_rental_price',
    ];
}
