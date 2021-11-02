<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Property extends Model implements HasMedia
{
    use HasFactory;
    use SoftDeletes;
    use InteractsWithMedia;

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

    protected $casts = [
        'room_kitchen_combined' => 'boolean',
        'bedrooms'              => 'integer',
        'suites'                => 'integer',
        'living_rooms'          => 'integer',
        'kitchens'              => 'integer',
        'parking_spaces'        => 'integer',
    ];

    public function resolveRouteBinding($value, $field = null)
    {
        return $this->where($field ?? 'id', $value)->withTrashed()->firstOrFail();
    }
}
