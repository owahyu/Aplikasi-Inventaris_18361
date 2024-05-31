@extends('layouts.app')

@section('title', 'View Peminjaman')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <style>
        .status-label {
            margin-top: 10px;
            padding: 5px 5px;
            color: white;
            border-radius: 15px;
            font-weight: bold;
            text-align: center;
            display: inline-block;
            width: 100px;
        }

        .pending {
            background-color: #3498db;
        }

        .approved {
            background-color: #2ecc71;
        }

        .rejected {
            background-color: #e74c3c;
        }

        .action-form {
            display: inline-block;
            margin-right: 10px;
        }
    </style>
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>View Peminjaman Details</h1>
            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <h4>Detail Peminjaman</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <strong>Tanggal Pinjam:</strong>
                                <p>{{ $peminjaman->tanggal_pinjam }}</p>
                            </div>
                            <div class="col-md-6">
                                <strong>Tanggal Kembali:</strong>
                                <p>{{ $peminjaman->tanggal_kembali }}</p>
                            </div>
                            <div class="col-md-6">
                                <strong>Status Peminjaman:</strong>
                                <p>
                                    <span class="status-label {{ strtolower($peminjaman->status_peminjaman) }}">
                                        {{ ucfirst($peminjaman->status_peminjaman) }}
                                    </span>
                                </p>
                            </div>
                            <div class="col-md-6">
                                <strong>Pegawai:</strong>
                                <p>{{ $peminjaman->pegawai->nama_pegawai }}</p>
                            </div>
                            <div class="col-md-12">
                                <h5>Detail Peminjaman:</h5>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Inventaris</th>
                                            <th>Jumlah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($peminjaman->detailPinjam as $detail)
                                            <tr>
                                                <td>{{ $detail->inventaris->nama }}</td>
                                                <td>{{ $detail->jumlah }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('peminjaman.index') }}" class="btn btn-primary">Kembali Kedata</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
