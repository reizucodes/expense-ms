<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        #modified query, since role is a bool, ternary operator is used to replace value with 'admin' or 'user'
        $users = User::all(['role', 'name', 'email'])->map(function ($user) {
            $user->role = $user->role ? 'admin' : 'user';
            return $user;
        });
        return response()->json($users);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //return response()->json($user);
        return response()->json([
            'user' => [
                'role' => $user['role'] ? 'admin' : 'user',
                'name' => $user['name'],
                'email' => $user['email'],
            ]
        ]);
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
    public function destroy(User $user)
    {
        //
        $user->delete();
        return response()->json([
            'message' => 'User deleted.',
        ]);
    }
}
