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
        selector: 'textarea#input_syarat_ketentuan',
        plugins: 'code table lists',
        toolbar: 'undo redo | formatselect| bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
    });


    $(document).ready(function () {
        getData();
    });

    function getData() {
        'use strict';
        var listSyarat = $("#listSyarat").DataTable({
            dom: 'Bfrtip',
            responsive: false,
            scrollX: true,
            autoWidth: false,
            bDestroy: true,
            ajax: "{{ route('syarat-ketentuan') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    className: 'text-center'
                },
                {
                    data: 'syarat',
                    name: 'syarat'
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
        $('form#formAddSyaratKetentuan').trigger('reset');
        $('form#formAddSyaratKetentuan').removeClass('was-validated');
    }

    function reset_edit() {
        $('#errEntry').html('');
        $('#errSuccess').html('');
        $('form#formEditSyarat').trigger('reset');
        $('form#formEditSyarat').removeClass('was-validated');
    }


    $(document).on('click', '#addSyaratKetentuan', function (e) {
        reset();
        e.preventDefault();
        $('#addSyaratKetentuanModal').modal('show');
    });

    $(document).on('submit', '#formAddSyaratKetentuan', function (e) {
        e.preventDefault();
        var form = $(this)[0];
        var postData = new FormData(form);
        $("#simpan_syarat").html(
            '<i class="spinner-grow spinner-grow-sm mr-2" role="status" aria-hidden="true"></i> DIPROSES...'
        );
        $("#simpan_syarat").addClass('disabled');
        loading($('#formAddSyaratKetentuan'));
        swalWithBootstrapButtons.fire({
            title: 'Konfirmasi',
            text: 'Apakah anda ingin menyimpan data ini ?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, simpan!',
            cancelButtonText: 'Tidak, batalkan!',
        }).then((result) => {
            if (result.isConfirmed) {
                axios.post("{{ route('tambah-syarat') }}", postData)
                    .then(function (response) {
                        console.log('then', response);
                        swalWithBootstrapButtons.fire({
                            title: 'Berhasil',
                            text: 'Data berhasil ditambahkan.',
                            icon: 'success',
                            confirmButtonText: '<i class="fas fa-check"></i> Oke',
                            showCancelButton: false,
                        });

                        $('#formAddSyaratKetentuan').waitMe('hide');
                        $('#addSyaratKetentuanModal').modal('toggle');
                        window.location.reload();


                    })
                    .catch(function (error) {
                        if (error.response.status == 422) {
                            $('#formAddSyaratKetentuan').addClass('was-validated');
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
                                    $('#formAddSyaratKetentuan').waitMe('hide');
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
                                $('#formAddSyaratKetentuan').waitMe('hide');
                                $('#addSyaratKetentuanModal').modal('toggle');

                                window.location.reload();

                            })
                        }
                    });
                $('#formAddSyaratKetentuan').waitMe('hide');
                $("#simpan_syarat").html('Upload');
                $("#simpan_syarat").removeClass('disabled');
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                swalWithBootstrapButtons.fire({
                    title: 'Batal',
                    text: 'Simpan data dibatalkan',
                    icon: 'error',
                    confirmButtonText: '<i class="fas fa-check"></i> Oke',
                    showCancelButton: false,
                })
                $('#formAddSyaratKetentuan').waitMe('hide');
                $("#simpan_syarat").html('Upload');
                $("#simpan_syarat").removeClass('disabled');
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
                axios.post("{{ route('hapus-syarat') }}", postData)
                    .then(function (r) {
                        swalWithBootstrapButtons.fire(
                            'Terhapus',
                            'Data berhasil dihapus.',
                            'success'
                        )
                        $('#listSyarat').DataTable().ajax.reload();
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
        $('#editSyaratModal').modal('show');
        getDetailData(id);
    });

    function getDetailData(id) {
        postData = {
            'id': id
        };
        loading($('#editSyaratModal'));
        axios.post("{{ route('detail-syarat') }}", postData)
            .then(function (res) {
                $('#editSyaratModal').waitMe('hide');
                let data = res.data[0];
                $('#id_syarat_ketentuan').val(data.id_syarat_ketentuan);
                tinymce.activeEditor.selection.setContent(data.syarat_ketentuan);

            })
    }

    $(document).on('submit', '#formEditSyarat', function (e) {
        e.preventDefault();
        var form = $(this)[0];
        var postData = new FormData(form);
        $("#edit_syarat").html(
            '<i class="spinner-grow spinner-grow-sm mr-2" role="status" aria-hidden="true"></i> DIPROSES...'
        );
        $("#edit_syarat").addClass('disabled');
        loading($('#formEditSyarat'));
        swalWithBootstrapButtons.fire({
            title: 'Konfirmasi',
            text: 'Apakah anda ingin mengubah data ini ?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, simpan!',
            cancelButtonText: 'Tidak, batalkan!',
        }).then((result) => {
            if (result.isConfirmed) {
                axios.post("{{ route('edit-syarat') }}", postData)
                    .then(function (response) {
                        console.log('then', response);
                        swalWithBootstrapButtons.fire({
                            title: 'Berhasil',
                            text: 'Data berhasil diubah.',
                            icon: 'success',
                            confirmButtonText: '<i class="fas fa-check"></i> Oke',
                            showCancelButton: false,
                        });
                        window.location.reload();
                        $('#formEditSyarat').waitMe('hide');
                        $('#editSyaratModal').modal('toggle');
                    })
                    .catch(function (error) {
                        if (error.response.status == 422) {
                            $('#formEditSyarat').addClass('was-validated');
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
                                    $('#formEditSyarat').waitMe('hide');
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
                                $('#formEditSyarat').waitMe('hide');
                                $('#addSyaratKetentuanModal').modal('toggle');

                                window.location.reload();

                            })
                        }
                    });
                $('#formEditSyarat').waitMe('hide');
                $("#edit_syarat").html('Edit Data');
                $("#edit_syarat").removeClass('disabled');
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                swalWithBootstrapButtons.fire({
                    title: 'Batal',
                    text: 'Simpan data dibatalkan',
                    icon: 'error',
                    confirmButtonText: '<i class="fas fa-check"></i> Oke',
                    showCancelButton: false,
                })
                $('#formEditSyarat').waitMe('hide');
                $("#edit_syarat").html('Edit Data');
                $("#edit_syarat").removeClass('disabled');
                window.location.reload();

            }
        })
    });

</script>
