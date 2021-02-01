<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $fillable = ['name', 'translit'];

    public function localities()
    {
        return $this->hasMany(Locality::class);
    }
}
