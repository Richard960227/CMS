<?php

namespace App\Http\Controllers;

use App\Models\Broadcast;
use App\Models\BroadcastMode;
use App\Models\Program;
use Illuminate\Http\Request;

/**
 * Class BroadcastController
 * @package App\Http\Controllers
 */
class BroadcastController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $broadcasts = Broadcast::paginate();

        $broadcasts = $broadcasts->map(
            function ($broadcast, $index) {
                $broadcast->row_number = $index + 1;
                return $broadcast;
            }
        );

        return view('broadcast.index', compact('broadcasts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $broadcast = new Broadcast();
        $program = Program::all();
        $broadcastmode = BroadcastMode::all();

        return view('broadcast.create', compact('broadcast', 'program', 'broadcastmode'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Broadcast::$rules);

        $broadcast = Broadcast::create($request->all());

        return redirect()->route('broadcasts.create')
            ->with('success', 'Broadcast created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $broadcast = Broadcast::find($id);

        return view('broadcast.show', compact('broadcast'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $broadcast = Broadcast::find($id);
        $broadcastmodes = BroadcastMode::all();

        return view('broadcast.edit', compact('broadcast', 'broadcastmodes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Broadcast $broadcast
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Broadcast $broadcast)
    {
        request()->validate(Broadcast::$rules);

        $broadcast->update($request->all());

        return redirect()->route('broadcasts.index')
            ->with('success', 'Broadcast updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $broadcast = Broadcast::find($id)->delete();

        return redirect()->route('broadcasts.index')
            ->with('success', 'Broadcast deleted successfully');
    }
}
