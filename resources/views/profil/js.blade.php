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


    // UPLOAD FOTO PROFILE
    $('#upload_foto').change(function (e) {
        e.preventDefault();
        var dokumen = document.getElementById("upload_foto").files.length;
        var dataform = new FormData(document.getElementById('form_upload_file'));
        dataform.append('foto_profil', $('#upload_foto')[0].files[0]);
        loading($('#form_upload_file'));
        axios.post("{{ route('store_foto') }}", dataform)
            .then(function (response) {
                console.log('then', response);
                swalWithBootstrapButtons.fire({
                    title: 'Berhasil',
                    text: response.data,
                    icon: 'success',
                    confirmButtonText: '<i class="fas fa-check"></i> Oke',
                    showCancelButton: false,
                });
                location.reload();
                $('#form_upload_file').waitMe('hide');
            })
            .catch(function (error) {
                if (error.response.status == 422) {
                    swalWithBootstrapButtons.fire({
                        title: 'Batal',
                        text: error.response.data.upload_foto[0],
                        icon: 'error',
                        confirmButtonText: '<i class="fas fa-check"></i> Oke',
                        showCancelButton: false,
                    }).then((result) => {
                        $('#form_upload_file').waitMe('hide');
                    })
                }
            });
    });


    // UPLOAD FOTO  KTP
    $('#upload_foto_ktp').change(function (e) {
        e.preventDefault();
        var dokumen = document.getElementById("upload_foto_ktp").files.length;
        var dataform = new FormData(document.getElementById('form_upload_file_ktp'));
        dataform.append('foto_profil', $('#upload_foto_ktp')[0].files[0]);
        loading($('#form_upload_file_ktp'));
        axios.post("{{ route('store_ktp') }}", dataform)
            .then(function (response) {
                console.log('then', response);
                swalWithBootstrapButtons.fire({
                    title: 'Berhasil',
                    text: response.data,
                    icon: 'success',
                    confirmButtonText: '<i class="fas fa-check"></i> Oke',
                    showCancelButton: false,
                });
                location.reload();
                $('#form_upload_file_ktp').waitMe('hide');
            })
            .catch(function (error) {
                if (error.response.status == 422) {
                    swalWithBootstrapButtons.fire({
                        title: 'Batal',
                        text: error.response.data.upload_foto_ktp[0],
                        icon: 'error',
                        confirmButtonText: '<i class="fas fa-check"></i> Oke',
                        showCancelButton: false,
                    }).then((result) => {
                        $('#form_upload_file_ktp').waitMe('hide');
                    })
                }
            });
    });

    // OPEN IMG
    $(document).on('click', '.open-img-profil', function (e) {
        e.preventDefault();
        var img = $('.open-img-profil').attr('src');
        $('#imgku').attr('src', img);
    });
    $(document).on('click', '.open-img-ktp', function (e) {
        e.preventDefault();
        var img = $('.open-img-ktp').attr('src');
        $('#imgku').attr('src', img);
    });


    $(document).on('submit', '#formTambah', function (e) {
        e.preventDefault();
        var form = $(this)[0];
        var postData = new FormData(form);
        console.log(postData);
        // get form action url
        $("#edit_profil").html(
            '<i class="spinner-grow spinner-grow-sm mr-2" role="status" aria-hidden="true"></i> DIPROSES...'
        );
        $("#edit_profil").addClass('disabled');
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
                axios.post("{{ route('store_edit') }}", postData)
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
                $("#edit_profil").html('Simpan');
                $("#edit_profil").removeClass('disabled');

            } else if (result.dismiss === Swal.DismissReason.cancel) {
                swalWithBootstrapButtons.fire({
                    title: 'Batal',
                    text: 'Simpan data dibatalkan',
                    icon: 'error',
                    confirmButtonText: '<i class="fas fa-check"></i> Oke',
                    showCancelButton: false,
                })
                $('#formTambah').waitMe('hide');
                $("#edit_profil").html('Simpan');
                $("#edit_profil").removeClass('disabled');
            }
        })
    });


</script>
