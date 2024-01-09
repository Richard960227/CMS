<?php

namespace App\Http\Controllers;

use App\Models\AudioLibrary;
use App\Models\Program;
use Illuminate\Http\Request;

/**
 * Class AudioLibraryController
 * @package App\Http\Controllers
 */
class AudioLibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $audioLibraries = AudioLibrary::all();

        $audioLibraries = $audioLibraries->map(
            function ($audioLibrary, $index) {
                $audioLibrary->row_number = $index + 1;
                return $audioLibrary;
            }
        );

        return view('audio-library.index', compact('audioLibraries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $audioLibrary = new AudioLibrary();
        $program = Program::all();
        return view('audio-library.create', compact('audioLibrary', 'program'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(AudioLibrary::$rules);

        $audioLibrary = AudioLibrary::create($request->all());

        return redirect()->route('audio-libraries.create')
            ->with('success', 'AudioLibrary created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $audioLibrary = AudioLibrary::find($id);

        return view('audio-library.show', compact('audioLibrary'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $audioLibrary = AudioLibrary::find($id);
        $program = Program::all();

        return view('audio-library.edit', compact('audioLibrary', 'program'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  AudioLibrary $audioLibrary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AudioLibrary $audioLibrary)
    {
        request()->validate(AudioLibrary::$rules);

        $audioLibrary->update($request->all());

        return redirect()->route('audio-libraries.index')
            ->with('success', 'AudioLibrary updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $audioLibrary = AudioLibrary::find($id)->delete();

        return redirect()->route('audio-libraries.index')
            ->with('success', 'AudioLibrary deleted successfully');
    }
}
