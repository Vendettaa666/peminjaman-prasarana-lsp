<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $alldata = User::all();
        // return response()->json($alldata);
        return view('dashboard.user.index', compact('alldata'));

    }

    public function create()
    {
        return view('dashboard.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed',
            'role' => 'required|string',
            'nisn' => 'required|string|unique:users',
            'kelas' => 'required|string',
            'jurusan' => 'required|string',
        ]);
        // Create the user
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'nisn' => $request->nisn,
            'kelas' => $request->kelas,
            'jurusan' => $request->jurusan,
        ]);
        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan.');
    }

    public function show($id)
    {
        $userfind = User::findOrFail($id);
        return view('dashboard.user.show', compact('userfind'));
    }

    public function edit($id)
    {
        $userfind = User::findOrFail($id);
        return view('dashboard.user.edit', compact('userfind'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'role' => 'required|string',
            'nisn' => 'required|string|unique:users,nisn,'.$id,
            'kelas' => 'required|string',
            'jurusan' => 'required|string',
        ]);
        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'nisn' => $request->nisn,
            'kelas' => $request->kelas,
            'jurusan' => $request->jurusan,
        ]);
        return redirect()->route('user.index')->with('success', 'User berhasil diupdate.');

    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User berhasil dihapus.');
    }


}
