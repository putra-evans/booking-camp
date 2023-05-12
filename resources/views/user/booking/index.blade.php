@extends('layouts.master')
@push('css')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.css')}}" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />
<link rel="stylesheet" href="https://jsuites.net/v4/jsuites.css" type="text/css" />
@include('user.booking.css')
@endpush

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light"></span> List User
    </h4>
    <!-- Header -->
    <div class="row gy-4">
        <div class="col-8 loading-kalender">
            <div class="card p-2">
                <div class="card-header">
                    <span>Kavling tersedia :</span>
                </div>
                <div class="card-body" id="tbody_button">
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-header">
                    <span>Cek tanggal :</span>
                </div>
                <div class="card-body loading-kalender">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row gy-4 pt-3">
        <div class="col-12">
            <div class="col-xl-12">
                <h6 class="text-muted">Daftar Booking</h6>
                <div class="card text-center mb-3">
                    <div class="card-header">
                        <div class="nav-align-top">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button type="button" class="nav-link d-flex flex-column gap-1 active waves-effect"
                                        role="tab" data-bs-toggle="tab" data-bs-target="#navs-draft-booking" id="draft_booking"
                                        aria-controls="navs-draft-booking" aria-selected="true">
                                        <i class="tf-icons mdi mdi-arrow-down-bold-box"></i> Draft Booking</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button type="button" class="nav-link d-flex flex-column gap-1 waves-effect" role="tab"
                                        data-bs-toggle="tab" data-bs-target="#navs-booking"
                                        aria-controls="navs-booking" aria-selected="false" tabindex="-1">
                                        <i class="tf-icons mdi mdi-pin"></i> Booking</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button type="button" class="nav-link d-flex flex-column gap-1 waves-effect" role="tab"
                                        data-bs-toggle="tab" data-bs-target="#navs-selesai"
                                        aria-controls="navs-selesai" aria-selected="false" tabindex="-1">
                                            <i class="tf-icons mdi mdi-check-circle"></i>
                                        Selesai</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="tab-content pb-0">
                            <div class="tab-pane fade show active" id="navs-draft-booking" role="tabpanel">
                                <table class="table table-bordered" id="tbl_draft">
                                    <thead>
                                      <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Kavling Dipilih</th>
                                        <th class="text-center">Jumlah/Malam</th>
                                        <th class="text-center">Harga</th>
                                        <th class="text-center">Tanggal Dipilih</th>
                                        <th class="text-center">Aksi</th>
                                      </tr>
                                    </thead>
                                    <tbody id="tbody_organisasi">
                                    </tbody>
                                  </table>
                            </div>
                            <div class="tab-pane fade" id="navs-booking" role="tabpanel">
                                <h4 class="card-title">Profile</h4>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.
                                </p>
                                <a href="javascript:void(0)" class="btn btn-secondary waves-effect waves-light">Go
                                    somewhere</a>
                            </div>
                            <div class="tab-pane fade" id="navs-selesai" role="tabpanel">
                                <h4 class="card-title">Message</h4>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.
                                </p>
                                <a href="javascript:void(0)" class="btn btn-secondary waves-effect waves-light">Go
                                    somewhere</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- modal detal --}}
<div class="modal-onboarding modal fade animate__animated" data-bs-backdrop="static" data-bs-keyboard="false" id="detailUser"
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
                                <h4 class="card-header">Detail Profil</h4>
                                <!-- Account -->
                                <div class="card-body">
                                    <table class="table">
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-start align-items-sm-center gap-4">
                                                    <img src="" alt="Belum ada upload foto user" class="d-block rounded open-img-profil" width="200px" id="fotoProfil" data-bs-toggle='modal' data-bs-target='#ModalFoto' />
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-start align-items-sm-center gap-4">
                                                    <img src="" alt="Belum ada upload KTP" class="d-block rounded open-img-ktp" width="200px" id="fotoKtp" data-bs-toggle='modal' data-bs-target='#ModalFoto' />
                                                </div>
                                                </form>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="card-body pt-2 mt-1">
                                    <div class="row mt-2 gy-4">
                                        <div class="col-md-6">
                                            <div class="form-floating form-floating-outline">
                                                <input readonly class="form-control" type="text" id="nama_lengkap"
                                                    name="nama_lengkap" value="" autofocus />
                                                <label for="nama_lengkap">Nama Lengkap</label>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating form-floating-outline">
                                                <input readonly class="form-control" type="text" name="nama_panggilan"
                                                    id="nama_panggilan" value="" />
                                                <label for="nama_panggilan">Nama Panggilan</label>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating form-floating-outline">
                                                <input readonly class="form-control" type="text" id="email" name="email"
                                                    value="" readonly />
                                                <label for="email">E-mail</label>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating form-floating-outline">
                                                <input readonly type="text" class="form-control" id="no_telp"
                                                    name="no_telp" value="" />
                                                <label for="no_telp">No Telp</label>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group input-group-merge">
                                                <div class="form-floating form-floating-outline">
                                                    <input readonly type="text" id="tempat_lahir" name="tempat_lahir"
                                                        class="form-control" value="" />
                                                    <label for="tempat_lahir">Tempat Lahir</label>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating form-floating-outline">
                                                <input readonly type="date" class="form-control" id="tanggal_lahir"
                                                    name="tanggal_lahir" value="" />
                                                <label for="tanggal_lahir">Tanggal Lahir</label>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating form-floating-outline">
                                                <input readonly type="text" class="form-control" id="jenis_kelamin"
                                                    name="jenis_kelamin" value="" />
                                                <label for="jenis_kelamin">Jenis Kelamin</label>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating form-floating-outline">
                                                <input type="text" class="form-control" value="" id="status_akun" name="status_akun" readonly />
                                                <label for="state">Status Akun</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-floating form-floating-outline">
                                                <textarea readonly name="alamat_lengkap" id="alamat_lengkap"
                                                    class="form-control h-px-100"></textarea>
                                                <label for="zipCode">Alamat Lengkap</label>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <span style="color: red;font-size: 12px">Note : <br>
                                        <li>Apabila data yang diinputkan user sudah <b>Benar dan Valid</b></li>
                                        <li>Silahkan lakukan update status akun dengan cara <b>Klik Status Akun Saat Ini</b></li>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-label-danger" data-bs-dismiss="modal">Keluar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Show Image -->
<div class="modal fade" id="ModalFoto" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <img width="100%" id="imgku" src=""></img>
        </div>
    </div>
</div>

@endsection

@push('js')
<script src="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://jsuites.net/v4/jsuites.js"></script>

@include('user.booking.js')
@endpush
