<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Locality extends Model
{
    protected $fillable = ['name', 'translit', 'region_id'];

    public function districts()
    {
        return $this->hasMany(district::class);
    }
}
