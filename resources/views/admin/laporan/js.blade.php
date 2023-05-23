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

    $(document).ready(function () {});

    // ------------------------------------------------------------------------------------------------Belum Bayar
    // $(document).on('submit', '#formCetakLaporan', function (e) {
    //     e.preventDefault();
    //     var form = $(this)[0];
    //     var postData = new FormData(form);
    //     axios.post("{{ route('cetak_laporan') }}", postData)
    //         .then(function (response) {
    //             console.log('then', response);
    //             swalWithBootstrapButtons.fire({
    //                 title: 'Berhasil',
    //                 text: 'Data berhasil diubah.',
    //                 icon: 'success',
    //                 confirmButtonText: '<i class="fas fa-check"></i> Oke',
    //                 showCancelButton: false,
    //             });
    //         })
    //         .catch(function (error) {
    //             if (error.response.status == 422) {
    //                 $('#formCetakLaporan').addClass('was-validated');
    //                 swalWithBootstrapButtons.fire({
    //                     title: 'Batal',
    //                     text: 'Periksa kembali form inputan anda, jangan sampai ada data kosong',
    //                     icon: 'error',
    //                     confirmButtonText: '<i class="fas fa-check"></i> Oke',
    //                     showCancelButton: false,
    //                 }).then((result) => {
    //                     if (result.value) {
    //                         $.each(error.response.data, function (key, value) {
    //                             console.log(value[0]);
    //                             if (key != 'isi') {
    //                                 $('input[name="' + key +
    //                                     '"], textarea[name="' + key +
    //                                     '"], select[name="' + key + '"]'
    //                                 ).closest('div.required').find(
    //                                     'div.invalid-feedback').text(
    //                                     value[0]);
    //                             } else {
    //                                 $('#pesanErr').html(value);
    //                             }
    //                         });
    //                         $('#formCetakLaporan').waitMe('hide');
    //                     }
    //                 })
    //             }
    //         });
    // });

</script>
