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
        var listKavling = $("#listKavling").DataTable({
            dom: 'Bfrtip',
            responsive: false,
            scrollX: true,
            autoWidth: false,
            bDestroy: true,
            ajax: "{{ route('kavling') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    className: 'text-center'
                },
                {
                    data: 'kode_kavling',
                    name: 'kode_kavling'
                },
                {
                    data: 'nama_kavling',
                    name: 'nama_kavling'
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

    function reset() {
        $('#errEntry').html('');
        $('#errSuccess').html('');
        $('form#formAddKavling').trigger('reset');
        $('form#formAddKavling').removeClass('was-validated');
    }


    $(document).on('click', '#addKavling', function (e) {
        reset();
        e.preventDefault();
        $('#addKavlingModal').modal('show');
    });

    $(document).on('submit', '#formAddKavling', function (e) {
        e.preventDefault();
        var form = $(this)[0];
        var postData = new FormData(form);
        $("#simpan_kavling").html(
            '<i class="spinner-grow spinner-grow-sm mr-2" role="status" aria-hidden="true"></i> DIPROSES...'
        );
        $("#simpan_kavling").addClass('disabled');
        loading($('#formAddKavling'));
        swalWithBootstrapButtons.fire({
            title: 'Konfirmasi',
            text: 'Apakah anda ingin menyimpan data ini ?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, simpan!',
            cancelButtonText: 'Tidak, batalkan!',
        }).then((result) => {
            if (result.isConfirmed) {
                axios.post("{{ route('tambah-kavling') }}", postData)
                    .then(function (response) {
                        console.log('then', response);
                        swalWithBootstrapButtons.fire({
                            title: 'Berhasil',
                            text: 'Data berhasil ditambahkan.',
                            icon: 'success',
                            confirmButtonText: '<i class="fas fa-check"></i> Oke',
                            showCancelButton: false,
                        });
                        getData();
                        $('#formAddKavling').waitMe('hide');
                        $('#addKavlingModal').modal('toggle');

                    })
                    .catch(function (error) {
                        if (error.response.status == 422) {
                            $('#formAddKavling').addClass('was-validated');
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
                                    $('#formAddKavling').waitMe('hide');
                                }
                            })
                        } else {
                            swalWithBootstrapButtons.fire({
                                title: 'Batal',
                                text: 'Data kavling sudah ada, masukkan kavling yang lain',
                                icon: 'error',
                                confirmButtonText: '<i class="fas fa-check"></i> Oke',
                                showCancelButton: false,
                            }).then((result) => {
                                $('#formAddKavling').waitMe('hide');
                            })
                        }
                    });
                $('#formAddKavling').waitMe('hide');
                $("#simpan_kavling").html('Upload');
                $("#simpan_kavling").removeClass('disabled');
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                swalWithBootstrapButtons.fire({
                    title: 'Batal',
                    text: 'Simpan data dibatalkan',
                    icon: 'error',
                    confirmButtonText: '<i class="fas fa-check"></i> Oke',
                    showCancelButton: false,
                })
                $('#formAddKavling').waitMe('hide');
                $("#simpan_kavling").html('Upload');
                $("#simpan_kavling").removeClass('disabled');
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
                axios.post("{{ route('hapus-kavling') }}", postData)
                .then(function (r) {
                    swalWithBootstrapButtons.fire(
                        'Terhapus',
                        'Data berhasil dihapus.',
                        'success'
                        )
                        $('#listKavling').DataTable().ajax.reload();
                    })
                    .catch(function (error) {
                        swalWithBootstrapButtons.fire({
                                title: 'Batal',
                                text: 'karena kavling ini sudah pernah dibooking',
                                icon: 'error',
                                confirmButtonText: '<i class="fas fa-check"></i> Oke',
                                showCancelButton: false,
                            });
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

    $(document).on('click', '#BtnEdit', function (e) {
        e.preventDefault();
        let id = $(this).data('id')
        $('#editKavlingModal').modal('show');
        getDetailData(id);
    });

    function getDetailData(id) {
        postData = {
            'id': id
        };
        loading($('#editKavlingModal'));
        axios.post("{{ route('detail-kavling') }}", postData)
            .then(function (res) {
                $('#editKavlingModal').waitMe('hide');
                let data = res.data[0];
                $('#edit_id_kavling').val(data.id_kavling);
                $('#edit_kode_kavling').val(data.kode_kavling);
                $('#edit_nama_kavling').val(data.nama_kavling);
            })
    }

    $(document).on('submit', '#formEditKavling', function (e) {
        e.preventDefault();
        var form = $(this)[0];
        var postData = new FormData(form);
        $("#edit_kavling").html(
            '<i class="spinner-grow spinner-grow-sm mr-2" role="status" aria-hidden="true"></i> DIPROSES...'
        );
        $("#edit_kavling").addClass('disabled');
        loading($('#formEditKavling'));
        swalWithBootstrapButtons.fire({
            title: 'Konfirmasi',
            text: 'Apakah anda ingin mengubah data ini ?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, simpan!',
            cancelButtonText: 'Tidak, batalkan!',
        }).then((result) => {
            if (result.isConfirmed) {
                axios.post("{{ route('edit-kavling') }}", postData)
                    .then(function (response) {
                        console.log('then', response);
                        swalWithBootstrapButtons.fire({
                            title: 'Berhasil',
                            text: 'Data berhasil diubah.',
                            icon: 'success',
                            confirmButtonText: '<i class="fas fa-check"></i> Oke',
                            showCancelButton: false,
                        });
                        getData();
                        $('#formEditKavling').waitMe('hide');
                        $('#editKavlingModal').modal('toggle');

                    })
                    .catch(function (error) {
                        if (error.response.status == 422) {
                            $('#formEditKavling').addClass('was-validated');
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
                                    $('#formEditKavling').waitMe('hide');
                                }
                            })
                        } else {
                            swalWithBootstrapButtons.fire({
                                title: 'Batal',
                                text: 'Data kavling sudah ada, masukkan kavling yang lain',
                                icon: 'error',
                                confirmButtonText: '<i class="fas fa-check"></i> Oke',
                                showCancelButton: false,
                            }).then((result) => {
                                $('#formEditKavling').waitMe('hide');
                            })
                        }
                    });
                $('#formEditKavling').waitMe('hide');
                $("#edit_kavling").html('Upload');
                $("#edit_kavling").removeClass('disabled');
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                swalWithBootstrapButtons.fire({
                    title: 'Batal',
                    text: 'Simpan data dibatalkan',
                    icon: 'error',
                    confirmButtonText: '<i class="fas fa-check"></i> Oke',
                    showCancelButton: false,
                })
                $('#formEditKavling').waitMe('hide');
                $("#edit_kavling").html('Upload');
                $("#edit_kavling").removeClass('disabled');
            }
        })
    });



</script>
