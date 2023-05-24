@extends('layouts.master')
@push('css')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.css')}}" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />
@include('admin.galeri.css')
@endpush

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light"></span> List Galeri
    </h4>
    <!-- Header -->
    <div class="row gy-4">
        <div class="col-12">
            <div class="card p-2">
                <div class="card-header">
                    @role('admin')
                    <button id="addGaleri" type="button"
                        class="btn rounded-pill btn-primary waves-effect waves-ligh btn-sm">
                        <span class="tf-icons mdi mdi-plus-circle"></span> Tambah Data
                    </button>
                    @endrole
                </div>
                <div class="card-body">
                    <div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
                        @foreach ( $data as $pecah )
                            <div class="col">
                            <div class="card h-100">
                                <img class="card-img-top" src="{{url('/foto_galeri/' . $pecah->file_galeri)}}" alt="Card image cap" />
                                <div class="card-body">
                                    <h5 class="card-title">{{$pecah->judul_galeri}}</h5>
                                    <p class="card-text">{{$pecah->tentang_galeri}}</p>
                                </div>
                                @role('admin')
                                <button type="button" data-id="{{$pecah->id_galeri }}" title="Hapus data" class="btn btn-danger waves-effect m-2 waves-light btn-sm" id="BtnHapus">hapus foto</button>
                                @endrole
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- modal add --}}
<div class="modal-onboarding modal fade animate__animated" data-bs-backdrop="static" data-bs-keyboard="false"
    id="addGaleriModal" tabindex="-1" aria-hidden="true">
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
                                <h4 class="card-header">Upload Galeri</h4>
                                <div class="card-body pt-2 mt-1">
                                    <form id="formAddGaleri" method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
                                        @csrf
                                        <div class="row gy-4">
                                            <div class="col-md-12 ">
                                                <div class="form-floating form-floating-outline required">
                                                    <input required class="form-control" type="file" id="upload_galeri" name="upload_galeri" value="" autofocus />
                                                    <label for="upload_galeri">Upload Foto</label>
                                                    <div class="invalid-feedback"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-floating form-floating-outline required">
                                                    <input required class="form-control" type="text" id="judul_galeri" name="judul_galeri" placeholder="Judul foto..." />
                                                    <label for="judul_galeri">Judul Foto</label>
                                                    <div class="invalid-feedback"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-floating form-floating-outline required">
                                                    <textarea required name="keterangan_galeri" id="keterangan_galeri" class="form-control h-px-100" placeholder="Keterangan foto..."></textarea>
                                                    <label for="keterangan_galeri">Keterangan Foto</label>
                                                    <div class="invalid-feedback"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
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






@endsection

@push('js')
<script src="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('assets/tinymce/js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>

@include('admin.galeri.js')
@endpush
