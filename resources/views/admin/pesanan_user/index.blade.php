@extends('layouts.master')
@push('css')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.css')}}" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />
<link rel="stylesheet" href="https://jsuites.net/v4/jsuites.css" type="text/css" />
@include('admin.pesanan_user.css')
@endpush

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row gy-4 pt-3">
        <div class="col-12">
            <div class="col-xl-12">
                <h6 class="text-muted">Daftar Pesanan User</h6>
                <div class="card text-center mb-3">
                    <div class="card-header">
                        <div class="nav-align-top">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button type="button" class="nav-link d-flex flex-column gap-1 active waves-effect"
                                        role="tab" data-bs-toggle="tab" data-bs-target="#navs-belum-bayar"
                                        id="btnBelumBayar" aria-controls="navs-belum-bayar" aria-selected="true">
                                        <i class="tf-icons mdi mdi-arrow-down-bold-box"></i> Belum Bayar</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button id="btnDiproses" type="button" class="nav-link d-flex flex-column gap-1 waves-effect"
                                        role="tab" data-bs-toggle="tab" data-bs-target="#navs-pembayaran-diproses"
                                        aria-controls="navs-pembayaran-diproses" aria-selected="false" tabindex="-1">
                                        <span class="mdi mdi-sync"></span> Pembayaran diproses</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button id="btnDiterima" type="button" class="nav-link d-flex flex-column gap-1 waves-effect"
                                        role="tab" data-bs-toggle="tab" data-bs-target="#navs-pembayaran-diterima"
                                        aria-controls="navs-pembayaran-diterima" aria-selected="false" tabindex="-1">
                                        <i class="tf-icons mdi mdi-check-circle"></i>
                                        Pembayaran diterima</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button id="btnDibatalkan" type="button" class="nav-link d-flex flex-column gap-1 waves-effect"
                                        role="tab" data-bs-toggle="tab" data-bs-target="#navs-pembayaran-dibatalkan"
                                        aria-controls="navs-pembayaran-dibatalkan" aria-selected="false" tabindex="-1">
                                        <span class="mdi mdi-close-box"></span>
                                        Dibatalkan</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="tab-content pb-0">
                            <div class="tab-pane fade show active" id="navs-belum-bayar" role="tabpanel">
                                <h4 class="card-title">Belum Bayar</h4>
                                <table class="styled-table" style="width:100%" id="list_belum_bayar">
                                    <thead>
                                        <tr>
                                            <th width="5%" class="text-center">No</th>
                                            <th width="10%">No Booking</th>
                                            <th width="10%">Nama</th>
                                            <th width="15%" class="text-center">Lama Menginap</th>
                                            <th width="15%" class="text-center">Tanggal Booking</th>
                                            <th width="15%" class="text-center">Total Biaya</th>
                                            <th width="15%" class="text-center">Status</th>
                                            <th width="15%" class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody_belum_bayar">
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="navs-pembayaran-diproses" role="tabpanel">
                                <h4 class="card-title">Pembayaran Diproses</h4>
                                <table class="styled-table" style="width:100%" id="list_diproses">
                                    <thead>
                                        <tr>
                                            <th width="5%" class="text-center">No</th>
                                            <th width="10%">No Booking</th>
                                            <th width="10%">Nama</th>
                                            <th width="10%" class="text-center">Lama Menginap</th>
                                            <th width="10%" class="text-center">Tanggal Booking</th>
                                            <th width="10%" class="text-center">Total Biaya</th>
                                            <th width="15%" class="text-center">File</th>
                                            <th width="15%" class="text-center">Status</th>
                                            <th width="15%" class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody_diproses">
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="navs-pembayaran-diterima" role="tabpanel">
                                <h4 class="card-title">Pembayaran Diterima</h4>
                                <table class="styled-table" style="width:100%" id="list_diterima">
                                    <thead>
                                        <tr>
                                            <th width="5%" class="text-center">No</th>
                                            <th width="10%">No Booking</th>
                                            <th width="10%">Nama</th>
                                            <th width="10%" class="text-center">Lama Menginap</th>
                                            <th width="10%" class="text-center">Tanggal Booking</th>
                                            <th width="10%" class="text-center">Total Biaya</th>
                                            <th width="15%" class="text-center">File</th>
                                            <th width="15%" class="text-center">Status</th>
                                            <th width="15%" class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody_diterima">
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="navs-pembayaran-dibatalkan" role="tabpanel">
                                <h4 class="card-title">Dibatalkan</h4>
                                <table class="styled-table" style="width:100%" id="list_dibatalkan">
                                    <thead>
                                        <tr>
                                            <th width="5%" class="text-center">No</th>
                                            <th width="10%">No Booking</th>
                                            <th width="10%">Nama</th>
                                            <th width="15%" class="text-center">Lama Menginap</th>
                                            <th width="15%" class="text-center">Tanggal Booking</th>
                                            <th width="15%" class="text-center">Total Biaya</th>
                                            <th width="15%" class="text-center">Status</th>
                                            <th width="15%" class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody_batal">
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

