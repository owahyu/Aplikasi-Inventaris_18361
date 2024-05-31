@extends('layouts.app')

@section('title', 'Edit User')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit User</h1>
            </div>

            <div class="section-body">

                <div class="card">
                    <form action="{{ route('user.update', $user->id_petugas) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-header">
                            <h4>Masukkan Teks</h4>
                        </div>
                        <div class="card-body">
                            {{-- Input Nama --}}
                            <div class="form-group">
                                <label>Nama Petugas</label>
                                <input type="text"
                                    class="form-control @error('nama_petugas')
                                    is-invalid
                                @enderror"
                                    name="nama_petugas" value="{{ $user->nama_petugas }}">
                                @error('nama_petugas')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{-- Input Username --}}
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text"
                                    class="form-control @error('username')
                                    is-invalid
                                @enderror"
                                    name="username" value="{{ $user->username }}">
                                @error('username')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{-- Input Password --}}
                            <div class="form-group">
                                <label>Password</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-lock"></i>
                                        </div>
                                    </div>
                                    <input type="password"
                                        class="form-control @error('password')
                                    is-invalid
                                @enderror"
                                        name="password">
                                </div>
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{-- Select Roles --}}
                            <div class="form-group">
                                {{-- <label class="form-label">Roles</label> --}}
                                <div class="selectgroup w-100">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="id_level" value="1" class="selectgroup-input"
                                            @if ($user->id_level == '1') checked @endif>
                                        <span class="selectgroup-button">Administrator</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="id_level" value="2" class="selectgroup-input"
                                            @if ($user->id_level == '2') checked @endif>
                                        <span class="selectgroup-button">Operator</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="id_level" value="3" class="selectgroup-input"
                                            @if ($user->id_level == '3') checked @endif>
                                        <span class="selectgroup-button">Kepala Gudang</span>
                                    </label>
                                </div>
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
    <!-- JS Libraies -->
    <script src="{{ asset('library/cleave.js/dist/cleave.min.js') }}"></script>
    <script src="{{ asset('library/cleave.js/dist/addons/cleave-phone.us.js') }}"></script>
    <script src="{{ asset('library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('library/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/forms-advanced-forms.js') }}"></script>
@endpush
