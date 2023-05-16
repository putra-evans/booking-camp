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
        var listPesanan = $("#listPesanan").DataTable({
            dom: 'Bfrtip',
            responsive: false,
            scrollX: true,
            autoWidth: false,
            ajax: "{{ route('user-pesanan') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    className: 'text-center'
                },
                {
                    data: 'no_booking',
                    name: 'no_booking'
                },
                {
                    data: 'lama_inap',
                    name: 'lama_inap',
                    className: 'text-center'

                },
                {
                    data: 'total_biaya',
                    name: 'total_biaya',
                    className: 'text-center'

                },
                {
                    data: 'file_pembayaran',
                    name: 'file_pembayaran',
                    className: 'text-center'
                },
                {
                    data: 'status_pesanan',
                    name: 'status_pesanan',
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
        let id = $(this).data('id');
        let no_booking = $(this).data('no_booking');
        $('#detailBooking').modal('show');
        getDetailBooking(id);
        getDataBooking(no_booking);
    });


    function getDataBooking(no_booking) {
        postData = {
            'no_booking': no_booking
        };
        $('#tbody_booking').empty();
        loading($('#tbl_list_booking'));
        axios.post("{{ route('list_booking') }}", postData)
            .then(function (res) {
                console.log(res);
                list_booking(res.data)
                $('#tbl_list_booking').waitMe('hide');
            })
    }

    function list_booking(data) {
        if (data === undefined || data.length == 0) {
            $('#tbody_booking').append("<tr>\
                        			<td colspan='7' class='text-center'>Belum ada data</td>\
                        			</tr>");

        } else {
            var rows = '';
            var i = 0;
            $.each(data, function (key, value) {
                console.log
                $('#tbody_booking').append("<tr>\
                        			<td class='text-center'>" + ++i + "</td>\
                        			<td class='text-center'><button type='button' style='width: 80px !important;margin:5px' class='btn btn-twitter waves-effect waves-light'>" + value.kode_kavling + "</button></td>\
                                    <td class='text-center'>"+value.lama_menginap+" Malam</td>\
                        			<td class='text-center'>Rp. " + numberWithCommas(value.total_biaya) + "</td>\
                        			<td class='text-center'>" + tgl_indo(value.tanggal_booking)  + "</td>\
                        			</tr>");
            });
        }
    }



    function getDetailBooking(id) {
        postData = {
            'id': id
        };
        loading($('#detailBooking'));
        axios.post("{{ route('get_detail_pesanan') }}", postData)
            .then(function (res) {
                $('#detailBooking').waitMe('hide');
                let data = res.data[0];
                let status = '';
                if (data.status_final == 0) {
                    status = '<button type="button" class="btn rounded-pill btn-outline-youtube waves-effect btn-xs"> <i class="tf-icons mdi mdi-close-circle me-1"></i>Belum Bayar</button>';
                } else if (data.status_final == 1) {
                    status = '<button type="button" class="btn btn-outline-twitter waves-effect btn-xs"> <i class="tf-icons mdi mdi-check-decagram me-1">Pembayaran Diproses</i></button>';
                } else if(data.status_final == 2){
                    status = '<button type="button" class="btn btn-outline-whatsapp waves-effect btn-xs"> <i class="tf-icons mdi mdi-check-decagram me-1">Pembayaran Diterima</i></button>';
                }
                $('#nama_lengkap').html(data.name);
                $('#email').html(data.email);
                $('#no_telp').html(data.no_telp);
                $('#no_booking').html(data.no_booking);
                $('#total_menginap').html(data.total_menginap + ' Malam');
                $('#final_biaya').html(numberWithCommas('Rp. ' + data.final_biaya));
                $('#status_final').html(status);
            })
    }


    $(document).on('click', '#BtnUploadPembayaran', function (e) {
        e.stopPropagation();
        reset();
        let id = $(this).data('id');
        let no_booking = $(this).data('no_booking');
        $('#id_final_booking').val(id);
        $('#no_booking_final').val(no_booking);
        $('#uploadPembayaran').modal('show');
    });


    function reset() {
        $('#errEntry').html('');
        $('#errSuccess').html('');
        $('form#formUpload').trigger('reset');
        $('form#formUpload').removeClass('was-validated');
    }



    $(document).on('submit', '#formUpload', function (e) {
        e.preventDefault();
        var form = $(this)[0];
        var postData = new FormData(form);
        $("#upload_pembayaran").html(
            '<i class="spinner-grow spinner-grow-sm mr-2" role="status" aria-hidden="true"></i> DIPROSES...'
        );
        $("#upload_pembayaran").addClass('disabled');
        loading($('#formUpload'));
        swalWithBootstrapButtons.fire({
            title: 'Konfirmasi',
            text: 'Apakah anda ingin menyimpan data ini ?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, simpan!',
            cancelButtonText: 'Tidak, batalkan!',
        }).then((result) => {
            if (result.isConfirmed) {
                axios.post("{{ route('upload_pembayaran') }}", postData)
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
                        $('#formUpload').waitMe('hide');
                        $('#uploadPembayaran').modal('toggle');

                    })
                    .catch(function (error) {
                        if (error.response.status == 422) {
                            $('#formUpload').addClass('was-validated');
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
                                    $('#formUpload').waitMe('hide');
                                }
                            })
                        }
                    });
                $('#formUpload').waitMe('hide');
                $("#upload_pembayaran").html('Upload');
                $("#upload_pembayaran").removeClass('disabled');
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                swalWithBootstrapButtons.fire({
                    title: 'Batal',
                    text: 'Simpan data dibatalkan',
                    icon: 'error',
                    confirmButtonText: '<i class="fas fa-check"></i> Oke',
                    showCancelButton: false,
                })
                $('#formUpload').waitMe('hide');
                $("#upload_pembayaran").html('Upload');
                $("#upload_pembayaran").removeClass('disabled');
            }
        })
    });

    // OPEN IMG
    $(document).on('click', '#lihat_bukti', function (e) {
        e.preventDefault();
        let img = $(this).data('img');
        $('#imgku').attr('src', img);
    });


    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }
    function tgl_indo(date) {
        var hasil = date.split("-");
        var tanggal =hasil[2];
        var bulan =hasil[1];
        var tahun =hasil[0];
        switch (bulan) {
            case '01':
                bulan = "Januari";
                break;
            case '02':
                bulan = "Februari";
                break;
            case '03':
                bulan = "Maret";
                break;
            case '04':
                bulan = "April";
                break;
            case '05':
                bulan = "Mei";
                break;
            case '06':
                bulan = "Juni";
                break;
            case '07':
                bulan = "Juli";
                break;
            case '08':
                bulan = "Agustus";
                break;
            case '09':
                bulan = "September";
                break;
            case '10':
                bulan = "Oktober";
                break;
            case '11':
                bulan = "November";
                break;
            case '12':
                bulan = "Desember";
                break;
        }
        var tampilTanggal =  tanggal + " " + bulan + " " + tahun;
        return tampilTanggal;
    }

</script>
