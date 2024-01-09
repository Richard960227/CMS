<?php

namespace App\Http\Controllers;

use App\Models\Station;
use Illuminate\Http\Request;

/**
 * Class StationController
 * @package App\Http\Controllers
 */
class StationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stations = Station::all();

        $stations = $stations->map(
            function ($station, $index) {
                $station->row_number = $index + 1;
                return $station;
            }
        );

        return view('station.index', compact('stations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $station = new Station();
        return view('station.create', compact('station'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Station::$rules);

        $station = Station::create($request->all());

        return redirect()->route('stations.create')
            ->with('success', 'Station created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $station = Station::find($id);

        return view('station.show', compact('station'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $station = Station::find($id);

        return view('station.edit', compact('station'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Station $station
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Station $station)
    {
        request()->validate(Station::$rules);

        $station->update($request->all());

        return redirect()->route('stations.index')
            ->with('success', 'Station updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $station = Station::find($id)->delete();

        return redirect()->route('stations.index')
            ->with('success', 'Station deleted successfully');
    }
}
