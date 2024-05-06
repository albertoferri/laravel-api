<?php

namespace App\Http\Controllers;

use App\Models\Technology;
use App\Http\Requests\StoreTechnologyRequest;
use App\Http\Requests\UpdateTechnologyRequest;
use Illuminate\Support\Facades\Storage;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $technologies = Technology::all();

        return view('admin.technologies.create', compact('technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTechnologyRequest $request)
    {
        $request->validated();

        $newTechnology = new Technology();
        $newTechnology->title = $request->title;

        if ($request->hasFile('preview')) {
            $path = $request->file('preview')->store('technology_preview', 'public');
            $newTechnology->preview = $path;
        }

        $newTechnology->save();

        return redirect()->route('admin');
    }

    /**
     * Display the specified resource.
     */
    public function show(Technology $technology)
    {
        $technologies = Technology::all();

        return view('admin.technologies.show', compact('technologies'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Technology $technology)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTechnologyRequest $request, Technology $technology)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Technology $technology)
    {
        $technology->delete();

        return redirect()->route('admin');
    }
}
