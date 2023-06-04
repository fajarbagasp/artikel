<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{   
    // public function __construct()
    // {
    //     $this->middleware('admin');
    // }

    public function index()
    {
        $users = User::all();
        return view('admin.users.index');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        return redirect()->route('admin.users.index')->with('success', 'Data pengguna berhasil diperbarui!');
    }
}

