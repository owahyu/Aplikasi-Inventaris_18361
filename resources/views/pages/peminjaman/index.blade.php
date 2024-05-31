@extends('layouts.app')

@section('title', 'Peminjaman')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <style>
        .status-label {
            padding: 5px 10px;
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
                <h1>Peminjaman</h1>
                <div class="section-header-button">
                    <a href="{{ route('peminjaman.create') }}" class="btn btn-primary">Tambah</a>
                </div>
            </div>
            <div class="section-body">

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Semua Peminjaman</h4>
                            </div>
                            <div class="card-body">
                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <tr>
                                            <th>Tanggal Pinjam</th>
                                            <th>Tanggal Kembali</th>
                                            <th>Status</th>
                                            <th>Pegawai</th>
                                            <th>Aksi</th>
                                        </tr>
                                        @foreach ($peminjaman as $item)
                                            <tr>
                                                <td>{{ $item->tanggal_pinjam }}</td>
                                                <td>{{ $item->tanggal_kembali }}</td>
                                                <td>
                                                    <span class="status-label {{ strtolower($item->status_peminjaman) }}">
                                                        {{ ucfirst($item->status_peminjaman) }}
                                                    </span>
                                                </td>
                                                <td>{{ $item->pegawai->nama_pegawai }}</td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <a href='{{ route('peminjaman.show', $item->id_peminjaman) }}'
                                                            class="btn btn-sm btn-success btn-icon">
                                                            <i class="fas fa-eye"></i>
                                                            View
                                                        </a>
                                                        <a href='{{ route('peminjaman.edit', $item->id_peminjaman) }}'
                                                            class="btn btn-sm btn-info btn-icon ml-2">
                                                            <i class="fas fa-edit"></i>
                                                            Edit
                                                        </a>
                                                        <form
                                                            action="{{ route('peminjaman.destroy', $item->id_peminjaman) }}"
                                                            method="POST" class="ml-2">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-sm btn-danger btn-icon confirm-delete">
                                                                <i class="fas fa-times"></i> Hapus
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                                <div class="float-right">
                                    {{ $peminjaman->withQueryString()->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush
