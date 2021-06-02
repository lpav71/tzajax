<?php

namespace App\Http\Controllers;

use App\District;
use App\Locality;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return
     */
    public function index($region, $locality)
    {
        $districts = Locality::find($locality)->districts()->paginate(12);

        return view('district.index',compact('locality', 'districts', 'region'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return
     */
    public function create($region, $locality)
    {
        return view('district.create',compact('locality', 'region'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return
     */
    public function store(Request $request, $region,  $locality)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'translit' => 'required|string|max:255'
        ]);

        $locality = Locality::find($locality);
        $district = new District();
        $district->name = $request->name;
        $district->translit = $request->translit;
        $locality->districts()->save($district);

        return redirect()->route('region.locality.district.index',[$region, $locality]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\District  $district
     * @return \Illuminate\Http\Response
     */
    public function show(District $district)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\District  $district
     * @return
     */
    public function edit($region, $locality, $district)
    {
        $district = District::find($district);
        return view('district.edit', compact('locality', 'district', 'region'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\District  $district
     * @return
     */
    public function update(Request $request, $region,  $locality, $district)
    {
        $locality = Locality::find($locality);
        $district = District::find($district);
        $district->name = $request->name;
        $district->translit = $request->translit;
        $locality->districts()->save($district);

        return redirect()->route('region.locality.district.index',[$region, $locality]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\District  $district
     * @return
     */
    public function destroy($region, $locality, $district)
    {
        $district = District::find($district);
        $district->delete();

        return redirect()->route('region.locality.district.index',[$region, $locality]);
    }
}
