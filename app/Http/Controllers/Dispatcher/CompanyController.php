<?php

namespace App\Http\Controllers\Dispatcher;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::with(['creator', 'updater'])->get();

        return Inertia::render('Dispatcher/Company/Index', [
            'companies' => $companies,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Dispatcher/Company/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100|unique:companies,name',
        ]);

        Company::create([
            'name' => $request->name,
            'created_by' => auth()->id(),
            'updated_by' => auth()->id(),
        ]);

        return to_route('companies.index')->with('success', 'Company created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        return Inertia::render('Dispatcher/Company/Edit', [
            'company' => $company->load([
                'creator:id,f_name,l_name',
                'updater:id,f_name,l_name',
            ]),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        $request->validate([
            'name' => 'required|string|max:100|unique:companies,name,' . $company->id,
        ]);

        $company->update([
            'name' => $request->name,
            'updated_by' => auth()->id(),
        ]);

        return to_route('companies.index')->with('success', 'Company updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        $company->delete();

        return to_route('companies.index')->with('success', 'Company deleted successfully.');
    }
}
