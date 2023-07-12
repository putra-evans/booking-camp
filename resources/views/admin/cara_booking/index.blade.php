@extends('layouts.master')
@push('css')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.css')}}" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />
@include('admin.cara_booking.css')
@endpush

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light"></span> List Cara Booking
    </h4>
    <!-- Header -->
    <div class="row gy-4">
        <div class="col-12">
            <div class="card p-2">
                <div class="card-header">
                    {{-- <button id="addCara" type="button" class="btn rounded-pill btn-primary waves-effect waves-ligh btn-sm">
                            <span class="tf-icons mdi mdi-plus-circle"></span> Tambah Data
                    </button> --}}
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="styled-table" style="width:100%" id="listCara">
                            <thead>
                                <tr>
                                    <th width="5%" class="text-center">No</th>
                                    <th width="85%">Tata Tertib</th>
                                    <th width="10%" class="text-center">Action</th>
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
<div class="modal-onboarding modal fade animate__animated" data-bs-backdrop="static" data-bs-keyboard="false" id="addCaraModal"
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
                                <h4 class="card-header">Cara Booking</h4>
                                <div class="card-body pt-2 mt-1">
                                    <form id="formAddCara" method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
                                        @csrf
                                    <div class="row gy-4">
                                        <div class="col-md-12 required">
                                            <div class="form-floating form-floating-outline">
                                                <textarea id="input_cara" name="input_cara" required></textarea>
                                            <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <span style="color: red;font-size: 12px">Note : <br>
                                        <li>Silahkan dibuat dan disusun untuk melampirkan Tata Cara Melakukan Booking </li>
                                        <li><b>Bertujuan sebagai informasi untuk User</b></li>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="submit" class="btn btn-primary" id="simpan_tertib">Simpan</button>
                <button type="button" class="btn btn-label-danger" data-bs-dismiss="modal">Keluar</button>
            </div>
        </form>
        </div>
    </div>
</div>


{{-- modal edit --}}
<div class="modal-onboarding modal fade animate__animated" data-bs-backdrop="static" data-bs-keyboard="false" id="editCaraModal"
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
                                <h4 class="card-header">Edit Cara Booking</h4>
                                <div class="card-body pt-2 mt-1">
                                    <form id="formEditCara" method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
                                        @csrf
                                    <div class="row mt-2 gy-4">
                                        <div class="col-md-12 required">
                                            <div class="form-floating form-floating-outline">
                                                <input type="hidden" name="id_cara" id="id_cara">
                                                <textarea id="input_cara" name="edit_input_cara" required></textarea>
                                            <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="submit" class="btn btn-primary" id="edit_cara">Edit Data</button>
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
<script src="{{ asset('assets/tinymce/js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>

@include('admin.cara_booking.js')
@endpush
