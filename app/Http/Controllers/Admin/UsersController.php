<?php

namespace App\Http\Controllers\Admin;

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
        //
        $users = User::all();
        return view('admin.users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //return "hello create";
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //always use try catch for error handling
        if ($request->password != $request->password_confirmation)
            return back()->with('error', 'Passwords do not match.');
        else {
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
                return redirect()->back()->with('success', 'User added.');
            } catch (Exception $exception) {
                return redirect()->back()->with('error', $exception->getMessage());
            }
        }
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //return $id;
        $user = User::find($id);
        return view('admin.users.edit')->with('user', $user);
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
            return redirect()->back()->with('success', 'User updated.');
        } catch (Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
        $user->delete();
        return back()->with('success', 'User deleted.');
    }
}
