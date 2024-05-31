@extends('layouts.app')

@section('title', 'Edit Peminjaman')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Peminjaman</h1>
            </div>

            <div class="section-body">

                <div class="card">
                    <form action="{{ route('peminjaman.update', $peminjaman->id_peminjaman) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-header">
                            <h4>Edit Peminjaman</h4>
                        </div>
                        <div class="card-body">
                            <!-- Input for Tanggal Pinjam -->
                            <div class="form-group">
                                <label>Tanggal Pinjam</label>
                                <input type="date" class="form-control @error('tanggal_pinjam') is-invalid @enderror"
                                    name="tanggal_pinjam" value="{{ $peminjaman->tanggal_pinjam }}">
                                @error('tanggal_pinjam')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Input for Tanggal Kembali -->
                            <div class="form-group">
                                <label>Tanggal Kembali</label>
                                <input type="date" class="form-control @error('tanggal_kembali') is-invalid @enderror"
                                    name="tanggal_kembali" value="{{ $peminjaman->tanggal_kembali }}">
                                @error('tanggal_kembali')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- <!-- Select for Status Peminjaman -->
                            <div class="form-group">
                                <label>Status Peminjaman</label>
                                <select class="form-control @error('status_peminjaman') is-invalid @enderror"
                                    name="status_peminjaman">
                                    <option value="dipinjam"
                                        {{ $peminjaman->status_peminjaman == 'dipinjam' ? 'selected' : '' }}>Dipinjam
                                    </option>
                                    <option value="dikembalikan"
                                        {{ $peminjaman->status_peminjaman == 'dikembalikan' ? 'selected' : '' }}>
                                        Dikembalikan</option>
                                </select>
                                @error('status_peminjaman')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div> --}}

                            <!-- Select for Pegawai -->
                            <div class="form-group">
                                <label>Pegawai</label>
                                <select class="form-control select2 @error('id_pegawai') is-invalid @enderror"
                                    name="id_pegawai">
                                    @foreach ($pegawai as $p)
                                        <option value="{{ $p->id_pegawai }}"
                                            {{ $peminjaman->id_pegawai == $p->id_pegawai ? 'selected' : '' }}>
                                            {{ $p->nama_pegawai }}</option>
                                    @endforeach
                                </select>
                                @error('id_pegawai')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div id="detail_pinjam_container">
                                <h4>Detail Peminjaman</h4>
                                @foreach ($peminjaman->detailPinjam as $index => $detail)
                                    <div class="detail_pinjam row">
                                        <!-- Select for Inventaris -->
                                        <div class="form-group col-md-6">
                                            <label>Inventaris</label>
                                            <select
                                                class="form-control select2 @error('detail_pinjam[$index][id_inventaris]') is-invalid @enderror"
                                                name="detail_pinjam[{{ $index }}][id_inventaris]">
                                                @foreach ($inventaris as $inv)
                                                    <option value="{{ $inv->id_inventaris }}"
                                                        {{ $detail->id_inventaris == $inv->id_inventaris ? 'selected' : '' }}>
                                                        {{ $inv->nama }}</option>
                                                @endforeach
                                            </select>
                                            @error('detail_pinjam[$index][id_inventaris]')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Input for Jumlah -->
                                        <div class="form-group col-md-6">
                                            <label>Jumlah</label>
                                            <input type="number"
                                                class="form-control @error('detail_pinjam[$index][jumlah]') is-invalid @enderror"
                                                name="detail_pinjam[{{ $index }}][jumlah]" min="1"
                                                value="{{ $detail->jumlah }}">
                                            @error('detail_pinjam[$index][jumlah]')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-12 text-right">
                                            <button type="button"
                                                class="btn btn-danger remove-detail-pinjam">Hapus</button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <button type="button" id="add_detail_pinjam" class="btn btn-secondary">Tambah Detail
                                Peminjaman</button>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Kirim</button>
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var container = document.getElementById('detail_pinjam_container');
            var index = container.getElementsByClassName('detail_pinjam').length;

            document.getElementById('add_detail_pinjam').addEventListener('click', function() {
                var newDetailPinjam = document.createElement('div');
                newDetailPinjam.classList.add('detail_pinjam', 'row');

                newDetailPinjam.innerHTML = `
                <div class="form-group col-md-6">
                    <label>Inventaris</label>
                    <select class="form-control select2" name="detail_pinjam[${index}][id_inventaris]">
                        @foreach ($inventaris as $inv)
                            <option value="{{ $inv->id_inventaris }}">{{ $inv->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label>Jumlah</label>
                    <input type="number" class="form-control" name="detail_pinjam[${index}][jumlah]" min="1">
                </div>
                <div class="col-md-12 text-right">
                    <button type="button" class="btn btn-danger remove-detail-pinjam">Hapus</button>
                </div>
            `;

                container.appendChild(newDetailPinjam);
                $('.select2').select2(); // Initialize select2 for new elements

                index++; // Increment index for the next new element
            });

            document.getElementById('detail_pinjam_container').addEventListener('click', function(e) {
                if (e.target && e.target.classList.contains('remove-detail-pinjam')) {
                    e.target.closest('.detail_pinjam').remove();
                }
            });
        });
    </script>
@endpush
