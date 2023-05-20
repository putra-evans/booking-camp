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
     selector: 'textarea#input_tertib',
     plugins: 'code table lists',
     toolbar: 'undo redo | formatselect| bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
   });


    $(document).ready(function () {
        getData();
    });

    function getData() {
        'use strict';
        var listTataTertib = $("#listTataTertib").DataTable({
            dom: 'Bfrtip',
            responsive: false,
            scrollX: true,
            autoWidth: false,
            bDestroy: true,
            ajax: "{{ route('tata_tertib') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    className: 'text-center'
                },
                {
                    data: 'tata_tertib',
                    name: 'tata_tertib'
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
        $('form#formAddTertib').trigger('reset');
        $('form#formAddTertib').removeClass('was-validated');
    }
    function reset_edit() {
        $('#errEntry').html('');
        $('#errSuccess').html('');
        $('form#formEditTertib').trigger('reset');
        $('form#formEditTertib').removeClass('was-validated');
    }


    $(document).on('click', '#addTertib', function (e) {
        reset();
        e.preventDefault();
        $('#addTertibModal').modal('show');
    });

    $(document).on('submit', '#formAddTertib', function (e) {
        e.preventDefault();
        var form = $(this)[0];
        var postData = new FormData(form);
        $("#simpan_tertib").html(
            '<i class="spinner-grow spinner-grow-sm mr-2" role="status" aria-hidden="true"></i> DIPROSES...'
        );
        $("#simpan_tertib").addClass('disabled');
        loading($('#formAddTertib'));
        swalWithBootstrapButtons.fire({
            title: 'Konfirmasi',
            text: 'Apakah anda ingin menyimpan data ini ?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, simpan!',
            cancelButtonText: 'Tidak, batalkan!',
        }).then((result) => {
            if (result.isConfirmed) {
                axios.post("{{ route('tambah-tertib') }}", postData)
                    .then(function (response) {
                        console.log('then', response);
                        swalWithBootstrapButtons.fire({
                            title: 'Berhasil',
                            text: 'Data berhasil ditambahkan.',
                            icon: 'success',
                            confirmButtonText: '<i class="fas fa-check"></i> Oke',
                            showCancelButton: false,
                        });
                        $('#formAddTertib').waitMe('hide');
                        $('#addTertibModal').modal('toggle');
                        window.location.reload();

                    })
                    .catch(function (error) {
                        if (error.response.status == 422) {
                            $('#formAddTertib').addClass('was-validated');
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
                                    $('#formAddTertib').waitMe('hide');
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
                                $('#formAddTertib').waitMe('hide');
                                $('#addTertibModal').modal('toggle');
                                window.location.reload();
                            })
                        }
                    });
                $('#formAddTertib').waitMe('hide');
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
                $('#formAddTertib').waitMe('hide');
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
                axios.post("{{ route('hapus-tertib') }}", postData)
                .then(function (r) {
                    swalWithBootstrapButtons.fire(
                        'Terhapus',
                        'Data berhasil dihapus.',
                        'success'
                        )
                        $('#listTataTertib').DataTable().ajax.reload();
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
        $('#editTertibModal').modal('show');
        getDetailData(id);
    });

    function getDetailData(id) {
        postData = {
            'id': id
        };
        loading($('#editTertibModal'));
        axios.post("{{ route('detail-tertib') }}", postData)
            .then(function (res) {
                $('#editTertibModal').waitMe('hide');
                let data = res.data[0];
                $('#id_tata_tertib').val(data.id_tata_tertib);
                tinymce.activeEditor.selection.setContent(data.tata_tertib);


            })
    }

    $(document).on('submit', '#formEditTertib', function (e) {
        e.preventDefault();
        var form = $(this)[0];
        var postData = new FormData(form);
        $("#edit_tertib").html(
            '<i class="spinner-grow spinner-grow-sm mr-2" role="status" aria-hidden="true"></i> DIPROSES...'
        );
        $("#edit_tertib").addClass('disabled');
        loading($('#formEditTertib'));
        swalWithBootstrapButtons.fire({
            title: 'Konfirmasi',
            text: 'Apakah anda ingin mengubah data ini ?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, simpan!',
            cancelButtonText: 'Tidak, batalkan!',
        }).then((result) => {
            if (result.isConfirmed) {
                axios.post("{{ route('edit-tertib') }}", postData)
                    .then(function (response) {
                        console.log('then', response);
                        swalWithBootstrapButtons.fire({
                            title: 'Berhasil',
                            text: 'Data berhasil diubah.',
                            icon: 'success',
                            confirmButtonText: '<i class="fas fa-check"></i> Oke',
                            showCancelButton: false,
                        });
                        $('#formEditTertib').waitMe('hide');
                        $('#editTertibModal').modal('toggle');
                    window.location.reload();


                    })
                    .catch(function (error) {
                        if (error.response.status == 422) {
                            $('#formEditTertib').addClass('was-validated');
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
                                    $('#formEditTertib').waitMe('hide');
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
                                $('#formEditTertib').waitMe('hide');
                                $('#editTertibModal').modal('toggle');
                                window.location.reload();
                            })
                        }
                    });
                $('#formEditTertib').waitMe('hide');
                $("#edit_tertib").html('Edit Data');
                $("#edit_tertib").removeClass('disabled');
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                swalWithBootstrapButtons.fire({
                    title: 'Batal',
                    text: 'Simpan data dibatalkan',
                    icon: 'error',
                    confirmButtonText: '<i class="fas fa-check"></i> Oke',
                    showCancelButton: false,
                })
                $('#formEditTertib').waitMe('hide');
                $("#edit_tertib").html('Edit Data');
                $("#edit_tertib").removeClass('disabled');
                window.location.reload();

            }
        })
    });



</script>
