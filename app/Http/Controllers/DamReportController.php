<?php

namespace App\Http\Controllers;

use App\Dam;
use App\SensorReading;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DamReportController extends Controller
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
        $dams = Dam::pluck('name', 'id');

        return view('dam_report.index', compact('dams'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $request->validate([
            'dam_id' => 'required',
            'from_date' => 'required',
            'from_time' => 'required',
            'to_date' => 'required',
            'to_time' => 'required'
        ]);

        $from = Carbon::createFromFormat('d/m/Y H:i', $request->get('from_date') . ' ' . $request->get('from_time'));
        $to = Carbon::createFromFormat('d/m/Y H:i', $request->get('to_date') . ' ' . $request->get('to_time'));

        $readings = SensorReading::leftJoin('sensors', 'sensor_id', 'sensors.id')
            ->leftJoin('dams', 'dam_id', 'dams.id')
            ->where('dams.id', $request->get('dam_id'))
            ->where('sensor_reading.created_at', '>=', $from)
            ->where('sensor_reading.created_at', '<=', $to)
            ->get(['sensors.serial', 'water_level', 'sensor_reading.created_at']);

        $dams = Dam::pluck('name', 'id');

        session()->flashInput($request->input());

        return view('dam_report.index', compact('dams', 'readings'));
    }
}
