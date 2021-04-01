<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static paginate(int $int)
 */
class Region extends Model
{
    protected $fillable = ['name', 'translit'];

    public function localities()
    {
        return $this->hasMany(Locality::class);
    }
}
