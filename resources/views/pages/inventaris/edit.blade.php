@extends('layouts.app')

@section('title', 'Edit Inventaris')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Inventaris</h1>
            </div>

            <div class="section-body">
                <div class="card">
                    <form action="{{ route('inventaris.update', $inventaris->id_inventaris) }}" method="POST">
                        @csrf
                        @method('PUT') <!-- Required to support PUT method on HTML forms -->
                        <div class="card-header">
                            <h4>Input Details</h4>
                        </div>
                        <div class="card-body">
                            <!-- Input for Nama -->
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    name="nama" value="{{ old('nama', $inventaris->nama) }}">
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Input for Kondisi -->
                            <div class="form-group">
                                <label>Kondisi</label>
                                <input type="text" class="form-control @error('kondisi') is-invalid @enderror"
                                    name="kondisi" value="{{ old('kondisi', $inventaris->kondisi) }}">
                                @error('kondisi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Input for Keterangan -->
                            <div class="form-group">
                                <label>Keterangan</label>
                                <input type="text" class="form-control @error('keterangan') is-invalid @enderror"
                                    name="keterangan" value="{{ old('keterangan', $inventaris->keterangan) }}">
                                @error('keterangan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Input for Jumlah -->
                            <div class="form-group">
                                <label>Jumlah</label>
                                <input type="number" class="form-control @error('jumlah') is-invalid @enderror"
                                    name="jumlah" value="{{ old('jumlah', $inventaris->jumlah) }}">
                                @error('jumlah')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Input for Tanggal Register -->
                            <div class="form-group">
                                <label>Tanggal Register</label>
                                <input type="date" class="form-control @error('tanggal_register') is-invalid @enderror"
                                    name="tanggal_register"
                                    value="{{ old('tanggal_register', $inventaris->tanggal_register) }}">
                                @error('tanggal_register')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Select for Jenis -->
                            <div class="form-group">
                                <label>Jenis</label>
                                <select class="form-control select2 @error('id_jenis') is-invalid @enderror"
                                    name="id_jenis">
                                    @foreach ($jenis as $j)
                                        <option value="{{ $j->id_jenis }}"
                                            {{ $j->id_jenis == $inventaris->id_jenis ? 'selected' : '' }}>
                                            {{ $j->nama_jenis }}</option>
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
                                    @foreach ($ruang as $r)
                                        <option value="{{ $r->id_ruang }}"
                                            {{ $r->id_ruang == $inventaris->id_ruang ? 'selected' : '' }}>
                                            {{ $r->nama_ruang }}</option>
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
                                    name="kode_inventaris"
                                    value="{{ old('kode_inventaris', $inventaris->kode_inventaris) }}">
                                @error('kode_inventaris')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Select for Petugas -->
                            <div class="form-group">
                                <label>Petugas</label>
                                <select class="form-control select2 @error('id_petugas') is-invalid @enderror"
                                    name="id_petugas">
                                    @foreach ($petugas as $p)
                                        <option value="{{ $p->id_petugas }}"
                                            {{ $p->id_petugas == $inventaris->id_petugas ? 'selected' : '' }}>
                                            {{ $p->nama_petugas }}</option>
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
