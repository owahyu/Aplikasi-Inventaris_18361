<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawai = Pegawai::paginate(10);
        return view('pages.pegawai.index', compact('pegawai'));
    }

    public function create()
    {
        return view('pages.pegawai.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pegawai' => 'required|string|max:255',
            'nip' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
        ]);

        Pegawai::create($request->all());
        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil ditambahkan');
    }

    public function edit($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        return view('pages.pegawai.edit', compact('pegawai'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pegawai' => 'required|string|max:255',
            'nip' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
        ]);

        $pegawai = Pegawai::findOrFail($id);
        $pegawai->update($request->all());
        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil diupdate');
    }

    public function destroy($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        $pegawai->delete();
        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil dihapus');
    }
}