{{-- modal detal --}}
<div class="modal-onboarding modal fade animate__animated" data-bs-backdrop="static" data-bs-keyboard="false" id="detailBooking"
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
                                <h4 class="card-header"> <u> Detail Booking :</u></h4>
                                <!-- Account -->
                                <div class="card-body">
                                    <table class="table table-borderless">
                                        <tr>
                                            <td width="20%">
                                                <i class="mdi mdi-account-outline mdi-24px"></i><span class="fw-semibold mx-2">Nama
                                                    Lengkap</span>
                                            </td>
                                            <td width="2%">
                                                :
                                            </td>
                                            <td width="78%">
                                                <span id="nama_lengkap"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="20%">
                                                <i class="mdi mdi-email-outline mdi-24px"></i><span
                                                    class="fw-semibold mx-2">Email</span>
                                            </td>
                                            <td width="2%">
                                                :
                                            </td>
                                            <td width="78%">
                                                <span id="email"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="20%">
                                                <i class="mdi mdi-phone-outline mdi-24px"></i><span class="fw-semibold mx-2">No
                                                    Telp</span>
                                            </td>
                                            <td width="2%">
                                                :
                                            </td>
                                            <td width="78%">
                                                <span id="no_telp"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="20%">
                                                <span class="mdi mdi-ab-testing mdi-24px"></span><span class="fw-semibold mx-2">No Booking</span>
                                            </td>
                                            <td width="2%">
                                                :
                                            </td>
                                            <td width="78%">
                                                <span id="no_booking"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="20%">
                                                <span class="mdi mdi-campfire mdi-24px"></span><span
                                                    class="fw-semibold mx-2">Lama Menginap</span>
                                            </td>
                                            <td width="2%">
                                                :
                                            </td>
                                            <td width="78%">
                                                <span id="total_menginap"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="20%">
                                                <span class="mdi mdi-currency-usd mdi-24px"></span><span
                                                    class="fw-semibold mx-2">Total Biaya</span>
                                            </td>
                                            <td width="2%">
                                                :
                                            </td>
                                            <td width="78%">
                                                <span id="final_biaya"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="20%">
                                                <span class="mdi mdi-account-clock mdi-24px"></span><span
                                                    class="fw-semibold mx-2">Jam CheckIn</span>
                                            </td>
                                            <td width="2%">
                                                :
                                            </td>
                                            <td width="78%">
                                                <span id="jam_masuk"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="20%">
                                                <span class="mdi mdi-account-clock mdi-24px"></span><span
                                                    class="fw-semibold mx-2">Jam CheckOut</span>
                                            </td>
                                            <td width="2%">
                                                :
                                            </td>
                                            <td width="78%">
                                                <span id="jam_keluar"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="20%">
                                                <span class="mdi mdi-cash-sync mdi-24px"></span><span
                                                    class="fw-semibold mx-2">Status</span>
                                            </td>
                                            <td width="2%">
                                                :
                                            </td>
                                            <td width="78%">
                                                <span id="status_final"></span>
                                            </td>
                                        </tr>
                                    </table>
                                <h4 class="card-header mt-5"> <u>List Kavling :</u> </h4>
                                <table class="table table-bordered" id="tbl_list_booking">
                                    <thead>
                                      <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Kavling Dipilih</th>
                                        <th class="text-center">Jumlah/Malam</th>
                                        <th class="text-center">Harga</th>
                                        <th class="text-center">Tanggal Dipilih</th>
                                      </tr>
                                    </thead>
                                    <tbody id="tbody_booking">
                                    </tbody>
                                  </table>
                                  <h4 class="card-header mt-5"> <u>List Anggota :</u> </h4>
                                  <table class="table table-bordered" id="tbl_list_anggota">
                                      <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Kode Kavling</th>
                                            <th class="text-center">Nama</th>
                                            <th class="text-center">Umur</th>
                                            <th class="text-center">Jenis Kelamin</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">No Telp</th>
                                            <th class="text-center">Alamat</th>
                                            <th class="text-center">Riwayat Penyakit</th>
                                        </tr>
                                      </thead>
                                      <tbody id="tbody_anggota">
                                      </tbody>
                                    </table>
                                </div>
                                {{-- <div class="card-body pt-2 mt-1">
                                    <br>
                                    <span style="color: red;font-size: 12px">Note : <br>
                                        <li>Apabila data yang diinputkan user sudah <b>Benar dan Valid</b></li>
                                        <li>Silahkan lakukan update status akun dengan cara <b>Klik Status Akun Saat Ini</b></li>
                                    </span>
                                </div> --}}
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
<div class="modal fade" id="LIhatBukti" tabindex="-1" aria-hidden="true">
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

@include('admin.pesanan_user.js')
@endpush
