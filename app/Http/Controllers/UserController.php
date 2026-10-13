<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $users = User::when($search, function ($query, $search) {
            return $query->where('username', 'like', "%{$search}%")
                         ->orWhere('role', 'like', "%{$search}%");
        })
        ->orderBy('username', 'asc')
        ->get();

        return view('users.index', compact('users', 'search'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:30|unique:user,username',
            'password' => 'required|string|min:6',
            'role'     => 'required|in:Admin,Operator',
        ]);

        User::create([
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'role'     => $request->role,
        ]);

        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan!');
    }

    public function edit(Request $request)
    {
        $id = $request->query('id_user') ?? $request->query('id');
        $user = User::find($id);

        if ($user) {
            return view('users.edit', compact('user'));
        }

        return redirect()->route('users.index')->with('error', 'User tidak ditemukan!');
    }

    public function update(Request $request)
    {
        $user = User::find($request->id_user);

        if (!$user) {
            return redirect()->route('users.index')->with('error', 'User tidak ditemukan!');
        }

        $request->validate([
            'username' => 'required|string|max:30|unique:user,username,' . $request->id_user . ',id_user',
            'password' => 'nullable|min:6',
            'role'     => 'required|in:Admin,Operator',
        ]);

        if (!empty($request->password)) {
            $password = bcrypt($request->password);
        } else {
            $password = $user->password;
        }

        $user->update([
            'username' => $request->username,
            'password' => $password,
            'role'     => $request->role,
        ]);

        return redirect()->route('users.index')->with('success', 'Data user berhasil diperbarui!');
    }

    public function destroy(Request $request)
    {
        $user = User::find($request->id_user);

        if ($user) {
            $user->delete();
            return redirect()->route('users.index')->with('success', 'User berhasil dihapus!');
        }

        return redirect()->route('users.index')->with('error', 'User tidak ditemukan!');
    }
}