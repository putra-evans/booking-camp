@extends('layouts.master')
@push('css')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.css')}}" />
@endpush

@section('content')
<h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">Profil /</span> Lengkapi Profil
</h4>
<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <h4 class="card-header">Detail Profil</h4>
            <!-- Account -->
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td>
                            <form method="post" id="form_upload_file" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" id="id_user" name="id_user" value="{{$data[0]->id}}" readonly>
                                <div class="d-flex align-items-start align-items-sm-center gap-4">
                                    @if ($data[0]->foto_user == null)
                                    <img src="../../assets/img/avatars/1.png" alt="user-avatar"
                                    class="d-block w-px-120 h-px-120 rounded" id="uploadedAvatar"/>
                                    @else
                                    <img src="{{url('/foto_user/' . $data[0]->foto_user)}}" alt="user-avatar" width="200px"
                                        class="d-block open-img-profil img-fluid" id="uploadedAvatar" data-bs-toggle='modal' data-bs-target='#ModalFoto' />
                                    @endif
                                    <div class="button-wrapper">
                                        <label for="upload_foto" class="btn btn-primary me-2 mb-3" tabindex="0">
                                            <span class="d-none d-sm-block">Ganti Profil</span>
                                            <i class="mdi mdi-tray-arrow-up d-block d-sm-none"></i>
                                            <input type="file" id="upload_foto" name="upload_foto" class="account-file-input" hidden
                                                accept="image/png, image/jpeg" />
                                        </label>
                                        <div class="text-muted small">Format JPG, PNG. Ukuran Max 2MB</div>
                                    </div>
                                </div>
                            </form>
                        </td>
                        <td>
                            <form method="post" id="form_upload_file_ktp" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" id="id_user" name="id_user" value="{{$data[0]->id}}" readonly>
                                <div class="d-flex align-items-start align-items-sm-center gap-4">
                                    @if ($data[0]->foto_ktp == null)
                                    <img src="../../assets/img/avatars/1.png" alt="user-avatar"
                                    class="d-block w-px-120 h-px-120 rounded" id="uploadedAvatar" />
                                    @else
                                    <img src="{{url('/foto_ktp/' . $data[0]->foto_ktp)}}" alt="user-avatar" width="200px"
                                        class="d-block open-img-ktp img-fluid" id="uploadedAvatar" data-bs-toggle='modal' data-bs-target='#ModalFoto' />
                                    @endif
                                    <div class="button-wrapper">
                                        <label for="upload_foto_ktp" class="btn btn-primary me-2 mb-3" tabindex="0">
                                            <span class="d-none d-sm-block">Ganti KTP</span>
                                            <i class="mdi mdi-tray-arrow-up d-block d-sm-none"></i>
                                            <input type="file" id="upload_foto_ktp" name="upload_foto_ktp" class="account-file-input" hidden
                                                accept="image/png, image/jpeg" />
                                        </label>
                                        <div class="text-muted small">Format JPG, PNG. Ukuran Max 2MB</div>
                                    </div>
                                </div>
                            </form>
                        </td>
                    </tr>
                </table>

            </div>
            <div class="card-body pt-2 mt-1">
                <form id="formTambah" method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
                    @csrf
                    <div class="row mt-2 gy-4">
                        <input required class="form-control" type="hidden" id="id_usernya" name="id_usernya" value="{{$data[0]->id}}" readonly />
                        <div class="col-md-6">
                            <div class="form-floating form-floating-outline required">
                                <input required class="form-control" type="text" id="nama_lengkap" name="nama_lengkap" value="{{$data[0]->name}}" autofocus />
                                <label for="nama_lengkap">Nama Lengkap</label>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating form-floating-outline required">
                                <input required class="form-control" type="text" name="nama_panggilan" id="nama_panggilan" value="{{$data[0]->nama_panggilan}}" />
                                <label for="nama_panggilan">Nama Panggilan</label>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating form-floating-outline required">
                                <input required class="form-control" type="text" id="email" name="email"
                                    value="{{$data[0]->email}}" readonly />
                                <label for="email">E-mail</label>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating form-floating-outline required">
                                <input required type="text" class="form-control" id="no_telp" name="no_telp" value="{{$data[0]->no_telp}}" />
                                <label for="no_telp">No Telp</label>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group input-group-merge">
                                <div class="form-floating form-floating-outline required">
                                    <input required type="text" id="tempat_lahir" name="tempat_lahir" class="form-control" value="{{$data[0]->tempat_lahir}}"/>
                                    <label for="tempat_lahir">Tempat Lahir</label>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating form-floating-outline required">
                                <input required type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{$data[0]->tanggal_lahir}}" />
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating form-floating-outline required">
                                <select required id="jenis_kelamin" name="jenis_kelamin" class="select2 form-select">
                                    <option value="Laki-laki" {{ $data[0]->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="Perempuan" {{ $data[0]->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                                <label for="jenis_kelamin" >Jenis Kelamin</label>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>

                        {{-- <div class="col-md-6">
                            <div class="form-floating form-floating-outline required">
                                @if ($data[0]->status_akun == 1)
                                <input type="text" class="form-control" value="Lengkap" readonly />
                                @else
                                <input type="text" class="form-control" value="Tidak Aktif" readonly />
                                @endif
                                <label for="state">Status Akun</label>
                            </div>
                        </div> --}}
                        <div class="col-md-12">
                            <div class="form-floating form-floating-outline required">
                               <textarea required name="alamat_lengkap" id="alamat_lengkap" class="form-control h-px-100">{{$data[0]->alamat_lengkap}}</textarea>
                                <label for="zipCode">Alamat Lengkap</label>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary" id="edit_profil">Edit Profil</button>
                        <a href="{{ route('profil') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
                <br>
                <span style="color: red;font-size: 12px">Note : <br>
                    <li>Setelah profil lengkap dan status akun masih <b>Belum Aktif</b></li>
                    <li>Tunggu sampai admin melakukan verifikasi terhadap data</li>
                    <li>Setelah akun anda  <button type="button" class="btn btn-outline-whatsapp waves-effect btn-xs"> <i
                        class="tf-icons mdi mdi-check-decagram me-1"></i>Lengkap</button>, maka anda dapat melakukan Booking</li>
                </span>
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
@include('profil.js')
@endpush
