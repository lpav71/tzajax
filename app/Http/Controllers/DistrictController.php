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
     * @return \Illuminate\Http\Response
     */
    public function index($locality)
    {
        $districts = Locality::find($locality)->districts()->paginate(15);

        return view('district.index',compact('locality', 'districts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($locality)
    {
        return view('district.create',compact('locality'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $locality)
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

        return redirect()->route('locality.district.index',$locality);
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
     * @return \Illuminate\Http\Response
     */
    public function edit($locality, $district)
    {
        $district = District::find($district);
        return view('district.edit', compact('locality', 'district'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\District  $district
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $locality, $district)
    {
        $locality = Locality::find($locality);
        $district = District::find($district);
        $district->name = $request->name;
        $district->translit = $request->translit;
        $locality->districts()->save($district);

        return redirect()->route('locality.district.index',$locality);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\District  $district
     * @return \Illuminate\Http\Response
     */
    public function destroy($locality, $district)
    {
        $district = District::find($district);
        $district->delete();

        return redirect()->route('locality.district.index',$locality);
    }
}
