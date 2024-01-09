<?php

namespace App\Http\Controllers;

use App\Models\Music;
use App\Models\Interpreter;
use App\Models\MusicalGenre;
use Illuminate\Http\Request;

/**
 * Class MusicController
 * @package App\Http\Controllers
 */
class MusicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $music = Music::all();

        $music = $music->map(
            function ($music, $index){
                $music->row_number = $index + 1;
                return $music;
            }
        );

        return view('music.index', compact('music'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $music = new Music();
        $interpreters = Interpreter::all(); 
        $musicalgenres = MusicalGenre::all();
        return view('music.create', compact('music', 'interpreters', 'musicalgenres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Music::$rules);

        $music = Music::create($request->all());

        $music->interpreters()->sync($request->input('interpreter', []));
        $music->musicalGenres()->sync($request->input('musicalGenre', []));

        return redirect()->route('music.create')
            ->with('success', 'Music created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $music = Music::find($id);

        return view('music.show', compact('music'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $music = Music::find($id);
        $interpreters = Interpreter::all(); 
        $musicalgenres = MusicalGenre::all();

        return view('music.edit', compact('music', 'interpreters', 'musicalgenres'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Music $music
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Music $music)
    {
        request()->validate(Music::$rules);

        $music->update($request->all());

        $music->interpreters()->sync($request->input('interpreter', []));
        $music->musicalGenres()->sync($request->input('musicalGenre', []));

        return redirect()->route('music.index')
            ->with('success', 'Music updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $music = Music::find($id)->delete();

        return redirect()->route('music.index')
            ->with('success', 'Music deleted successfully');
    }
}
