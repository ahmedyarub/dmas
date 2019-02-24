<?php

namespace App\Http\Controllers;

use App\Dam;
use App\Sensor;
use Illuminate\Http\Request;

class SensorController extends Controller
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
        $sensors = Sensor::with('dam')->get();

        return view('sensors.index', compact('sensors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sensor = new Sensor();

        $dams = Dam::pluck('name', 'id');

        return view('sensors.create', compact('sensor', 'dams'));
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
            'serial' => 'required',
            'dam_id' => 'required',
        ]);

        $sensor = Sensor::findOrNew($request->id);

        $sensor->serial = $request->get('serial');
        $sensor->dam_id = $request->get('dam_id');

        $sensor->save();

        return redirect('/sensors');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sensor = Sensor::find($id);

        $dams = Dam::pluck('name', 'id');

        return view('sensors.create', compact('sensor', 'dams'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sensor = Sensor::find($id);
        $sensor->delete();

        return redirect('/sensors');
    }

}