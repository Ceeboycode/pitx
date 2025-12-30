<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserStoreRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;
use App\Models\Role;
class UserController extends Controller
{
    public function create()
    {
        return Inertia::render('Admin/Users/Create', [
            'roles' => Role::where('is_active', true)
                        ->select('id', 'name')
                        ->orderBy('name')
                        ->get(),
        ]);
    }

    public function store(UserStoreRequest $request)
    {
        // dd('store method called');
        // Logic to create a new user with $validated data from the request
        $validated = $request->validated();

         // Set password as last name (hashed)
        $validated['password'] = Hash::make($validated['l_name']);

        // Create the user
        User::create($validated);

        //  Redirect back with success message
        return redirect()->route('admin-users-create')->with('success', 'User created successfully.');
    }
}
