@extends('layouts.app')

@section('title', 'Peminjaman')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
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
                <h1>Validasi</h1>
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
                                            <th>No</th>
                                            <th>Tanggal Pinjam</th>
                                            <th>Tanggal Kembali</th>
                                            <th>Status</th>
                                            <th>Pegawai</th>
                                            <th>Aksi</th>
                                        </tr>
                                        @foreach ($validate as $index => $item)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
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
                                                        <form action="{{ route('validate.approve', $item->id_peminjaman) }}"
                                                            method="POST", style="margin-right: 10px">
                                                            @csrf
                                                            <button type="submit" class="btn btn-success">Approve</button>
                                                        </form>
                                                        <form action="{{ route('validate.reject', $item->id_peminjaman) }}"
                                                            method="POST"">
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger">Reject</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>

                                <div class="float-right">
                                    {{ $validate->withQueryString()->links() }}
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
