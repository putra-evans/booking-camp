@extends('layouts.master')
@push('css')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.css')}}" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />
<link rel="stylesheet" href="https://jsuites.net/v4/jsuites.css" type="text/css" />
@include('admin.pesanan_user.css')
@endpush

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row invoice-preview">
        <!-- Invoice -->
        <div class="col-xl-9 col-md-8 col-12 mb-md-0 mb-4">
            <div class="card invoice-preview-card">
                <div class="card-body">
                    <div class="d-flex justify-content-between flex-xl-row flex-md-column flex-sm-row flex-column">
                        <div class="mb-xl-0 pb-3">
                            <div class="d-flex svg-illustration align-items-center gap-2 mb-4">
                                <span class="app-brand-logo demo">
                                    <span style="color: var(--bs-primary)">
                                        <svg width="268" height="150" viewBox="0 0 38 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M30.0944 2.22569C29.0511 0.444187 26.7508 -0.172113 24.9566 0.849138C23.1623 1.87039 22.5536 4.14247 23.5969 5.92397L30.5368 17.7743C31.5801 19.5558 33.8804 20.1721 35.6746 19.1509C37.4689 18.1296 38.0776 15.8575 37.0343 14.076L30.0944 2.22569Z"
                                                fill="currentColor" />
                                            <path
                                                d="M30.171 2.22569C29.1277 0.444187 26.8274 -0.172113 25.0332 0.849138C23.2389 1.87039 22.6302 4.14247 23.6735 5.92397L30.6134 17.7743C31.6567 19.5558 33.957 20.1721 35.7512 19.1509C37.5455 18.1296 38.1542 15.8575 37.1109 14.076L30.171 2.22569Z"
                                                fill="url(#paint0_linear_2989_100980)" fill-opacity="0.4" />
                                            <path
                                                d="M22.9676 2.22569C24.0109 0.444187 26.3112 -0.172113 28.1054 0.849138C29.8996 1.87039 30.5084 4.14247 29.4651 5.92397L22.5251 17.7743C21.4818 19.5558 19.1816 20.1721 17.3873 19.1509C15.5931 18.1296 14.9843 15.8575 16.0276 14.076L22.9676 2.22569Z"
                                                fill="currentColor" />
                                            <path
                                                d="M14.9558 2.22569C13.9125 0.444187 11.6122 -0.172113 9.818 0.849138C8.02377 1.87039 7.41502 4.14247 8.45833 5.92397L15.3983 17.7743C16.4416 19.5558 18.7418 20.1721 20.5361 19.1509C22.3303 18.1296 22.9391 15.8575 21.8958 14.076L14.9558 2.22569Z"
                                                fill="currentColor" />
                                            <path
                                                d="M14.9558 2.22569C13.9125 0.444187 11.6122 -0.172113 9.818 0.849138C8.02377 1.87039 7.41502 4.14247 8.45833 5.92397L15.3983 17.7743C16.4416 19.5558 18.7418 20.1721 20.5361 19.1509C22.3303 18.1296 22.9391 15.8575 21.8958 14.076L14.9558 2.22569Z"
                                                fill="url(#paint1_linear_2989_100980)" fill-opacity="0.4" />
                                            <path
                                                d="M7.82901 2.22569C8.87231 0.444187 11.1726 -0.172113 12.9668 0.849138C14.7611 1.87039 15.3698 4.14247 14.3265 5.92397L7.38656 17.7743C6.34325 19.5558 4.04298 20.1721 2.24875 19.1509C0.454514 18.1296 -0.154233 15.8575 0.88907 14.076L7.82901 2.22569Z"
                                                fill="currentColor" />
                                            <defs>
                                                <linearGradient id="paint0_linear_2989_100980" x1="5.36642"
                                                    y1="0.849138" x2="10.532" y2="24.104"
                                                    gradientUnits="userSpaceOnUse">
                                                    <stop offset="0" stop-opacity="1" />
                                                    <stop offset="1" stop-opacity="0" />
                                                </linearGradient>
                                                <linearGradient id="paint1_linear_2989_100980" x1="5.19475"
                                                    y1="0.849139" x2="10.3357" y2="24.1155"
                                                    gradientUnits="userSpaceOnUse">
                                                    <stop offset="0" stop-opacity="1" />
                                                    <stop offset="1" stop-opacity="0" />
                                                </linearGradient>
                                            </defs>
                                        </svg>
                                    </span>
                                </span>
                                <span class="h4 mb-0 app-brand-text fw-bold"></span>
                            </div>
                            <p class="mb-1 text-bold">
                                Booking Camp
                            </p>
                            <p class="mb-1">Jl. Lintas Solok, Kec. Danau Kembar</p>
                            <p class="mb-0">
                                Kabupaten Solok, Sumatera Barat 27383
                            </p>
                        </div>
                        <div>
                            <h5>INVOICE {{$data[0]['no_booking']}} </h5>
                            <div class="mb-1">
                                <span>Tanggal:</span>
                                <span>{{$data[0]['created_at']}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="my-0" />
                <div class="card-body">
                    <div class="d-flex justify-content-between flex-wrap">
                        <div class="my-3">
                            <h6 class="pb-2">Diberikan kepada:</h6>
                            <p class="mb-1">{{$data[0]['name']}}</p>
                            <p class="mb-1">{{$data[0]['email']}}</p>
                            <p class="mb-1">{{$data[0]['no_telp']}}</p>
                            <p class="mb-0">{{$data[0]['alamat_lengkap']}}</p>
                        </div>
                        <div class="my-3">
                            <h6 class="pb-2">Biaya:</h6>
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="pe-3 fw-medium">Total biaya:</td>
                                        <td>Rp. {{ number_format($data[0]['final_biaya'])}} </td>
                                    </tr>
                                    <tr>
                                        <td class="pe-3 fw-medium">Lama menginap:</td>
                                        <td>{{$data[0]['total_menginap']}} Malam</td>
                                    </tr>
                                    {{-- <tr>
                                        <td class="pe-3 fw-medium">Country:</td>
                                        <td>United States</td>
                                    </tr>
                                    <tr>
                                        <td class="pe-3 fw-medium">IBAN:</td>
                                        <td>ETD95476213874685</td>
                                    </tr>
                                    <tr>
                                        <td class="pe-3 fw-medium">SWIFT code:</td>
                                        <td>BR91905</td>
                                    </tr> --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table m-0">
                        <thead class="table-light border-top">
                            <tr class="text-center">
                                <th>No</th>
                                <th>Kavling Dipilih</th>
                                <th>Jumlah/Malam</th>
                                <th>Harga</th>
                                <th>Tanggal Menginap</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach($data[0]['list_kavling'] as $p)
                            <tr>
                                <td class="text-center">{{$no ++}}</td>
                                <td class="text-center"><button type="button" style="width: 80px !important;margin:5px" class="btn btn-twitter waves-effect waves-light">{{$p['kode_kavling']}}</button></td>
                                <td class="text-center">{{$p['lama_menginap']}} Malam</td>
                                <td class="text-center">Rp. {{number_format($p['total_biaya'])}}</td>
                                <td class="text-center">{{$p['tanggal_booking']}}</td>
                            </tr>
                            @endforeach

                            <tr>
                                <td colspan="3" class="align-top px-4 py-5">
                                    <p class="mb-2">
                                        <span class="me-1 fw-semibold">Booking Camp</span>
                                        <span></span>
                                    </p>
                                    <span>Terima kasih atas kepercayaan anda</span>
                                </td>
                                <td class="text-end px-4 py-5">
                                    <p class="mb-0">Total :</p>
                                </td>
                                <td class="px-4 py-5">
                                    <p class="fw-semibold mb-0 text-end">Rp. {{ number_format($data[0]['final_biaya'])}}</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <span class="fw-bold">Note:</span>
                            <span>Simpan kertas invoice ini yang bertujuan sebagai bukti pemesanan kavling, lihatkan lah kertas ini kepada petugas yang ada dilokasi sesuai dengan tanggal anda menginap, pastikan sudah membaca persyaratan saat akan kamping</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Invoice -->

        <!-- Invoice Actions -->
        <div class="col-xl-3 col-md-4 col-12 invoice-actions">
            <div class="card">
                <div class="card-body">
                    <button class="btn btn-outline-secondary d-grid w-100 mb-3">
                        Download
                    </button>
                    <a class="btn btn-outline-secondary d-grid w-100 mb-3" target="_blank"
                        href="app-invoice-print.html">
                        Print
                    </a>
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

@include('admin.pesanan_user.js')
@endpush
