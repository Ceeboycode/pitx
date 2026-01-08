<?php

namespace App\Http\Controllers\Dispatcher;

use App\Http\Controllers\Controller;
use App\Models\Route;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RouteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Inertia::render('Dispatcher/Routes/Index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Dispatcher/Routes/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|string|max:255',
            'vehicle_type_id' => 'required|exists:vehicle_types,id',
        ]);

        // Create the route
        $route = Route::create([
            'name' => $request->name,
            'vehicle_type_id' => $request->vehicle_type_id,
            'created_by' => auth()->id(),
            'updated_by' => auth()->id(),
        ]);

        return to_route('routes.index')->with('success', 'Route created successfully.');
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
    public function edit(Route $route)
    {
        return Inertia::render('Dispatcher/Routes/Edit', [
            'route' => $route,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Route $route)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'vehicle_type_id' => 'required|exists:vehicle_types,id',
        ]);

        // Update the route
        $route->update([
            'name' => $request->name,
            'vehicle_type_id' => $request->vehicle_type_id,
            'updated_by' => auth()->id(),
        ]);

        return to_route('routes.index')->with('success', 'Route updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Route $route)
    {
        $route->delete();

        return to_route('routes.index')->with('success', 'Route deleted successfully.');
    }
}
