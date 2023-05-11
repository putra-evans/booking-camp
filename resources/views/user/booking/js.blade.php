<script>
    let tanggal_pilih = '';

    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })

    function loading(el) {
        el.waitMe({
            effect: 'ios',
            text: 'Mohon tunggu...',
            bg: 'rgba(255,255,255,0.7)',
            color: '#000',
            maxSize: '',
            waitTime: -1,
            textPos: 'vertical',
            fontSize: '',
            source: '',
            onClose: function (el) {}
        });
    }


    function load_kavling(data) {
        var rows = '';
        var i = 0;
        $.each(data, function (key, value) {
            let disable = '';
            if (value.id_booking == null) {
                disable = '';
            } else {
                disable = 'disabled';
            }
            $('#tbody_button').append(
                '<button type="button" class="BtnPilihKavling btn btn-twitter waves-effect waves-light ' +
                disable + '" data-id="' + value.id_ms_kavling + '" data-tanggal_pilih="' + tanggal_pilih +
                '" data-nama_kavling="' + value.nama_kavling +
                '" style="width: 80px !important;margin:5px">' + value.kode_kavling + '</button>');
        });
    }

    function calender() {
        jSuites.calendar(document.getElementById('calendar'), {
            format: 'YYYY-MM-DD',
            onupdate: function (a, b) {
                loading($('.loading-kalender'));
                tanggal_pilih = b;
                let postData = {
                    'tgl_dipilih': tanggal_pilih
                };
                $('#tbody_button').empty();
                axios.post("{{ route('get_booking') }}", postData)
                    .then(function (res) {
                        load_kavling(res.data)
                        $('.loading-kalender').waitMe('hide');
                    })
            },
            onchange: function (instance, value) {
                readonly: true
            }
        });
    }



    $(document).on('click', '.BtnPilihKavling', function (e) {
        e.preventDefault();
        let id_kavling = $(this).data('id')
        let nama_kavling = $(this).data('nama_kavling')

        let postData = {
            'id_kavling': id_kavling,
            'tgl_dipilih': tanggal_pilih,
            'nama_kavling': nama_kavling
        };

        $("#simpan_pengalaman").html(
            '<i class="spinner-grow spinner-grow-sm mr-2" role="status" aria-hidden="true"></i> DIPROSES...'
        );
        $("#simpan_pengalaman").addClass('disabled');
        loading($('#formTambah'));
        swalWithBootstrapButtons.fire({
            title: 'Konfirmasi',
            text: 'Apakah anda ingin menyimpan data ini ?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, simpan!',
            cancelButtonText: 'Tidak, batalkan!',
        }).then((result) => {
            if (result.isConfirmed) {
                axios.post(`${url}/api/pengalamankerja`, postData)
                    .then(function (response) {
                        console.log('then', response);
                        swalWithBootstrapButtons.fire({
                            title: 'Berhasil',
                            text: 'Data berhasil ditambahkan.',
                            icon: 'success',
                            confirmButtonText: '<i class="fas fa-check"></i> Oke',
                            showCancelButton: false,
                        });
                        getAllData();
                        $('#formTambah').waitMe('hide');
                        $('#addPengalaman').modal('toggle');

                    })
                    .catch(function (error) {
                        if (error.response.status == 422) {
                            $('#formTambah').addClass('was-validated');
                            swalWithBootstrapButtons.fire({
                                title: 'Batal',
                                text: 'Simpan data dibatalkan',
                                icon: 'error',
                                confirmButtonText: '<i class="fas fa-check"></i> Oke',
                                showCancelButton: false,
                            }).then((result) => {
                                if (result.value) {
                                    $.each(error.response.data, function (key, value) {
                                        console.log(value[0]);
                                        if (key != 'isi') {
                                            $('input[name="' + key +
                                                '"], textarea[name="' + key +
                                                '"], select[name="' + key + '"]'
                                            ).closest('div.required').find(
                                                'div.invalid-feedback').text(
                                                value[0]);
                                        } else {
                                            $('#pesanErr').html(value);
                                        }
                                    });
                                    $('#formTambah').waitMe('hide');
                                }
                            })
                        }
                    });
                $('#formTambah').waitMe('hide');
                $("#simpan_pengalaman").html('Simpan');
                $("#simpan_pengalaman").removeClass('disabled');

            } else if (result.dismiss === Swal.DismissReason.cancel) {
                swalWithBootstrapButtons.fire({
                    title: 'Batal',
                    text: 'Simpan data dibatalkan',
                    icon: 'error',
                    confirmButtonText: '<i class="fas fa-check"></i> Oke',
                    showCancelButton: false,
                })
                $('#formTambah').waitMe('hide');
                $("#simpan_pengalaman").html('Simpan');
                $("#simpan_pengalaman").removeClass('disabled');
            }
        })
    });










    $(document).ready(function () {
        calender();
    });

    function getData() {
        'use strict';
        var listUser = $("#listUser").DataTable({
            dom: 'Bfrtip',
            responsive: false,
            scrollX: true,
            autoWidth: false,
            ajax: "{{ route('user') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    className: 'text-center'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'status_akun',
                    name: 'status_akun',
                    className: 'text-center'
                },
                {
                    data: 'action',
                    name: 'action',
                    className: 'text-center'
                },
            ],
            columnDefs: [{
                orderable: false,
                targets: [0, 1, 2]
            }],
        });
    }


    $(document).on('click', '#BtnDetail', function (e) {
        e.stopPropagation();
        let id = $(this).data('id')
        $('#detailUser').modal('show');
        getDetailData(id);
    });

    function getDetailData(id) {
        postData = {
            'id': id
        };
        loading($('#detailUser'));
        axios.post("{{ route('get_user') }}", postData)
            .then(function (res) {
                $('#detailUser').waitMe('hide');
                let data = res.data[0];
                let status = '';
                if (data.status_akun == 0) {
                    status = 'Tidak Aktif';
                } else {
                    status = 'Aktif';
                }
                $('#fotoProfil').attr('src', '{{url("/foto_user/")}}' + '/' + data.foto_user);
                $('#fotoKtp').attr('src', '{{url("/foto_ktp/")}}' + '/' + data.foto_ktp);
                $('#nama_lengkap').val(data.name);
                $('#nama_panggilan').val(data.nama_panggilan);
                $('#email').val(data.email);
                $('#no_telp').val(data.no_telp);
                $('#tempat_lahir').val(data.tempat_lahir);
                $('#tanggal_lahir').val(data.tanggal_lahir);
                $('#jenis_kelamin').val(data.jenis_kelamin);
                $('#status_akun').val(status);
                $('#alamat_lengkap').val(data.alamat_lengkap);

            })
    }

    // OPEN IMG
    $(document).on('click', '.open-img-profil', function (e) {
        e.preventDefault();
        var img = $('.open-img-profil').attr('src');
        $('#imgku').attr('src', img);
        $('#detailUser').modal('show');
    });
    $(document).on('click', '.open-img-ktp', function (e) {
        e.preventDefault();
        var img = $('.open-img-ktp').attr('src');
        $('#imgku').attr('src', img);
        $('#detailUser').modal('show');
    });

    $(document).on('click', '#BtnHapus', function (e) {
        e.preventDefault();
        let id = $(this).data('id');
        postData = {
            'id': id
        };
        swalWithBootstrapButtons.fire({
            title: 'Apakah anda yakin?',
            text: "Aksi ini tidak dapat dibatalkan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Tidak, batal!',
        }).then((result) => {
            if (result.isConfirmed) {
                axios.post("{{ route('destroy') }}", postData).then(function (r) {
                    swalWithBootstrapButtons.fire(
                        'Terhapus',
                        'Data berhasil dihapus.',
                        'success'
                    )
                    $('#listUser').DataTable().ajax.reload();
                });
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Dibatalkan',
                    'Data anda aman :)',
                    'error'
                )
            }
        })
    });



    $(document).on('click', '.btnNonAktif', function (e) {
        e.preventDefault();
        let id = $(this).data('id');
        postData = {
            'id': id
        };
        swalWithBootstrapButtons.fire({
            title: 'Apakah anda yakin? ',
            text: "Anda akan mengaktifkan user ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, Aktifkan!',
            cancelButtonText: 'Tidak, batal!',
        }).then((result) => {
            if (result.isConfirmed) {
                axios.post("{{ route('aktif_akun') }}", postData).then(function (r) {
                    swalWithBootstrapButtons.fire(
                        'Berhasil',
                        'Akun sudah aktif.',
                        'success'
                    )
                    $('#listUser').DataTable().ajax.reload();
                });
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Dibatalkan',
                    'Data anda aman :)',
                    'error'
                )
            }
        })
    });


    $(document).on('click', '.btnAktif', function (e) {
        e.preventDefault();
        let id = $(this).data('id');
        postData = {
            'id': id
        };
        swalWithBootstrapButtons.fire({
            title: 'Apakah anda yakin? ',
            text: "Anda akan nonaktifkan user ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, Non Aktifkan!',
            cancelButtonText: 'Tidak, batal!',
        }).then((result) => {
            if (result.isConfirmed) {
                axios.post("{{ route('nonaktif_akun') }}", postData).then(function (r) {
                    swalWithBootstrapButtons.fire(
                        'Berhasil',
                        'Akun sudah Non Aktif.',
                        'success'
                    )
                    $('#listUser').DataTable().ajax.reload();
                });
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Dibatalkan',
                    'Data anda aman :)',
                    'error'
                )
            }
        })
    });

</script>
