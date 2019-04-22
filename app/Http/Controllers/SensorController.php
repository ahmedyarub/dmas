<?php

namespace App\Http\Controllers;

use App\Dam;
use App\Sensor;
use App\SensorReading;
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
        $this->middleware('auth')->except(['reading']);
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
     * @param \Illuminate\Http\Request $request
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
     * @param int $id
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
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sensor = Sensor::find($id);
        $sensor->delete();

        return redirect('/sensors');
    }

    public function reading($sensor_id, $reading)
    {
        $readings = explode('|',$reading);

        $sensor_reading = new SensorReading();

        $sensor_reading->sensor_id = $sensor_id;
        $sensor_reading->temperature = $readings[0];
        $sensor_reading->humidity = $readings[1];
        $sensor_reading->water_level = round(($readings[2]/1024)*40);

        $sensor_reading->save();

        if($sensor_reading->water_level>20) {
            file_get_contents('https://api.smsglobal.com/http-api.php?action=sendsms&user=oaea3hxa&password=zDrfqiJZ&from=Test&to=5521992627364&text=Dam%20warning');
        }
    }

}
