<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    public function dam()
    {
        return $this->hasOne('App\Dam','id', 'dam_id');
    }
}
