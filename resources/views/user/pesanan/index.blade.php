@extends('layouts.master')
@push('css')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.css')}}" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />
@include('user.pesanan.css')
@endpush

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light"></span> List Pesanan
    </h4>
    <!-- Header -->
    <div class="row gy-4">
        <div class="col-12">
            <div class="card p-2">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <table class="styled-table" style="width:100%" id="listPesanan">
                            <thead>
                                <tr>
                                    <th width="5%" class="text-center">No</th>
                                    <th width="25%">No Booking</th>
                                    <th width="20%" class="text-center">Lama Menginap</th>
                                    <th width="25%" class="text-center">Total Biaya</th>
                                    <th width="15%" class="text-center">Bukti Pembayaran</th>
                                    <th width="15%" class="text-center">Status</th>
                                    <th width="15%" class="text-center">EXP</th>
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


{{-- modal upload bukti pembayaran --}}
<div class="modal-onboarding modal fade animate__animated" data-bs-backdrop="static" data-bs-keyboard="false" id="uploadPembayaran"
    tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header border-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="card-header"> <u> Upload Bukti Pembayaran :</u></h4>
                            <form id="formUpload" method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
                                @csrf
                                <div class="row mt-2 gy-4">
                                    <input required class="form-control" type="hidden" id="id_final_booking" name="id_final_booking" value="" readonly />
                                    <input required class="form-control" type="hidden" id="no_booking_final" name="no_booking_final" value="" readonly />
                                    <div class="col-md-12">
                                        <div class="form-floating form-floating-outline required">
                                            <input required class="form-control" type="file" id="bukti_pembayaran" name="bukti_pembayaran" value="" autofocus />
                                            <label for="bukti_pembayaran">Upload Bukti Pembayaran</label>
                                            <div class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-floating form-floating-outline required">
                                            <textarea required name="ctt_pembayaran" id="ctt_pembayaran" class="form-control h-px-100"></textarea>
                                            <label for="zipCode">Catatan Pembayaran</label>
                                            <div class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <button type="submit" class="btn btn-primary" id="upload_pembayaran">Upload</button>
                                    <button type="button" class="btn btn-label-danger" data-bs-dismiss="modal">Keluar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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

@include('user.pesanan.js')
@endpush
