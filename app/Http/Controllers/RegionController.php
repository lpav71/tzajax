<?php

namespace App\Http\Controllers;

use App\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return
     */
    public function index()
    {
        $regions = Region::paginate(12);
        return view('region.index',compact('regions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return
     */
    public function create()
    {
        return view('region.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'translit' => 'required|string|max:255'
        ]);

        $region = new Region();
        $region->name = $request->name;
        $region->translit = $request->translit;
        $region->save();

        return redirect(route('region.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function show(Region $region)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Region  $region
     * @return
     */
    public function edit($region)
    {
        $region = Region::find($region);
        return view('region.edit', compact('region'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Region  $region
     * @return
     */
    public function update(Request $request, $region)
    {
        $region = Region::find($region);
        $region->name = $request->name;
        $region->translit = $request->translit;
        $region->save();

        return redirect()->route('region.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Region  $region
     * @return
     */
    public function destroy($region)
    {
        $region = Region::find($region);
        $region->delete();

        return redirect()->route('region.index');
    }
}
