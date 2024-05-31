<?php

namespace App\Http\Controllers;

use App\Models\Ruang;
use Illuminate\Http\Request;

class RuangController extends Controller
{
    public function index()
    {
        $ruang = Ruang::paginate(10);
        return view('pages.ruang.index', compact('ruang'));
    }

    public function create()
    {
        return view('pages.ruang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_ruang' => 'required|string|max:255',
            'kode_ruang' => 'required|string|max:255|unique:ruang,kode_ruang',
            'keterangan' => 'nullable|string',
        ]);

        Ruang::create($request->all());

        return redirect()->route('ruang.index')->with('success', 'Ruang created successfully.');
    }


    public function edit(Ruang $ruang)
    {
        return view('pages.ruang.edit', compact('ruang'));
    }

    public function update(Request $request, Ruang $ruang)
    {
        $request->validate([
            'nama_ruang' => 'required|string|max:255',
            'kode_ruang' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        $ruang->update($request->all());

        return redirect()->route('ruang.index')->with('success', 'Ruang updated successfully.');
    }

    public function destroy(Ruang $ruang)
    {
        $ruang->delete();

        return redirect()->route('ruang.index')->with('success', 'Ruang deleted successfully.');
    }
}
