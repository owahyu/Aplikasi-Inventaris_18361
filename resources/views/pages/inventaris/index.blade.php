@extends('layouts.app')

@section('title', 'Inventaris')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Inventaris</h1>
                <div class="section-header-button">
                    <a href="{{ route('inventaris.create') }}" class="btn btn-primary">Tambah</a>
                </div>
            </div>
            <div class="section-body">

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Semua Inventaris</h4>
                            </div>
                            <div class="card-body">
                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <tr>
                                            <th>Nama</th>
                                            <th>Jenis</th>
                                            <th>Ruang</th>
                                            <th>Petugas</th>
                                            <th>Aksi</th>
                                        </tr>
                                        @foreach ($inventaris as $item)
                                            <tr>
                                                <td>
                                                    {{ $item->nama }}
                                                </td>
                                                <td>
                                                    {{ $item->jenis->nama_jenis }}
                                                </td>
                                                <td>
                                                    {{ $item->ruang->nama_ruang }}
                                                </td>
                                                <td>
                                                    {{ $item->petugas->nama_petugas }}
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <a href='{{ route('inventaris.show', $item->id_inventaris) }}'
                                                            class="btn btn-sm btn-success btn-icon">
                                                            <i class="fas fa-eye"></i>
                                                            View
                                                        </a>
                                                        <a href='{{ route('inventaris.edit', $item->id_inventaris) }}'
                                                            class="btn btn-sm btn-info btn-icon ml-2">
                                                            <i class="fas fa-edit"></i>
                                                            Edit
                                                        </a>
                                                        <form
                                                            action="{{ route('inventaris.destroy', $item->id_inventaris) }}"
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
                                    {{ $inventaris->withQueryString()->links() }}
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
