<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use Illuminate\Http\Request;

class JenisController extends Controller
{
    public function index()
    {
        $jenis = Jenis::paginate(10);
        return view('pages.jenis.index', compact('jenis'));
    }

    public function create()
    {
        return view('pages.jenis.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_jenis' => 'required|string|max:255',
            'kode_jenis' => 'required|string|max:255|unique:jenis,kode_jenis',
            'keterangan' => 'nullable|string',
        ]);

        Jenis::create($request->all());

        return redirect()->route('jenis.index')->with('success', 'Jenis created successfully.');
    }


    public function edit(Jenis $jenis)
    {
        return view('pages.jenis.edit', compact('jenis'));
    }

    public function update(Request $request, Jenis $jenis)
    {
        $request->validate([
            'nama_jenis' => 'required|string|max:255',
            'kode_jenis' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        $jenis->update($request->all());

        return redirect()->route('jenis.index')->with('success', 'Jenis updated successfully.');
    }

    public function destroy(Jenis $jenis)
    {
        $jenis->delete();

        return redirect()->route('jenis.index')->with('success', 'Jenis deleted successfully.');
    }
}
