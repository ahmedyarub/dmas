<?php

namespace App\Http\Controllers;

use App\Dam;
use Illuminate\Http\Request;

class DamController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dams = Dam::all();

        return view('dams.index', compact('dams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dams.create')->with('dam', new Dam());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'gps' => 'required',
            'city' => 'required',
            'emirate' => 'required'
        ]);

        $dam = Dam::findOrNew($request->id);

        $dam->name = $request->get('name');
        $dam->gps = $request->get('gps');
        $dam->city = $request->get('city');
        $dam->emirate = $request->get('emirate');

        $dam->save();

        return redirect('/dams');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('dams.create')->with('dam', Dam::find($id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dam = Dam::find($id);
        $dam->delete();

        return redirect('/dams');
    }
}
