<?php

namespace App\Http\Controllers;

use App\Models\Line;
use Illuminate\Http\Request;

class LineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lines = Line::all();
        return view('admin.lines.index', compact('lines'));
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
        $data = $request->except('_token');

        Line::create( $data );
        return back()->with(['status'=>'success', 'message'=>__('locale.add', ['param'=>__('locale.line', ['suffix'=>'', 'prefix'=>''])])]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $line = Line::find($id);
        return view('line', compact('line'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $line = Line::find($id);

        $data = $request->except('_token');
        $line->update( $data );

        return back()->with(['status'=>'success', 'message'=>__('locale.update', ['param'=>__('locale.line', ['suffix'=>'', 'prefix'=>''])])]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Line::find($id)
            ->delete();

        return back()->with(['status'=>'success', 'message'=>__('locale.delete', ['param'=>__('locale.line', ['suffix'=>'', 'prefix'=>''])])]);
    }
}
