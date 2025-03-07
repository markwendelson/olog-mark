<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\OpeningHours\OpeningHours;

class Store extends Model
{
    protected $fillable = ['hours'];

    public function getOpeningHoursAttribute($value)
    {
        return OpeningHours::create(json_decode($value, true));
    }
}
