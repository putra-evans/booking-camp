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

    $(document).ready(function () {
        getDataBelumBayar();
    });

    // ------------------------------------------------------------------------------------------------Belum Bayar
    $(document).on('click', '#btnBelumBayar', function (e) {
        getDataBelumBayar();
    });

    function getDataBelumBayar() {
        'use strict';
        var list_belum_bayar = $("#list_belum_bayar").DataTable({
            dom: 'Bfrtip',
            responsive: false,
            scrollX: true,
            autoWidth: false,
            bDestroy: true,
            ajax: "{{ route('list-pesanan-user') }}",
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
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'lama_inap',
                    name: 'lama_inap',
                    className: 'text-center'

                },
                {
                    data: 'tgl_dibuat',
                    name: 'tgl_dibuat',
                    className: 'text-center'

                },
                {
                    data: 'total_biaya',
                    name: 'total_biaya',
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

    // batalkan pesanan
    $(document).on('click', '#BtnBatalkan', function (e) {
        e.preventDefault();
        let id = $(this).data('id');
        let no_booking = $(this).data('no_booking');
        postData = {
            'id': id,
            'no_booking': no_booking,
        };
        loading($('#list_belum_bayar'));
        swalWithBootstrapButtons.fire({
            title: 'Konfirmasi',
            text: 'Apakah anda ingin membatalkan data ini ?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, simpan!',
            cancelButtonText: 'Tidak, batalkan!',
        }).then((result) => {
            if (result.isConfirmed) {
                axios.post("{{ route('batalkan-pesanan') }}", postData)
                    .then(function (response) {
                        console.log('then', response);
                        swalWithBootstrapButtons.fire({
                            title: 'Berhasil',
                            text: 'Data berhasil ditambahkan.',
                            icon: 'success',
                            confirmButtonText: '<i class="fas fa-check"></i> Oke',
                            showCancelButton: false,
                        });
                        getDataBelumBayar();
                        $('#list_belum_bayar').waitMe('hide');
                    });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                swalWithBootstrapButtons.fire({
                    title: 'Batal',
                    text: 'Aksi dibatalkan',
                    icon: 'error',
                    confirmButtonText: '<i class="fas fa-check"></i> Oke',
                    showCancelButton: false,
                })
                $('#list_belum_bayar').waitMe('hide');
            }
        })
    });




    // ------------------------------------------------------------------------------------------------Diproses

    $(document).on('click', '#btnDiproses', function (e) {
        getDataDiproses();
    });

    function getDataDiproses() {
        'use strict';
        var list_diproses = $("#list_diproses").DataTable({
            dom: 'Bfrtip',
            responsive: false,
            scrollX: true,
            autoWidth: false,
            bDestroy: true,
            ajax: "{{ route('list-pesanan-diproses') }}",
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
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'lama_inap',
                    name: 'lama_inap',
                    className: 'text-center'

                },
                {
                    data: 'tgl_dibuat',
                    name: 'tgl_dibuat',
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
    // proses bukti pembayaran pesanan
    $(document).on('click', '#BtnProsesPembayaran', function (e) {
        e.preventDefault();
        let id = $(this).data('id');
        let no_booking = $(this).data('no_booking');
        // loading($('#list_diproses'));
        Swal.fire({
            title: 'Validasi Pembayaran',
            input: 'select',
            inputOptions: {
                '2': 'Pembayaran Diterima',
                '3': 'Pembayaran Ditolak',
            },
            inputPlaceholder: 'Silahkan pilih',
            showCancelButton: true,
            inputValidator: (value) => {
                return new Promise((resolve) => {
                    if (value != '') {
                        postData = {
                            'id': id,
                            'no_booking': no_booking,
                            'status': value,
                        };
                        axios.post("{{ route('proses_pembayaran') }}", postData)
                            .then(function (response) {
                                console.log('then', response);
                                swalWithBootstrapButtons.fire({
                                    title: 'Berhasil',
                                    text: 'Data berhasil ditambahkan.',
                                    icon: 'success',
                                    confirmButtonText: '<i class="fas fa-check"></i> Oke',
                                    showCancelButton: false,
                                });
                                getDataDiproses();
                            });
                    } else {
                        resolve('Silahkan pilih, jangan sampai kosong')
                    }
                })
            }
        })
    });

    // ------------------------------------------------------------------------------------------------Diterima

    $(document).on('click', '#btnDiterima', function (e) {
        getDataDiterima();
    });

    function getDataDiterima() {
        'use strict';
        var list_diterima = $("#list_diterima").DataTable({
            dom: 'Bfrtip',
            responsive: false,
            scrollX: true,
            autoWidth: false,
            bDestroy: true,
            ajax: "{{ route('list-pesanan-diterima') }}",
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
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'lama_inap',
                    name: 'lama_inap',
                    className: 'text-center'

                },
                {
                    data: 'tgl_dibuat',
                    name: 'tgl_dibuat',
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


    // ------------------------------------------------------------------------------------------------Ditolak

    $(document).on('click', '#btnDibatalkan', function (e) {
        getDataDibatalkan();
    });

    function getDataDibatalkan() {
        'use strict';
        var list_dibatalkan = $("#list_dibatalkan").DataTable({
            dom: 'Bfrtip',
            responsive: false,
            scrollX: true,
            autoWidth: false,
            bDestroy: true,
            ajax: "{{ route('list-pesanan-dibatalkan') }}",
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
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'lama_inap',
                    name: 'lama_inap',
                    className: 'text-center'

                },
                {
                    data: 'tgl_dibuat',
                    name: 'tgl_dibuat',
                    className: 'text-center'

                },
                {
                    data: 'total_biaya',
                    name: 'total_biaya',
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
        getDataAnggota(no_booking);
        getDataBooking(no_booking);
    });


    function getDataAnggota(no_booking) {
        postData = {
            'no_booking': no_booking
        };
        $('#tbody_anggota').empty();
        loading($('#tbl_list_anggota'));
        axios.post("{{ route('get_all_anggota') }}", postData)
            .then(function (res) {
                list_anggota(res.data)
                $('#tbl_list_anggota').waitMe('hide');
            })
    }

    function list_anggota(data) {
        if (data === undefined || data.length == 0) {
            $('#tbody_anggota').append("<tr>\
                        			<td colspan='9' class='text-center'>Belum ada data</td>\
                        			</tr>");
        } else {
            var rows = '';
            var i = 0;
            $.each(data, function (key, value) {
                console.log
                $('#tbody_anggota').append("<tr>\
                        			<td class='text-center'>" + ++i + "</td>\
                        			<td class='text-center'><button type='button' style='width: 80px !important;margin:5px' class='btn btn-twitter waves-effect waves-light'>" + value.kode_kavling + "</button></td>\
                        			<td>" + value.nama_anggota + "</td>\
                                    <td class='text-center'>" + value.umur_anggota + "</td>\
                                    <td class='text-center'>" + value.jk_anggota + "</td>\
                                    <td class='text-center'>" + value.status_anggota + "</td>\
                                    <td class='text-center'>" + value.notelp_anggota + "</td>\
                        			<td class='text-center'>" + value.alamat_lengkap_anggota + "</td>\
                        			<td class='text-center'>" + value.riwayat_penyakit_anggota + "</td>\
                        			</tr>");
            });
        }
    }




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
                        			<td class='text-center'>" + ++i +
                    "</td>\
                        			<td class='text-center'><button type='button' style='width: 80px !important;margin:5px' class='btn btn-twitter waves-effect waves-light'>" +
                    value.kode_kavling + "</button></td>\
                                    <td class='text-center'>" + value.lama_menginap + " Malam</td>\
                        			<td class='text-center'>Rp. " + numberWithCommas(value.total_biaya) + "</td>\
                        			<td class='text-center'>" + tgl_indo(value.tanggal_booking) + "</td>\
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
                    status =
                        '<button type="button" class="btn rounded-pill btn-outline-youtube waves-effect btn-xs"> <i class="tf-icons mdi mdi-close-circle me-1"></i>Belum Bayar</button>';
                } else if (data.status_final == 1) {
                    status =
                        '<button type="button" class="btn btn-outline-twitter waves-effect btn-xs"> <i class="tf-icons mdi mdi-check-decagram me-1">Pembayaran Diproses</i></button>';
                } else if (data.status_final == 2) {
                    status =
                        '<button type="button" class="btn btn-outline-whatsapp waves-effect btn-xs"> <i class="tf-icons mdi mdi-check-decagram me-1">Pembayaran Diterima</i></button>';
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

    // OPEN IMG
    $(document).on('click', '#lihat_bukti', function (e) {
        e.preventDefault();
        let img = $(this).data('img');
        $('#imgku').attr('src', img);
    });

    // -------------------------------------------------------------------------------------------LIBRARY

    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    function tgl_indo(date) {
        var hasil = date.split("-");
        var tanggal = hasil[2];
        var bulan = hasil[1];
        var tahun = hasil[0];
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
        var tampilTanggal = tanggal + " " + bulan + " " + tahun;
        return tampilTanggal;
    }

</script>
