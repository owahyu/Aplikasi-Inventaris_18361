@extends('layouts.app')

@section('title', 'Homepage')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">
    <style>
        .card {
            min-height: 150px;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card .card-icon {
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            font-size: 32px;
        }

        .card .card-wrap {
            margin-left: 80px;
        }

        .card .card-wrap .card-header {
            font-size: 20px;
            font-weight: bold;
        }

        .card .card-wrap .card-body {
            font-size: 24px;
        }
    </style>
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Dashboard</h1>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="fa-solid fa-user" style="color: #ffffff;"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Users</h4>
                            </div>
                            <div class="card-body">
                                {{ $totalPetugas }}
                            </div>
                        </div>
                    </div>
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="fa-solid fa-bowl-food" style="color: #ffffff;"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Peminjaman</h4>
                            </div>
                            <div class="card-body">
                                {{ $totalPeminjaman }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="far fa-newspaper"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Inventaris</h4>
                            </div>
                            <div class="card-body">
                                {{ $totalInventaris }}
                            </div>
                        </div>
                    </div>
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="fa-solid fa-user" style="color: #ffffff;"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Pegawai</h4>
                            </div>
                            <div class="card-body">
                                {{ $totalPegawai }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraries -->
    <script src="{{ asset('library/simpleweather/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ asset('library/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('library/summernote/dist/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/index-0.js') }}"></script>
@endpush
