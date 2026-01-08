<?php

namespace App\Http\Controllers\Dispatcher;

use App\Http\Controllers\Controller;
use App\Models\VehicleType;
use Illuminate\Http\Request;
use Inertia\Inertia;

class VehicleTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehicleTypes = VehicleType::with(['creator', 'updater'])->get();

        return Inertia::render('Dispatcher/VehicleType/Index', [
            'vehicleTypes' => $vehicleTypes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return Inertia::render('Dispatcher/VehicleType/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:150|unique:vehicle_types,name',
        ]);

        VehicleType::create([
            'name' => $request->name,
            'created_by' => auth()->id(),
            'updated_by' => auth()->id(),
        ]);

        return to_route('vehicle-types.index')->with('success', 'Vehicle Type created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VehicleType $vehicleType)
    {
        return Inertia::render('Dispatcher/VehicleType/Edit', [
            'vehicleType' => $vehicleType->load(['creator', 'updater']),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VehicleType $vehicleType)
    {
        $request->validate([
            'name' => 'required|string|max:150|unique:vehicle_types,name,' . $vehicleType->id,
        ]);

        $vehicleType->update([
            'name' => $request->name,
            'updated_by' => auth()->id(),
        ]);

        return to_route('vehicle-types.index')->with('success', 'Vehicle Type updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VehicleType $vehicleType)
    {
    
        $vehicleType->delete();

        return to_route('vehicle-types.index')->with('success', 'Vehicle Type deleted successfully.');
    }
}
