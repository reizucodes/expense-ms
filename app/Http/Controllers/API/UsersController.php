<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

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
        try {
            $request->validate([
                'role' => ['required', 'numeric', 'max:3'],
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
                'password' => ['required', 'string', new Password(8)],
            ]);
            User::create([
                'role' => $request->role,
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            return response()->json([
                'message' => 'User stored',
                'status_code' => '200',
            ]);
        } catch (Exception $exception) {
            return response()->json([
                'message' => $exception->getMessage(),
                'status_code' => '403',
            ]);
        }
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
        $user = User::find($id);
        try {
            #if user email remains unchanged, validate password only
            if ($request->email == $user->email) {
                $request->validate([
                    'password' => ['required', 'string', new Password(8)],
                ]);
            } else {
                #validate new email
                $request->validate([
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                    'password' => ['required', 'string', new Password(8)],
                ]);
            }
            $user->update([
                'role' => $request->role,
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            return response()->json([
                'message' => 'User updated',
                'status_code' => '200',
            ]);
        } catch (Exception $exception) {
            return response()->json([
                'message' => $exception->getMessage(),
                'status_code' => '403',
            ]);
        }
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
