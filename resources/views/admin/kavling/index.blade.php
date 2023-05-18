@extends('layouts.master')
@push('css')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.css')}}" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />
@include('admin.kavling.css')
@endpush

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light"></span> List Data Kavling
    </h4>
    <!-- Header -->
    <div class="row gy-4">
        <div class="col-12">
            <div class="card p-2">
                <div class="card-header">
                    <button id="addKavling" type="button" class="btn rounded-pill btn-primary waves-effect waves-ligh btn-smt">
                            <span class="tf-icons mdi mdi-plus-circle"></span> Tambah Data
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <table class="styled-table" style="width:100%" id="listKavling">
                            <thead>
                                <tr>
                                    <th width="5%" class="text-center">No</th>
                                    <th width="35%">Kode Kavling</th>
                                    <th width="35%">Nama Kavling</th>
                                    <th width="10%" class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

{{-- modal add --}}
<div class="modal-onboarding modal fade animate__animated" data-bs-backdrop="static" data-bs-keyboard="false" id="addKavlingModal"
    tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header border-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-4">
                                <h4 class="card-header">Tambah Kavling</h4>
                                <div class="card-body pt-2 mt-1">
                                    <form id="formAddKavling" method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
                                        @csrf
                                    <div class="row mt-2 gy-4">
                                        <div class="col-md-6 required">
                                            <div class="form-floating form-floating-outline">
                                                <input required class="form-control" type="text" id="kode_kavling" name="kode_kavling" autofocus placeholder="Contoh: K1, K2, K3 ..." />
                                                <label for="kode_kavling">Kode Kavling</label>
                                            <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 required">
                                            <div class="form-floating form-floating-outline">
                                                <input required class="form-control" type="text" name="nama_kavling" id="nama_kavling" placeholder="Nama/Keterangan kavling..." />
                                                <label for="nama_kavling">Nama/Keterangan Kavling</label>
                                            <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <span style="color: red;font-size: 12px">Note : <br>
                                        <li>Kode kavling harus diisi sesuai dengan kode yang telah ditentukan </li>
                                        <li><b>Ex. K1, K2, K3...</b></li>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="submit" class="btn btn-primary" id="simpan_kavling">Simpan</button>
                <button type="button" class="btn btn-label-danger" data-bs-dismiss="modal">Keluar</button>
            </div>
        </form>
        </div>
    </div>
</div>


{{-- modal edit --}}
<div class="modal-onboarding modal fade animate__animated" data-bs-backdrop="static" data-bs-keyboard="false" id="editKavlingModal"
    tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header border-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-4">
                                <h4 class="card-header">Tambah Kavling</h4>
                                <div class="card-body pt-2 mt-1">
                                    <form id="formEditKavling" method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
                                        @csrf
                                    <div class="row mt-2 gy-4">
                                        <div class="col-md-6 required">
                                            <div class="form-floating form-floating-outline">
                                                <input type="hidden" name="edit_id_kavling" id="edit_id_kavling">
                                                <input required class="form-control" type="text" id="edit_kode_kavling" name="edit_kode_kavling" autofocus placeholder="Contoh: K1, K2, K3 ..." />
                                                <label for="edit_kode_kavling">Kode Kavling</label>
                                            <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 required">
                                            <div class="form-floating form-floating-outline">
                                                <input required class="form-control" type="text" name="edit_nama_kavling" id="edit_nama_kavling" placeholder="Nama/Keterangan kavling..." />
                                                <label for="edit_nama_kavling">Nama/Keterangan Kavling</label>
                                            <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <span style="color: red;font-size: 12px">Note : <br>
                                        <li>Kode kavling harus diisi sesuai dengan kode yang telah ditentukan </li>
                                        <li><b>Ex. K1, K2, K3...</b></li>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="submit" class="btn btn-primary" id="edit_kavling">Edit Data</button>
                <button type="button" class="btn btn-label-danger" data-bs-dismiss="modal">Keluar</button>
            </div>
        </form>
        </div>
    </div>
</div>





@endsection

@push('js')
<script src="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

@include('admin.kavling.js')
@endpush
