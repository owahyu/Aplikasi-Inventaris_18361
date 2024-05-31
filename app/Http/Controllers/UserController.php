<?php

namespace App\Http\Controllers;

use App\Http\Requests\PetugasRequest;
use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = Petugas::with('level')  // Eager load the 'level' relationship
            ->when($request->input('nama_petugas'), function ($query, $nama_petugas) {
                return $query->where('nama_petugas', 'like', '%' . $nama_petugas . '%');
            })
            ->orderBy('id_petugas', 'desc')
            ->paginate(10);

        return view('pages.users.index', compact('users'));
    }

    public function create()
    {
        return view(('pages.users.create'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_petugas' => 'required|string|max:100|min:3',
            'username' => 'required|string|max:50|regex:/^\S*$/u|unique:petugas,username',
            'password' => 'required|string|min:6',
            'id_level' => 'required|integer|exists:level,id_level',
        ], [
            'username.regex' => 'Username tidak boleh mengandung spasi.',
            'username.unique' => 'Username sudah digunakan.',
            'id_level.exists' => 'Level yang dipilih tidak valid.',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        \App\Models\Petugas::create($validatedData);

        return redirect()->route('user.index')->with('success', 'User successfully created');
    }

    public function edit($id)
    {
        $user = \App\Models\Petugas::findOrFail($id);

        return view('pages.users.edit', compact('user'));
    }

    public function update(PetugasRequest $request, Petugas $user)
    {
        $data = $request->validated();
        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);

        return redirect()->route('user.index')->with('success', 'User successfully updated');
    }

    public function destroy(Petugas $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User successfully deleted');
    }
}
