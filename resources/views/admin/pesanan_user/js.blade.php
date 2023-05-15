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
        calender();
        getDataDraftBooking();
    });

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
        loading($('.loading-kalender'));
        swalWithBootstrapButtons.fire({
            title: 'Konfirmasi',
            text: 'Apakah anda ingin booking kavling data ini ?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, Booking!',
            cancelButtonText: 'Tidak, batalkan!',
        }).then((result) => {
            if (result.isConfirmed) {
                axios.post("{{ route('booking_kavling') }}", postData)
                    .then(function (response) {


                        swalWithBootstrapButtons.fire({
                            title: 'Berhasil',
                            text: 'Berhasil booking kavling.',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        setTimeout(() => {
                    window.location.reload();
                    }, "2000");
                        getDataDraftBooking();
                        $('.loading-kalender').waitMe('hide');
                    })
                    .catch(function (error) {

                        if (error.response.status == 422) {
                            $('.loading-kalender').addClass('was-validated');
                            swalWithBootstrapButtons.fire({
                                title: 'Batal',
                                text: 'Booking dibatalkan',
                                icon: 'error',
                                showConfirmButton: false,
                                timer: 1500
                            }).then((result) => {
                                if (result.value) {
                                    $.each(error.response.data, function (key, value) {
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
                                    $('.loading-kalender').waitMe('hide');
                                }
                            })
                        } else if(error.response.status == 403){
                            swalWithBootstrapButtons.fire({
                            title: 'Batal',
                            text: 'Akun anda tidak aktif',
                            icon: 'error',
                            showConfirmButton: false,
                            timer: 1500
                })
                        }
                    });
                $('.loading-kalender').waitMe('hide');
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                swalWithBootstrapButtons.fire({
                    title: 'Batal',
                    text: 'Booking dibatalkan',
                    icon: 'error',
                    showConfirmButton: false,
                    timer: 1500
                })
                $('.loading-kalender').waitMe('hide');
            }
        })
    });

    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    function draft_booking(data) {
        if (data === undefined || data.length == 0) {
            $('#tbody_organisasi').append("<tr>\
                        			<td colspan='7' class='text-center'>Belum ada data</td>\
                        			</tr>");
            $(".btnBookingSekarang").prop("disabled",true);

        } else {
            var rows = '';
            var i = 0;
            $.each(data, function (key, value) {
                console.log
                $('#tbody_organisasi').append("<tr>\
                        			<td class='text-center'>" + ++i + "</td>\
                        			<td><button type='button' style='width: 80px !important;margin:5px' class='btn btn-twitter waves-effect waves-light'>" + value.kode_kavling + "</button></td>\
                                    <td class='text-center'>"+value.lama_menginap+" Malam</td>\
                        			<td class='text-center'>Rp. " + numberWithCommas(value.total_biaya) + "</td>\
                        			<td>" + tgl_indo(value.tanggal_booking)  + "</td>\
                        			<td class='text-center'><button type='button' title='Hapus data' data-id='" + value.id_booking + "' class='btn btn-icon btn-danger waves-effect waves-light' id='BtnHapus'><span class='fa-regular fa-trash-can'></span></button>&nbsp;</td>\
                        			<td class='text-center'><div class='custom-control custom-checkbox mt-0 pt-0'><input style='color: 'red' !important' type='checkbox' class='custom-control-input' name='checkid[]' id='"+value.id_booking+"' value='"+value.id_booking+"'><label class='custom-control-label font-weight-bolder' for='"+value.id_booking+"'></label></div></td>\
                        			</tr>");
            });
        }
    }

    function getDataDraftBooking() {
        $('#tbody_organisasi').empty();
        loading($('#tbl_draft'));
        axios.get("{{ route('draft_booking') }}")
            .then(function (res) {
                draft_booking(res.data)
                $('#tbl_draft').waitMe('hide');
            })
    }

    $(document).on('click', '#draft_booking', function (e) {
        e.preventDefault();
        getDataDraftBooking();
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
                axios.post("{{ route('destroy_booking') }}", postData).then(function (r) {
                    swalWithBootstrapButtons.fire({
                            title: 'Berhasil',
                            text: 'Berhasil terhapus.',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    getDataDraftBooking();
                    setTimeout(() => {
                    window.location.reload();
                    }, "2000");

                });
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire({
                            title: 'Dibatalkan',
                            text: 'Batal booking kavling.',
                            icon: 'error',
                            showConfirmButton: false,
                            timer: 1000
                        });
            }
        })
    });


    $(document).on('click', '.btnBookingSekarang', function(e) {
        e.preventDefault();
        $('#tbl_draft > tbody input[type=checkbox]').prop('checked', true).trigger('change');
        let token = [];
        $.each($('#tbl_draft > tbody input[type=checkbox]:checked'), function() {
            token.push($(this).val());
        });
        const postData = {
            'id_booking': token,
        };
        swalWithBootstrapButtons.fire({
            title: 'Apakah anda yakin?',
            text: "Semua Draft Booking akan diproses!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, Booking Sekarang!',
            cancelButtonText: 'Tidak, batal!',
        }).then((result) => {
            if (result.isConfirmed) {
                axios.post("{{ route('proses_booking') }}", postData).then(function (r) {
                    swalWithBootstrapButtons.fire(
                        'Dibooking',
                        'Silahkan lakukan upload bukti pembayaran pada menu Pesanan.',
                        'success'
                    )
                    getDataDraftBooking();
                });
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire({
                            title: 'Dibatalkan',
                            text: 'Batal booking kavling.',
                            icon: 'error',
                            showConfirmButton: false,
                            timer: 1000
                        });
            }
        })

    });

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
