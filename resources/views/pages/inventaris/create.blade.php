@extends('layouts.app')

@section('title', 'Add Inventaris')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambahkan Inventaris</h1>
            </div>

            <div class="section-body">
                <div class="card">
                    <form action="{{ route('inventaris.store') }}" method="POST">
                        @csrf
                        <div class="card-header">
                            <h4>Input Details</h4>
                        </div>
                        <div class="card-body">
                            <!-- Input for Nama -->
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    name="nama">
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Input for Kondisi -->
                            <div class="form-group">
                                <label>Kondisi</label>
                                <input type="text" class="form-control @error('kondisi') is-invalid @enderror"
                                    name="kondisi">
                                @error('kondisi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Input for Keterangan -->
                            <div class="form-group">
                                <label>Keterangan</label>
                                <input type="text" class="form-control @error('keterangan') is-invalid @enderror"
                                    name="keterangan">
                                @error('keterangan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Input for Jumlah -->
                            <div class="form-group">
                                <label>Jumlah</label>
                                <input type="number" class="form-control @error('jumlah') is-invalid @enderror"
                                    name="jumlah">
                                @error('jumlah')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Input for Tanggal Register -->
                            <div class="form-group">
                                <label>Tanggal Register</label>
                                <input type="date" class="form-control @error('tanggal_register') is-invalid @enderror"
                                    name="tanggal_register">
                                @error('tanggal_register')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Select for Jenis -->
                            <div class="form-group">
                                <label>Jenis</label>
                                <select class="form-control select2 @error('id_jenis') is-invalid @enderror"
                                    name="id_jenis">
                                    @foreach ($jenis as $jenis)
                                        <option value="{{ $jenis->id_jenis }}">{{ $jenis->nama_jenis }}</option>
                                    @endforeach
                                </select>
                                @error('id_jenis')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Select for Ruang -->
                            <div class="form-group">
                                <label>Ruang</label>
                                <select class="form-control select2 @error('id_ruang') is-invalid @enderror"
                                    name="id_ruang">
                                    @foreach ($ruang as $ruang)
                                        <option value="{{ $ruang->id_ruang }}">{{ $ruang->nama_ruang }}</option>
                                    @endforeach
                                </select>
                                @error('id_ruang')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Input for Kode Inventaris -->
                            <div class="form-group">
                                <label>Kode Inventaris</label>
                                <input type="text" class="form-control @error('kode_inventaris') is-invalid @enderror"
                                    name="kode_inventaris">
                                @error('kondisi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Select for Petugas -->
                            <div class="form-group">
                                <label>Petugas</label>
                                <select class="form-control select2 @error('id_petugas') is-invalid @enderror"
                                    name="id_petugas">
                                    @foreach ($petugas as $petugas)
                                        <option value="{{ $petugas->id_petugas }}">{{ $petugas->nama_petugas }}</option>
                                    @endforeach
                                </select>
                                @error('id_petugas')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraries -->
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endpush
