<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanValidationController extends Controller
{
    // Display a list of all valid$validate that are pending validation
    public function index()
    {
        $validate = Peminjaman::orderBy('id_peminjaman', 'desc')
            ->paginate(10);

        return view('pages.validasi.index', compact('validate'));
    }

    // Handle approval of valid$validate
    public function approve($id)
    {
        $validate = Peminjaman::findOrFail($id);
        $validate->update(['status_peminjaman' => 'approved']);
        return redirect()->route('validate.validate.index')->with('success', 'Peminjaman approved successfully.');
    }

    // Handle rejection of valid$validate
    public function reject($id)
    {
        $validate = Peminjaman::findOrFail($id);
        $validate->update(['status_peminjaman' => 'rejected']);
        return redirect()->route('validate.validate.index')->with('success', 'Peminjaman rejected successfully.');
    }
}
