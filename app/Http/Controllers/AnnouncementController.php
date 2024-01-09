<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

/**
 * Class AnnouncementController
 * @package App\Http\Controllers
 */
class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $announcements = Announcement::all();

        $announcements = $announcements->map(
            function ($announcement, $index){
                $announcement->row_number = $index +1;
                return $announcement;
            }
        );

        return view('announcement.index', compact('announcements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $announcement = new Announcement();
        return view('announcement.create', compact('announcement'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Announcement::$rules);

        $announcement = Announcement::create($request->all());

        return redirect()->route('announcements.create')
            ->with('success', 'Announcement created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $announcement = Announcement::find($id);

        return view('announcement.show', compact('announcement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $announcement = Announcement::find($id);

        return view('announcement.edit', compact('announcement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Announcement $announcement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Announcement $announcement)
    {
        request()->validate(Announcement::$rules);

        $announcement->update($request->all());

        return redirect()->route('announcements.index')
            ->with('success', 'Announcement updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $announcement = Announcement::find($id)->delete();

        return redirect()->route('announcements.index')
            ->with('success', 'Announcement deleted successfully');
    }
}
