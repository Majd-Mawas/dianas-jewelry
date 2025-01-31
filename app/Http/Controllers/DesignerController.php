<?php

namespace App\Http\Controllers;

use App\Models\Designer;
use Illuminate\Http\Request;

class DesignerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $designers = Designer::all();

        return view('dashboard.designers.index', compact('designers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $designer = Designer::create($input);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Designer $designer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Designer $designer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Designer $designer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Designer $designer)
    {
        $designer->delete();

        return redirect()->back();
    }
}
