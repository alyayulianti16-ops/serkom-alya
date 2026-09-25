<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
            'password' => Hash::make($request->password),
            'role'     => $request->role,
        ]);

        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan!');
    }

    public function edit(Request $request)
    {
        $id = $request->query('id_user') ?? $request->query('id');
        $user = User::where('id_user', $id)->firstOrFail();

        return view('users.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = User::where('id_user', $request->id_user)->first();

        if (!$user) {
            return redirect()->route('users.index')->with('error', 'User tidak ditemukan atau ID kosong!');
        }

        $request->validate([
            'username' => 'required|string|max:30|unique:user,username,' . $request->id_user . ',id_user',
            'role'     => 'required|in:Admin,Operator',
        ]);

        $user->username = $request->username;
        $user->role     = $request->role;

        if ($request->filled('password')) {
            $user->password = $request->password;
        }

        $user->save();

        return redirect()->route('users.index')->with('success', 'Data user berhasil diperbarui!');
    }
    public function destroy(Request $request)
    {
        $user = User::where('id_user', $request->id_user)->first();

        if ($user) {
            $user->delete();
            return redirect()->route('users.index')->with('success', 'User berhasil dihapus!');
        }

        return redirect()->route('users.index')->with('error', 'User tidak ditemukan!');
    }
}
