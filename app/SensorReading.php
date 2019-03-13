<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class SensorReading extends Model
{
    protected $table = 'sensor_reading';

    public function getCreatedAtAttribute()
    {
        return  Carbon::parse($this->attributes['created_at'])->toDateTimeString();
    }
}
