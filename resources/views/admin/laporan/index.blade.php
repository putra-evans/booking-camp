@extends('layouts.master')
@push('css')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.css')}}" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />
<link rel="stylesheet" href="https://jsuites.net/v4/jsuites.css" type="text/css" />
@include('admin.laporan.css')
@endpush

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row gy-4 pt-3">
        <div class="col-4">
            <div class="col-xl-12">
                <h6 class="text-muted">Cetak Laporan</h6>
                <div class="card text-center mb-3 p-5">
                    <div class="card-header">
                        <div class="nav-align-top">
                            <span>Pilih bulan dan tahun</span>
                        </div>
                    </div>
                    <div class="card-body pt-2 mt-1">
                        <form action="{{ route('cetak_laporan') }}" method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
                            @csrf
                        <div class="row gy-4">
                            <div class="col-md-12 required">
                                <div class="form-floating form-floating-outline">
                                    <input type="month" name="bulan_tahun" id="bulan_tahun" class="form-control" required >
                                <div class="invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="submit" class="btn btn-sm btn-primary">Cetak</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="col-xl-12">
                <h6 class="text-muted">Cetak Laporan Perhari</h6>
                <div class="card text-center mb-3 p-5">
                    <div class="card-header">
                        <div class="nav-align-top">
                            <span>Pilih tanggal</span>
                        </div>
                    </div>
                    <div class="card-body pt-2 mt-1">
                        <form action="{{ route('cetak_laporan_harian') }}" method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
                            @csrf
                        <div class="row gy-4">
                            <div class="col-md-12 required">
                                <div class="form-floating form-floating-outline">
                                    <input type="date" name="tgl_laporan" id="tgl_laporan" class="form-control" required >
                                <div class="invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="submit" class="btn btn-sm btn-primary">Cetak</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')
<script src="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://jsuites.net/v4/jsuites.js"></script>

@include('admin.laporan.js')
@endpush
