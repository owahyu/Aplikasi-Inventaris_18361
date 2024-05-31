<?php

namespace App\Http\Controllers;

use App\Models\DetailPinjam;
use App\Models\Inventaris;
use App\Models\Pegawai;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index(Request $request)
    {
        $peminjaman = Peminjaman::with(['pegawai'])
            ->orderBy('id_peminjaman', 'desc')
            ->paginate(10);

        return view('pages.peminjaman.index', compact('peminjaman'));
    }

    public function create()
    {
        $inventaris = Inventaris::all();
        $pegawai = Pegawai::all();
        return view('pages.peminjaman.create', compact('inventaris', 'pegawai'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date',
            'id_pegawai' => 'required|exists:pegawai,id_pegawai',
            'detail_pinjam.*.id_inventaris' => 'required|exists:inventaris,id_inventaris',
            'detail_pinjam.*.jumlah' => 'required|integer'
        ]);

        // dd($request->all());
        // Create Peminjaman with status set to 'pending' by default
        $peminjaman = Peminjaman::create([
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
            'id_pegawai' => $request->id_pegawai,
            'status_peminjaman' => 'pending'  // Set the default status to 'pending'
        ]);

        foreach ($request->input('detail_pinjam') as $detail) {
            DetailPinjam::create([
                'id_peminjaman' => $peminjaman->id_peminjaman,
                'id_inventaris' => $detail['id_inventaris'],
                'jumlah' => $detail['jumlah'],
            ]);
        }

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil disimpan dengan status pending.');
    }

    // Method untuk Kepala Gudang memvalidasi peminjaman
    public function validatePeminjaman(Request $request, $id)
    {
        $action = $request->query('action', 'approve');
        $peminjaman = Peminjaman::findOrFail($id);
        if ($action === 'approve') {
            $peminjaman->update(['status_peminjaman' => 'Disetujui']);
            // Tambahan logika jika perlu (misal: mengurangi stok)
        } else {
            $peminjaman->update(['status_peminjaman' => 'Ditolak']);
            // Kirim notifikasi jika perlu
        }
        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman telah ' . ($action === 'approve' ? 'disetujui' : 'ditolak'));
    }

    public function show($id)
    {
        $peminjaman = Peminjaman::with(['pegawai', 'detailPinjam.inventaris'])->findOrFail($id);

        return view('pages.peminjaman.show', compact('peminjaman'));
    }

    public function edit($id)
    {
        $peminjaman = Peminjaman::with('detailPinjam')->findOrFail($id);
        $pegawai = Pegawai::all();
        $inventaris = Inventaris::all();

        return view('pages.peminjaman.edit', compact('peminjaman', 'pegawai', 'inventaris'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date',
            'id_pegawai' => 'required|exists:pegawai,id_pegawai',
            'detail_pinjam.*.id_inventaris' => 'required|exists:inventaris,id_inventaris',
            'detail_pinjam.*.jumlah' => 'required|integer|min:1',
        ]);

        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->update([
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
            // 'status_peminjaman' => $request->status_peminjaman,
            'id_pegawai' => $request->id_pegawai,
        ]);

        // Mengelola detail peminjaman yang ada atau menambahkan baru
        foreach ($request->detail_pinjam as $key => $detail) {
            if (isset($detail['id_detail_pinjam'])) {
                $existingDetail = DetailPinjam::findOrFail($detail['id_detail_pinjam']);

                if (isset($detail['_delete']) && $detail['_delete'] == 1) {
                    $existingDetail->delete();
                    continue;
                }

                $existingDetail->update([
                    'id_inventaris' => $detail['id_inventaris'],
                    'jumlah' => $detail['jumlah'],
                ]);
            } else {
                $newDetail = [
                    'id_peminjaman' => $peminjaman->id_peminjaman,
                    'id_inventaris' => $detail['id_inventaris'],
                    'jumlah' => $detail['jumlah'],
                ];

                // Cek apakah detail ini sudah ada berdasarkan id_inventaris dan id_peminjaman
                $existingDetail = DetailPinjam::where('id_peminjaman', $peminjaman->id_peminjaman)
                    ->where('id_inventaris', $detail['id_inventaris'])
                    ->first();

                if ($existingDetail) {
                    // Jika sudah ada, update jumlahnya
                    $existingDetail->update([
                        'jumlah' => $existingDetail->jumlah + $detail['jumlah'],
                    ]);
                } else {
                    // Jika belum ada, buat detail baru
                    DetailPinjam::create($newDetail);
                }
            }
        }

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil diperbarui.');
    }



    public function destroy($id)
    {
        Peminjaman::destroy($id);
        DetailPinjam::where('id_peminjaman', $id)->delete();

        return redirect()->route('peminjaman.index');
    }
}
