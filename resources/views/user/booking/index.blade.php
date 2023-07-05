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
        <span class="text-muted fw-light"></span> Booking kavling
    </h4>
    <!-- Header -->
    <div class="row gy-4">
        <div class="col-9 loading-kalender">
            <div class="card p-2">
                <div class="card-header">
                    <span>Kavling tersedia :</span>
                </div>
                <center>
                    <div class="posisi_danau">
                        <span class="text-center text-white">POSISI DANAU TALANG</span>
                    </div>
                </center>
                <div class="card-body" id="tbody_button">
                </div>
            </div>
        </div>
        <div class="col-3">
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
                                        role="tab" data-bs-toggle="tab" data-bs-target="#navs-draft-booking"
                                        id="draft_booking" aria-controls="navs-draft-booking" aria-selected="true">
                                        <i class="tf-icons mdi mdi-arrow-down-bold-box"></i> Draft Booking</button>
                                </li>
                                {{-- <li class="nav-item" role="presentation">
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
                                </li> --}}
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
                                            <th class="font-weight-bold align-middle text-center">
                                                <div class="custom-control custom-checkbox">
                                                    <label class="custom-control-label font-weight-bolder"
                                                        for="checkAll"></label>
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody_organisasi">
                                    </tbody>
                                </table>
                                <div class="pt-3 float-right">
                                    <button type="button"
                                        class="btn btn-sm btn-whatsapp waves-effect btnBookingSekarang"> <i
                                            class="tf-icons mdi mdi-check-decagram me-1"></i>Booking Sekarang</button>
                                </div>
                            </div>
                            {{-- <div class="tab-pane fade" id="navs-booking" role="tabpanel">
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
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- modal Anggota --}}
<div class="modal-onboarding modal fade animate__animated" data-bs-backdrop="static" data-bs-keyboard="false"
    id="addTimModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen" role="document">
        <div class="modal-content">
            <div class="modal-header border-0">
                <button type="button" class="btn-close  BtnKeluarAnggota" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-4">
                                <h4 class="card-header">Tambah Anggota Tim</h4>
                                <div class="card-body">
                                    <form id="formAddTim" method="POST" class="needs-validation" novalidate
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row gy-4">
                                            <input required class="form-control" type="hidden" id="id_booking"
                                                name="id_booking" readonly />
                                            <input required class="form-control" type="hidden" id="id_kavling"
                                                name="id_kavling" readonly />
                                            <div class="col-md-12">
                                                <div class="form-floating form-floating-outline required">
                                                    <input required class="form-control" type="text" id="nik" name="nik"
                                                        placeholder="Masukkan nama lengkap..." autofocus />
                                                    <label for="nik">NIK</label>
                                                    <div class="invalid-feedback"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating form-floating-outline required">
                                                    <input required class="form-control" type="text" id="nama_anggota"
                                                        name="nama_anggota" placeholder="Masukkan nama lengkap..."
                                                        autofocus />
                                                    <label for="nama_anggota">Nama Lengkap</label>
                                                    <div class="invalid-feedback"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating form-floating-outline required">
                                                    <input required class="form-control" type="number"
                                                        name="umur_anggota" id="umur_anggota"
                                                        placeholder="Masukan umur..." />
                                                    <label for="umur_anggota">Umur</label>
                                                    <div class="invalid-feedback"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating form-floating-outline required">
                                                    <select required id="jenis_kelamin_anggota"
                                                        name="jenis_kelamin_anggota" class="select2 form-select">
                                                        <option value="">-- PILIH --</option>
                                                        <option value="Laki-laki">Laki-laki</option>
                                                        <option value="Perempuan">Perempuan</option>
                                                    </select>
                                                    <label for="jenis_kelamin_anggota">Jenis Kelamin</label>
                                                    <div class="invalid-feedback"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating form-floating-outline required">
                                                    <select required id="status_anggota" name="status_anggota"
                                                        class="select2 form-select">
                                                        <option value="">-- PILIH --</option>
                                                        <option value="Pelajar">Pelajar</option>
                                                        <option value="Mahasiswa">Mahasiswa</option>
                                                        <option value="Umum">Umum</option>
                                                    </select>
                                                    <label for="status_anggota">Status</label>
                                                    <div class="invalid-feedback"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating form-floating-outline required">
                                                    <input required type="number" class="form-control" id="no_telp"
                                                        name="no_telp" placeholder="Masukan no telp / whatsapp..." />
                                                    <label for="no_telp">No Telp</label>
                                                    <div class="invalid-feedback"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating form-floating-outline required">
                                                    <input required class="form-control" type="text" id="harga_perorang"
                                                        name="harga_perorang" value="Rp. 15.000" readonly />
                                                    <label for="email">Harga /orang</label>
                                                    <div class="invalid-feedback"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating form-floating-outline required">
                                                    <textarea required name="alamat_lengkap_anggota"
                                                        id="alamat_lengkap_anggota"
                                                        placeholder="Masukan alamat lengkap..."
                                                        class="form-control h-px-100"></textarea>
                                                    <label for="zipCode">Alamat Lengkap</label>
                                                    <div class="invalid-feedback"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating form-floating-outline required">
                                                    <textarea required name="riwayat_penyakit" id="riwayat_penyakit"
                                                        placeholder="Masukan riwayat penyakit..."
                                                        class="form-control h-px-100"></textarea>
                                                    <label for="zipCode">Riwayat Penyakit</label>
                                                    <div class="invalid-feedback"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="modal-footer border-0">
                                            <button type="submit" class="btn btn-sm btn-info" id="add_tim_ada">Tambah
                                                Sudah Ada</button>
                                            <button type="submit" class="btn btn-sm btn-primary" id="add_tim">Tambah
                                                Baru</button>
                                            <button type="button" class="btn btn-sm btn-label-danger BtnKeluarAnggota"
                                                data-bs-dismiss="modal">Keluar</button>
                                        </div>
                                    </form>
                                    <hr style="color: black">
                                    <h4 class="card-header">List Anggota :</h4>
                                    <table class="table table-bordered table-responsive" width="100%" id="ListAnggota">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th class="text-center">NIK</th>
                                                <th class="text-center">Nama</th>
                                                <th class="text-center">Umur</th>
                                                <th class="text-center">Jenis Kelamin</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">No Telp</th>
                                                <th class="text-center">Alamat</th>
                                                <th class="text-center">Riwayat Penyakit</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbody_list_anggota">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- modal Anggota Sudah Ada --}}
<div class="modal-onboarding modal fade animate__animated" data-bs-backdrop="static" data-bs-keyboard="false"
    id="addTimAdaModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header border-0">
                <button type="button" class="btn-close  BtnKeluar" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <h4 class="card-header">Tambah Anggota Tim Yang Sudah Ada</h4>
                            <div class="card-body">
                                <hr style="color: black">

                                <h4 class="card-header">List Anggota :</h4>
                                <div class="col-md-6">
                                    <div class="form-floating form-floating-outline required">
                                        <select required id="pilih_kavling" name="pilih_kavling" class="select2 form-select">
                                            {{-- <option value="">-- PILIH --</option>
                                            @foreach ($anggota as $pecah )
                                            <option value="{{$pecah->id_kavling}}">{{$pecah->kode_kavling}}</option>
                                            @endforeach --}}
                                        </select>
                                        <label for="pilih_kavling">Pilih Kavling</label>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <br>
                                <table class="table table-bordered" id="ListAnggotaAda">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">NIK</th>
                                            <th class="text-center">Nama</th>
                                            <th class="text-center">No Telp</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody_list_anggota_ada">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
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

@include('user.booking.js')
@endpush
