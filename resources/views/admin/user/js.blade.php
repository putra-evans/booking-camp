<script>
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


    $(document).ready(function () {
        getData();
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
