<?php

namespace App\Http\Controllers;

use App\Models\Interpreter;
use Illuminate\Http\Request;

/**
 * Class InterpreterController
 * @package App\Http\Controllers
 */
class InterpreterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $interpreters = Interpreter::paginate();

        $interpreters = $interpreters->map(
            function ($interpreter, $index){
                $interpreter->row_number = $index + 1;
                return $interpreter;
            }
        );

        return view('interpreter.index', compact('interpreters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $interpreter = new Interpreter();
        return view('interpreter.create', compact('interpreter'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Interpreter::$rules);

        $interpreter = Interpreter::create($request->all());

        return redirect()->route('interpreters.create')
            ->with('success', 'Interpreter created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $interpreter = Interpreter::find($id);

        return view('interpreter.show', compact('interpreter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $interpreter = Interpreter::find($id);

        return view('interpreter.edit', compact('interpreter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Interpreter $interpreter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Interpreter $interpreter)
    {
        request()->validate(Interpreter::$rules);

        $interpreter->update($request->all());

        return redirect()->route('interpreters.index')
            ->with('success', 'Interpreter updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $interpreter = Interpreter::find($id)->delete();

        return redirect()->route('interpreters.index')
            ->with('success', 'Interpreter deleted successfully');
    }
}
