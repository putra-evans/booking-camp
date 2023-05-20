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
    tinymce.init({
     selector: 'textarea#input_cara',
     plugins: 'code table lists',
     toolbar: 'undo redo | formatselect| bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
   });


    $(document).ready(function () {
        getData();
    });

    function getData() {
        'use strict';
        var listCara = $("#listCara").DataTable({
            dom: 'Bfrtip',
            responsive: false,
            scrollX: true,
            autoWidth: false,
            bDestroy: true,
            ajax: "{{ route('cara-booking') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    className: 'text-center'
                },
                {
                    data: 'cara_booking',
                    name: 'cara_booking'
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
        $('form#formAddCara').trigger('reset');
        $('form#formAddCara').removeClass('was-validated');
    }
    function reset_edit() {
        $('#errEntry').html('');
        $('#errSuccess').html('');
        $('form#formEditCara').trigger('reset');
        $('form#formEditCara').removeClass('was-validated');
    }


    $(document).on('click', '#addCara', function (e) {
        reset();
        e.preventDefault();
        $('#addCaraModal').modal('show');
    });

    $(document).on('submit', '#formAddCara', function (e) {
        e.preventDefault();
        var form = $(this)[0];
        var postData = new FormData(form);
        $("#simpan_cara").html(
            '<i class="spinner-grow spinner-grow-sm mr-2" role="status" aria-hidden="true"></i> DIPROSES...'
        );
        $("#simpan_cara").addClass('disabled');
        loading($('#formAddCara'));
        swalWithBootstrapButtons.fire({
            title: 'Konfirmasi',
            text: 'Apakah anda ingin menyimpan data ini ?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, simpan!',
            cancelButtonText: 'Tidak, batalkan!',
        }).then((result) => {
            if (result.isConfirmed) {
                axios.post("{{ route('tambah-cara') }}", postData)
                    .then(function (response) {
                        console.log('then', response);
                        swalWithBootstrapButtons.fire({
                            title: 'Berhasil',
                            text: 'Data berhasil ditambahkan.',
                            icon: 'success',
                            confirmButtonText: '<i class="fas fa-check"></i> Oke',
                            showCancelButton: false,
                        });
                        $('#formAddCara').waitMe('hide');
                        $('#addCaraModal').modal('toggle');
                        window.location.reload();

                    })
                    .catch(function (error) {
                        if (error.response.status == 422) {
                            $('#formAddCara').addClass('was-validated');
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
                                    $('#formAddCara').waitMe('hide');
                                }
                            })
                        } else {
                            swalWithBootstrapButtons.fire({
                                title: 'Batal',
                                text: 'Data sudah ada, silahkan lakukan edit data',
                                icon: 'error',
                                confirmButtonText: '<i class="fas fa-check"></i> Oke',
                                showCancelButton: false,
                            }).then((result) => {
                                $('#formAddCara').waitMe('hide');
                                $('#addCaraModal').modal('toggle');
                                window.location.reload();
                            })
                        }
                    });
                $('#formAddCara').waitMe('hide');
                $("#simpan_cara").html('Simpan');
                $("#simpan_cara").removeClass('disabled');
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                swalWithBootstrapButtons.fire({
                    title: 'Batal',
                    text: 'Simpan data dibatalkan',
                    icon: 'error',
                    confirmButtonText: '<i class="fas fa-check"></i> Oke',
                    showCancelButton: false,
                })
                $('#formAddCara').waitMe('hide');
                $("#simpan_cara").html('Simpan');
                $("#simpan_cara").removeClass('disabled');
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
                axios.post("{{ route('hapus-cara') }}", postData)
                .then(function (r) {
                    swalWithBootstrapButtons.fire(
                        'Terhapus',
                        'Data berhasil dihapus.',
                        'success'
                        )
                        $('#listCara').DataTable().ajax.reload();
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
        reset_edit();
        let id = $(this).data('id')
        $('#editCaraModal').modal('show');
        getDetailData(id);
    });

    function getDetailData(id) {
        postData = {
            'id': id
        };
        loading($('#editCaraModal'));
        axios.post("{{ route('detail-cara') }}", postData)
            .then(function (res) {
                $('#editCaraModal').waitMe('hide');
                let data = res.data[0];
                $('#id_cara').val(data.id_cara_booking);
                tinymce.activeEditor.selection.setContent(data.cara_booking);


            })
    }

    $(document).on('submit', '#formEditCara', function (e) {
        e.preventDefault();
        var form = $(this)[0];
        var postData = new FormData(form);
        $("#edit_cara").html(
            '<i class="spinner-grow spinner-grow-sm mr-2" role="status" aria-hidden="true"></i> DIPROSES...'
        );
        $("#edit_cara").addClass('disabled');
        loading($('#formEditCara'));
        swalWithBootstrapButtons.fire({
            title: 'Konfirmasi',
            text: 'Apakah anda ingin mengubah data ini ?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, simpan!',
            cancelButtonText: 'Tidak, batalkan!',
        }).then((result) => {
            if (result.isConfirmed) {
                axios.post("{{ route('edit-cara') }}", postData)
                    .then(function (response) {
                        console.log('then', response);
                        swalWithBootstrapButtons.fire({
                            title: 'Berhasil',
                            text: 'Data berhasil diubah.',
                            icon: 'success',
                            confirmButtonText: '<i class="fas fa-check"></i> Oke',
                            showCancelButton: false,
                        });
                        $('#formEditCara').waitMe('hide');
                        $('#editCaraModal').modal('toggle');
                    window.location.reload();


                    })
                    .catch(function (error) {
                        if (error.response.status == 422) {
                            $('#formEditCara').addClass('was-validated');
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
                                    $('#formEditCara').waitMe('hide');
                                }
                            })
                        } else {
                            swalWithBootstrapButtons.fire({
                                title: 'Batal',
                                text: 'Data sudah ada, masukkan yang lain',
                                icon: 'error',
                                confirmButtonText: '<i class="fas fa-check"></i> Oke',
                                showCancelButton: false,
                            }).then((result) => {
                                $('#formEditCara').waitMe('hide');
                                $('#editCaraModal').modal('toggle');
                                window.location.reload();
                            })
                        }
                    });
                $('#formEditCara').waitMe('hide');
                $("#edit_cara").html('Edit Data');
                $("#edit_cara").removeClass('disabled');
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                swalWithBootstrapButtons.fire({
                    title: 'Batal',
                    text: 'Simpan data dibatalkan',
                    icon: 'error',
                    confirmButtonText: '<i class="fas fa-check"></i> Oke',
                    showCancelButton: false,
                })
                $('#formEditCara').waitMe('hide');
                $("#edit_cara").html('Edit Data');
                $("#edit_cara").removeClass('disabled');
                window.location.reload();

            }
        })
    });



</script>
