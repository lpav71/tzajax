<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Region;
use App\Locality;

class ApiRegionController extends Controller
{
    public function region($name)
    {
        $region = Region::where('name','like','%'.$name.'%')->get();
        return $region;
    }

    public function locality($region)
    {
        $locality = Region::find($region)->localities;
        return $locality;
    }

    public function district($id_locality)
    {
        $district = Locality::find($id_locality)->districts;
        return $district;
    }
}
