<?php

namespace App\Http\Controllers;

use App\Models\Podcast;
use App\Models\Station;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

/**
 * Class PodcastController
 * @package App\Http\Controllers
 */
class PodcastController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $podcasts = Podcast::all();

        $podcasts = $podcasts->map(
            function ($podcast, $index){
                $podcast->row_number = $index + 1;
                return $podcast;
            }
        );

        return view('podcast.index', compact('podcasts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $podcast = new Podcast();
        $frequencies = Station::all();
        $categories = Category::all(); 
        $users = User::role('Creador')->get();

        return view('podcast.create', compact('podcast', 'frequencies', 'categories', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Podcast::$rules);

        $podcast = Podcast::create($request->all());

        $podcast->stations()->sync($request->input('frequency', []));
        $podcast->categories()->sync($request->input('category', []));
        $podcast->users()->sync($request->input('user', []));

        return redirect()->route('podcasts.create')
            ->with('success', 'Podcast created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $podcast = Podcast::find($id);

        return view('podcast.show', compact('podcast'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $podcast = Podcast::find($id);
        $frequencies = Station::all();
        $categories = Category::all(); 
        $users = User::all();

        return view('podcast.edit', compact('podcast', 'frequencies', 'categories', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Podcast $podcast
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Podcast $podcast)
    {
        request()->validate(Podcast::$rules);

        $podcast->update($request->all());

        $podcast->stations()->sync($request->input('frequency', []));
        $podcast->categories()->sync($request->input('category', []));
        $podcast->users()->sync($request->input('user', []));

        return redirect()->route('podcasts.index')
            ->with('success', 'Podcast updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $podcast = Podcast::find($id)->delete();

        return redirect()->route('podcasts.index')
            ->with('success', 'Podcast deleted successfully');
    }
}
