@extends('layouts.master')
@push('css')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.css')}}" />
@endpush

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light"></span> Profil User
    </h4>
    <!-- Header -->
    <div class="row gy-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
                    <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                        @if ($data[0]->foto_user == null)
                        <img src="../../assets/img/avatars/1.png" alt="user image"
                            class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img">
                        @else
                        <img src="{{url('/foto_user/' . $data[0]->foto_user)}}" alt="user image" width="100px"
                            class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img" />
                        @endif
                    </div>
                    <div class="flex-grow-1 mt-2 mt-sm-3">
                        <table class="table table-borderless">
                            <tr>
                                <td width="20%">
                                    <i class="mdi mdi-account-outline mdi-24px"></i><span class="fw-semibold mx-2">Nama
                                        Lengkap</span>
                                </td>
                                <td width="3%">
                                    :
                                </td>
                                <td width="78%">
                                    <span>{{Auth::user()->name}}</span>
                                </td>
                            </tr>
                            <tr>
                                <td width="20%">
                                    <i class="mdi mdi-account-minus-outline mdi-24px"></i><span
                                        class="fw-semibold mx-2">Nama Panggilan</span>
                                </td>
                                <td width="3%">
                                    :
                                </td>
                                <td width="78%">
                                    <span>{{$data[0]->nama_panggilan}}</span>
                                </td>
                            </tr>
                            <tr>
                                <td width="20%">
                                    <i class="mdi mdi-email-outline mdi-24px"></i><span
                                        class="fw-semibold mx-2">Email</span>
                                </td>
                                <td width="3%">
                                    :
                                </td>
                                <td width="78%">
                                    <span>{{$data[0]->email}}</span>
                                </td>
                            </tr>
                            <tr>
                                <td width="20%">
                                    <i class="mdi mdi-phone-outline mdi-24px"></i><span class="fw-semibold mx-2">No
                                        Telp</span>
                                </td>
                                <td width="3%">
                                    :
                                </td>
                                <td width="78%">
                                    <span>{{$data[0]->no_telp}}</span>
                                </td>
                            </tr>
                            <tr>
                                <td width="20%">
                                    <i class="mdi mdi-gender-male-female mdi-24px"></i><span
                                        class="fw-semibold mx-2">Jenis Kelamin</span>
                                </td>
                                <td width="3%">
                                    :
                                </td>
                                <td width="78%">
                                    <span>{{$data[0]->jenis_kelamin}}</span>
                                </td>
                            </tr>
                            <tr>
                                <td width="20%">
                                    <i class="mdi mdi-map-marker-outline mdi-24px"></i><span
                                        class="fw-semibold mx-2">Tempat Lahir</span>
                                </td>
                                <td width="3%">
                                    :
                                </td>
                                <td width="78%">
                                    <span>{{$data[0]->tempat_lahir}}</span>
                                </td>
                            </tr>
                            <tr>
                                <td width="20%">
                                    <i class="mdi mdi-clipboard-text-clock mdi-24px"></i><span
                                        class="fw-semibold mx-2">Tanggal Lahir</span>
                                </td>
                                <td width="3%">
                                    :
                                </td>
                                <td width="78%">
                                    <span>{{$data[0]->tanggal_lahir}}</span>
                                </td>
                            </tr>
                            <tr>
                                <td width="20%">
                                    <i class="mdi mdi-flag-outline mdi-24px"></i><span class="fw-semibold mx-2">Alamat
                                        Lengkap</span>
                                </td>
                                <td width="3%">
                                    :
                                </td>
                                <td width="78%">
                                    <span>{{$data[0]->alamat_lengkap}}</span>
                                </td>
                            </tr>
                            <tr>
                                <td width="20%">
                                    <i class="mdi mdi-check mdi-24px"></i><span class="fw-semibold mx-2">Status
                                        Akun</span>
                                </td>
                                <td width="3%">
                                    :
                                </td>
                                <td width="78%">
                                    <span>
                                        @if ($data[0]->status_akun == 1)
                                        <button type="button" class="btn btn-outline-whatsapp waves-effect btn-xs"> <i
                                                class="tf-icons mdi mdi-check-decagram me-1"></i>Lengkap</button>
                                        @elseif ($data[0]->status_akun == 0)
                                        <button type="button"
                                            class="btn rounded-pill btn-outline-youtube waves-effect btn-xs"> <i
                                                class="tf-icons mdi mdi-close-circle me-1"></i>Tidak Lengkap </button>
                                        @else
                                        <span>-</span>
                                        @endif
                                    </span>
                                </td>
                            </tr>
                        </table>
                        <div
                            class="d-flex align-items-md-end align-items-sm-end align-items-end justify-content-md-end justify-content-end mx-4 flex-md-row flex-column gap-4">
                            <a href="{{ route('edit_profil') }}" class="btn btn-primary btn-sm">
                                <i class='mdi mdi-account-check-outline me-1'></i>Lengkapi Profile
                            </a>
                        </div>

                    </div>
                </div>
            </div>
            <span style="color: red;font-size: 12px">Note : <br>
                <li>Silahkan lengkapi profil dengan meng klik menu <b>Lengkapi Profil</b></li>
                <li>Setelah profil anda lengkapi, admin akan melakukan pengecekan data anda</li>
                <li>Setelah akun anda  <button type="button" class="btn btn-outline-whatsapp waves-effect btn-xs"> <i
                    class="tf-icons mdi mdi-check-decagram me-1"></i>Aktif</button>, maka anda dapat melakukan Booking</li>
            </span>
        </div>
    </div>
</div>

@endsection

@push('js')
<script src="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
@include('profil.js')
@endpush
