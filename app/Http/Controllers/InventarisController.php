<?php

namespace App\Http\Controllers;

use App\Models\Inventaris;
use App\Models\Jenis;
use App\Models\Petugas;
use App\Models\Ruang;
use Illuminate\Http\Request;

class InventarisController extends Controller
{
    public function index(Request $request)
    {
        $inventaris = Inventaris::with(['jenis', 'ruang', 'petugas'])  // Eager load the 'level' relationship
            ->when($request->input('nama'), function ($query, $nama) {
                return $query->where('nama', 'like', '%' . $nama . '%');
            })
            ->orderBy('id_inventaris', 'desc')
            ->paginate(10);

        return view('pages.inventaris.index', compact('inventaris'));
    }

    public function create()
    {
        $jenis = Jenis::all();
        $ruang = Ruang::all();
        $petugas = Petugas::all();
        return view('pages.inventaris.create', compact('jenis', 'ruang', 'petugas'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nama' => 'required|string|max:255',
            'kondisi' => 'required|string',
            'keterangan' => 'nullable|string',
            'jumlah' => 'required|integer',
            'id_jenis' => 'required|exists:jenis,id_jenis',
            'id_ruang' => 'required|exists:ruang,id_ruang',
            'id_petugas' => 'required|exists:petugas,id_petugas',
            'tanggal_register' => 'required|date',
            'kode_inventaris' => 'required|string'
        ]);

        Inventaris::create($request->all());

        return redirect()->route('inventaris.index')->with('success', 'Inventaris created successfully.');
    }

    public function show(Inventaris $inventaris)
    {
        return view('pages.inventaris.show', compact('inventaris'));
    }


    public function edit(Inventaris $inventaris)
    {
        $jenis = Jenis::all();
        $ruang = Ruang::all();
        $petugas = Petugas::all();
        return view('pages.inventaris.edit', compact('inventaris', 'jenis', 'ruang', 'petugas'));
    }

    public function update(Request $request, Inventaris $inventaris)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kondisi' => 'required|string',
            'keterangan' => 'nullable|string',
            'jumlah' => 'required|integer',
            'id_jenis' => 'required|exists:jenis,id_jenis',
            'id_ruang' => 'required|exists:ruang,id_ruang',
            'id_petugas' => 'required|exists:petugas,id_petugas',
            'tanggal_register' => 'required|date',
            'kode_inventaris' => 'required|string|'
        ]);

        $inventaris->update($request->all());

        return redirect()->route('inventaris.index')->with('success', 'Inventaris updated successfully.');
    }

    public function destroy(Inventaris $inventaris)
    {
        $inventaris->delete();

        return redirect()->route('inventaris.index')->with('success', 'Inventaris deleted successfully.');
    }
}
