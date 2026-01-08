<?php

namespace App\Http\Controllers\Dispatcher;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Inertia\Inertia;

class VehicleController extends Controller
{
    public function index()
    {
        return Inertia::render('Dispatcher/Vehicles/Index');
    }

    public function create()
    {
        return Inertia::render('Dispatcher/Vehicles/Create');
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'plate_num' => 'required|string|max:20|unique:vehicles,plate_num',
            'vehicle_type_id' => 'required|exists:vehicle_types,id',
            'capacity' => 'required|integer|min:1',
        ]);

        // Create the vehicle
        $vehicle = Vehicle::create([
            'plate_num' => $request->plate_num,
            'vehicle_type_id' => $request->vehicle_type_id,
            'capacity' => $request->capacity,
            'created_by' => auth()->id(),
            'updated_by' => auth()->id(),
        ]);

        return to_route('vehicles.index')->with('success', 'Vehicle created successfully.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(Vehicle $vehicle)
    {
        return Inertia::render('Dispatcher/Vehicles/Edit', [
            'vehicle' => $vehicle
        ]);
    }


    public function update(Request $request, string $id)
    {
        //
        $vehicle = Vehicle::findOrFail($id);

        $request->validate([
            'plate_num' => 'required|string|max:20|unique:vehicles,plate_num,' . $id,
            'vehicle_type_id' => 'required|exists:vehicle_types,id',
            'capacity' => 'required|integer|min:1',
        ]);

        $vehicle->update([
            'plate_num' => $request->plate_num,
            'vehicle_type_id' => $request->vehicle_type_id,
            'capacity' => $request->capacity,
            'updated_by' => auth()->id(),
        ]);

        return to_route('vehicles.index')->with('success', 'Vehicle updated successfully.');
    }


    public function destroy(string $id)
    {
        //
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->delete();
        return to_route('vehicles.index')->with('success', 'Vehicle deleted successfully.');
    }
}
