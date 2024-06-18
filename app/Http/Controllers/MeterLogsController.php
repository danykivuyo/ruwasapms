<?php

namespace App\Http\Controllers;

use App\Models\Meter;
use App\Models\MeterLog;
use App\Models\MeterLogs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MeterLogsController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public $logs;
    public function index()
    {
        //
        return view("meter-logs");
    }

    public function fetch()
    {
        //
        if (Auth::check()) {
            $user = User::find(Auth::user()->id);
            if ($user->role == "cbwso") {
                $this->logs = MeterLog::all()
                    ->where('cbwso', $user->cbwso);

            } else if ($user->role == "district") {
                $this->logs = MeterLog::all()
                    ->where('district', $user->district);

            } else if ($user->role == "region") {
                $this->logs = MeterLog::all()
                    ->where('region', $user->region);

            } else if ($user->role == "admin") {
                $this->logs = MeterLog::all();

            } else {
                return [];
            }

            return $this->logs;
        } else {
            return [];
        }
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
        //
        $meter = Meter::findOrFail($request->meter_id);
        $meter_log = new MeterLog([
            "time" => $request->time,
            "message" => $request->message,
            "status" => $request->meter,
            "region" => $meter->region,
            "district" => $meter->district,
            "cbwso" => $meter->cbwso,
        ]);

        $meter->meterlogs()->save($meter_log);

        return response()->json(['message' => 'Meter log saved successfully!'], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Meterlog $meterlog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Meterlog $meterlog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MeterLog $meterlog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Meterlog $meterlog)
    {
        //
    }
}
