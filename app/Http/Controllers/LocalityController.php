<?php

namespace App\Http\Controllers;

use App\Locality;
use App\Region;
use Illuminate\Http\Request;

class LocalityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($region)
    {
        $localities = Region::find($region)->localities()->paginate(12);

        return view('locality.index',compact('localities', 'region'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($region)
    {
        return view('locality.create',compact('region'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $region)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'translit' => 'required|string|max:255'
        ]);

        $region = Region::find($region);
        $locality = new Locality();
        $locality->name = $request->name;
        $locality->translit = $request->translit;
        $region->localities()->save($locality);

        return redirect()->route('region.locality.index',$region);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Locality  $locality
     * @return \Illuminate\Http\Response
     */
    public function show(Locality $locality)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Locality  $locality
     * @return \Illuminate\Http\Response
     */
    public function edit($region, $locality)
    {
        $locality = Locality::find($locality);
        return view('locality.edit', compact('region', 'locality'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Locality  $locality
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $region, $locality)
    {
        $locality = Locality::find($locality);
        $region = Region::find($region);
        $locality->name = $request->name;
        $locality->translit = $request->translit;
        $region->localities()->save($locality);

        return redirect()->route('region.locality.index',$region);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Locality  $locality
     * @return \Illuminate\Http\Response
     */
    public function destroy($region, $locality)
    {
        $locality = Locality::find($locality);
        $locality->delete();

        return redirect()->route('region.locality.index',$region);
    }
}
