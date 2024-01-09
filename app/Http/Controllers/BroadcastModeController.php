<?php

namespace App\Http\Controllers;

use App\Models\BroadcastMode;
use Illuminate\Http\Request;

/**
 * Class BroadcastModeController
 * @package App\Http\Controllers
 */
class BroadcastModeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $broadcastModes = BroadcastMode::all();

        $broadcastModes = $broadcastModes->map(
            function ($broadcastMode, $index){
                $broadcastMode->row_number = $index + 1;
                return $broadcastMode;
            }
        );

        return view('broadcast-mode.index', compact('broadcastModes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $broadcastMode = new BroadcastMode();
        return view('broadcast-mode.create', compact('broadcastMode'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(BroadcastMode::$rules);

        $broadcastMode = BroadcastMode::create($request->all());

        return redirect()->route('broadcast-modes.create')
            ->with('success', 'BroadcastMode created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $broadcastMode = BroadcastMode::find($id);

        return view('broadcast-mode.show', compact('broadcastMode'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $broadcastMode = BroadcastMode::find($id);

        return view('broadcast-mode.edit', compact('broadcastMode'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  BroadcastMode $broadcastMode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BroadcastMode $broadcastMode)
    {
        request()->validate(BroadcastMode::$rules);

        $broadcastMode->update($request->all());

        return redirect()->route('broadcast-modes.index')
            ->with('success', 'BroadcastMode updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $broadcastMode = BroadcastMode::find($id)->delete();

        return redirect()->route('broadcast-modes.index')
            ->with('success', 'BroadcastMode deleted successfully');
    }
}
