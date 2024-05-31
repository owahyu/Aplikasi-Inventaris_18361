@extends('layouts.app')

@section('title', 'View Inventaris')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Lihat Details Inventaris</h1>
            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <h4>Details of {{ $inventaris->nama }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <strong>Nama:</strong>
                                <p>{{ $inventaris->nama }}</p>
                            </div>
                            <div class="col-md-6">
                                <strong>Kondisi:</strong>
                                <p>{{ $inventaris->kondisi }}</p>
                            </div>
                            <div class="col-md-6">
                                <strong>Keterangan:</strong>
                                <p>{{ $inventaris->keterangan }}</p>
                            </div>
                            <div class="col-md-6">
                                <strong>Jumlah:</strong>
                                <p>{{ $inventaris->jumlah }}</p>
                            </div>
                            <div class="col-md-6">
                                <strong>Tanggal Register:</strong>
                                <p>{{ $inventaris->tanggal_register }}</p>
                            </div>
                            <div class="col-md-6">
                                <strong>Jenis:</strong>
                                <p>{{ $inventaris->jenis->nama_jenis }}</p>
                            </div>
                            <div class="col-md-6">
                                <strong>Ruang:</strong>
                                <p>{{ $inventaris->ruang->nama_ruang }}</p>
                            </div>
                            <div class="col-md-6">
                                <strong>Petugas:</strong>
                                <p>{{ $inventaris->petugas->nama_petugas }}</p>
                            </div>
                            <div class="col-md-6">
                                <strong>Kode Inventaris:</strong>
                                <p>{{ $inventaris->kode_inventaris }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('inventaris.index') }}" class="btn btn-primary">Kembali Kedata</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraries -->
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
@endpush
