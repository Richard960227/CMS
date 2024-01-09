<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Station;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

/**
 * Class ProgramController
 * @package App\Http\Controllers
 */
class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programs = Program::all();

        $programs = $programs->map(
            function ($program, $index){
                $program->row_number = $index + 1;
                return $program;
            }
        );

        return view('program.index', compact('programs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $program = new Program();

        $frequencies = Station::all();
        $categories = Category::all(); 
        $users = User::all();
        
        return view('program.create', compact('program', 'frequencies', 'categories', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Program::$rules);

        $program = Program::create($request->all());

        $program->stations()->sync($request->input('frequency', []));
        $program->categories()->sync($request->input('category', []));
        $program->users()->sync($request->input('user', []));

        return redirect()->route('programs.create')
            ->with('success', 'Program created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $program = Program::find($id);

        return view('program.show', compact('program'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $program = Program::find($id);

        $frequencies = Station::all();
        $categories = Category::all(); 
        $users = User::all(); 

        return view('program.edit', compact('program', 'frequencies', 'categories', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Program $program
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Program $program)
    {
        request()->validate(Program::$rules);

        $program->update($request->all());

        $program->stations()->sync($request->input('frequency', []));
        $program->categories()->sync($request->input('category', []));
        $program->users()->sync($request->input('user', []));

        return redirect()->route('programs.index')
            ->with('success', 'Program updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $program = Program::find($id)->delete();

        return redirect()->route('programs.index')
            ->with('success', 'Program deleted successfully');
    }
}
