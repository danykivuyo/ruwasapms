<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Meter;
use App\Models\MeterLog;
use Illuminate\Http\Request;

class MeterLogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return response()->json(MeterLog::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'time' => 'required|string',
            'message' => 'required|string',
            'status' => 'required|string',
            'meter' => 'required|string',
            'meter_id' => 'required|exists:meters,id',
        ]);

        $meter = Meter::findOrFail($validated['meter_id']);
        $log = $meter->meterlogs()->create($validated);
        return response()->json($log, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $log = MeterLog::find($id);
        $log->delete();
        return response()->json(null, 204);
    }
}
