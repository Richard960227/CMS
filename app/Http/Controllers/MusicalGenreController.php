<?php

namespace App\Http\Controllers;

use App\Models\MusicalGenre;
use Illuminate\Http\Request;

/**
 * Class MusicalGenreController
 * @package App\Http\Controllers
 */
class MusicalGenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $musicalGenres = MusicalGenre::all();

        $musicalGenres = $musicalGenres->map(
            function ($musicalGenre, $index){
                $musicalGenre->row_number = $index + 1;
                return $musicalGenre;
            }
        );

        return view('musical-genre.index', compact('musicalGenres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $musicalGenre = new MusicalGenre();
        return view('musical-genre.create', compact('musicalGenre'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(MusicalGenre::$rules);

        $musicalGenre = MusicalGenre::create($request->all());

        return redirect()->route('musical-genres.create')
            ->with('success', 'MusicalGenre created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $musicalGenre = MusicalGenre::find($id);

        return view('musical-genre.show', compact('musicalGenre'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $musicalGenre = MusicalGenre::find($id);

        return view('musical-genre.edit', compact('musicalGenre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  MusicalGenre $musicalGenre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MusicalGenre $musicalGenre)
    {
        request()->validate(MusicalGenre::$rules);

        $musicalGenre->update($request->all());

        return redirect()->route('musical-genres.index')
            ->with('success', 'MusicalGenre updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $musicalGenre = MusicalGenre::find($id)->delete();

        return redirect()->route('musical-genres.index')
            ->with('success', 'MusicalGenre deleted successfully');
    }
}
