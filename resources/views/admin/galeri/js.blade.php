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

    function reset() {
        $('#errEntry').html('');
        $('#errSuccess').html('');
        $('form#formAddGaleri').trigger('reset');
        $('form#formAddGaleri').removeClass('was-validated');
    }


    $(document).on('click', '#addGaleri', function (e) {
        reset();
        e.preventDefault();
        $('#addGaleriModal').modal('show');
    });

    $(document).on('submit', '#formAddGaleri', function (e) {
        e.preventDefault();
        var form = $(this)[0];
        var postData = new FormData(form);
        $("#simpan_tertib").html(
            '<i class="spinner-grow spinner-grow-sm mr-2" role="status" aria-hidden="true"></i> DIPROSES...'
        );
        $("#simpan_tertib").addClass('disabled');
        loading($('#formAddGaleri'));
        swalWithBootstrapButtons.fire({
            title: 'Konfirmasi',
            text: 'Apakah anda ingin menyimpan data ini ?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, simpan!',
            cancelButtonText: 'Tidak, batalkan!',
        }).then((result) => {
            if (result.isConfirmed) {
                axios.post("{{ route('tambah-galeri') }}", postData)
                    .then(function (response) {
                        console.log('then', response);
                        swalWithBootstrapButtons.fire({
                            title: 'Berhasil',
                            text: 'Data berhasil ditambahkan.',
                            icon: 'success',
                            confirmButtonText: '<i class="fas fa-check"></i> Oke',
                            showCancelButton: false,
                        });
                        $('#formAddGaleri').waitMe('hide');
                        $('#addGaleriModal').modal('toggle');
                        window.location.reload();

                    })
                    .catch(function (error) {
                        if (error.response.status == 422) {
                            $('#formAddGaleri').addClass('was-validated');
                            swalWithBootstrapButtons.fire({
                                title: 'Batal',
                                text: 'Periksa kembali form inputan anda, jangan sampai ada data kosong dan tipe file sesuai',
                                icon: 'error',
                                confirmButtonText: '<i class="fas fa-check"></i> Oke',
                                showCancelButton: false,
                            }).then((result) => {
                                if (result.value) {
                                    $.each(error.response.data, function (key, value) {
                                        console.log(value[0]);
                                        if (key != 'isi') {
                                            $('input[name="' + key + '"], textarea[name="' + key + '"], select[name="' + key + '"]' ).closest('div.required').find('div.invalid-feedback').text(
                                                value[0]);
                                        } else {
                                            $('#pesanErr').html(value);
                                        }
                                    });
                                    $('#formAddGaleri').waitMe('hide');
                                }
                            })
                        }
                    });
                $('#formAddGaleri').waitMe('hide');
                $("#simpan_tertib").html('Simpan');
                $("#simpan_tertib").removeClass('disabled');
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                swalWithBootstrapButtons.fire({
                    title: 'Batal',
                    text: 'Simpan data dibatalkan',
                    icon: 'error',
                    confirmButtonText: '<i class="fas fa-check"></i> Oke',
                    showCancelButton: false,
                })
                $('#formAddGaleri').waitMe('hide');
                $("#simpan_tertib").html('Simpan');
                $("#simpan_tertib").removeClass('disabled');
                window.location.reload();
            }
        })
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
                axios.post("{{ route('hapus-galeri') }}", postData)
                .then(function (r) {
                    swalWithBootstrapButtons.fire(
                        'Terhapus',
                        'Data berhasil dihapus.',
                        'success'
                        )
                    });
                    window.location.reload();
            } else if (
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
