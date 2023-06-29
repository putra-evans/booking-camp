<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Camp-Ground Danau Talang</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    {{-- <link href="{{asset('assets_front/img/favicon.png')}}" rel="icon">
    <link href="{{asset('assets_front/img/apple-touch-icon.png')}}" rel="apple-touch-icon"> --}}
    <link rel="icon" type="image/x-icon"
        href="https://demos.pixinvent.com/materialize-html-admin-template/assets/img/favicon/favicon.ico" />


    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('assets_front/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('assets_front/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets_front/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('assets_front/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets_front/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets_front/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('assets_front/css/style.css')}}" rel="stylesheet">
</head>

<body>
    <header id="header" class="fixed-top header-transparent">
        <div class="container d-flex align-items-center justify-content-between position-relative">

            <div class="logo">
                <h1 class="text-light"><a href="index.html"><span>Camp-Ground</span></a></h1>
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#tata-tertib">Tata Tertib</a></li>
                    <li><a class="nav-link scrollto" href="#syarat">Syarat&Ketentuan</a></li>
                    <li><a class="nav-link scrollto" href="#cara-pesan">Cara Pemesanan</a></li>
                    <li><a class="nav-link scrollto" href="#team">Galeri</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('login') }}">Login</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>

        </div>
    </header>
    <section id="hero">
        <div class="hero-container" data-aos="fade-up">
            <h1>Selamat Datang</h1>
            <h2>Website Camp-Ground Danau Talang</h2>
            <a href="#tata-tertib" class="btn-get-started scrollto"><i class="bx bx-chevrons-down"></i></a>
        </div>
    </section>

    <main id="main">
        <section id="tata-tertib" class="about">
            <div class="container">
                <h2>Tata Tertib</h2>
                <div class="row no-gutters">
                    @if ($tata_tertib->isEmpty())
                    <span>Tidak ada data</span>
                    @else
                    {!!$tata_tertib[0]->tata_tertib!!}
                    @endif
                </div>

            </div>
        </section>
        <section id="syarat" class="about">
            <div class="container">
                <h2>Syarat & Ketentuan</h2>
                <div class="row no-gutters">
                    @if ($syarat->isEmpty())
                    <span>Tidak ada data</span>
                    @else
                    {!!$syarat[0]->syarat_ketentuan!!}
                    @endif
                </div>
            </div>
        </section>
        <section id="cara-pesan" class="about">
            <div class="container">
                <h2>Tata Cara Pemesanan</h2>
                <div class="row no-gutters">
                    @if ($cara_booking->isEmpty())
                    <span>Tidak ada data</span>
                    @else
                    {!!$cara_booking[0]->cara_booking!!}
                    @endif
                </div>
            </div>
        </section>
        <section id="team" class="team">
            <div class="container">

                <div class="section-title" data-aos="fade-in" data-aos-delay="100">
                    <h2>Galeri</h2>
                    <p>Berikut ini merupakan kumpulan dari foto-foto yang ada dan di ambil dari Camp-Ground Danau
                        Talang, foto-foto ini merupakan keindahan alam yang disediakan oleh Camp-Ground, tunggu apa
                        lagi! .</p>
                </div>

                <div class="row">

                    @foreach ( $galeri as $pecah )


                    <div class="col-lg-4 col-md-6">
                        <div class="member" data-aos="fade-up">
                            <div class="pic"><img src="{{url('/foto_galeri/' . $pecah->file_galeri)}}" class="img-fluid"
                                    alt=""></div>
                            <div class="member-info">
                                <h4>{{$pecah->judul_galeri}}</h4>
                                <span>{{$pecah->tentang_galeri}}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <section id="contact" class="contact section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Hubungi Kami</h2>
                    <p>Melalui website ini, anda dapat melakukan registrasi secara online untuk mendapatkan username dan
                        password untuk login dan melakukan pemesanan booking melalui online, dan apabila ada pertanyaan
                        dapat melalui kontak dibawah ini</p>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="info-box mb-4">
                            <i class="bx bx-map"></i>
                            <h3>Alamat Lengkap:</h3>
                            <p>Kp. Batu Dalam, Kec. Danau Kembar, Kabupaten Solok, Sumatera Barat 27383</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="info-box  mb-4">
                            <i class="bx bx-envelope"></i>
                            <h3>Email</h3>
                            <p>camp_ground_danau_talang@gmail.com</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="info-box  mb-4">
                            <i class="bx bx-phone-call"></i>
                            <h3>Telp</h3>
                            <p>0812-1221-2332</p>
                        </div>
                    </div>

                </div>

                <div class="row">

                    <div class="col-lg-12 ">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15956.781385885033!2d100.7092895!3d-1.0125154!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e2b4d9932790299%3A0xa80fbb893dc07480!2sArea%20Camping%20Ground%20Danau%20Talang!5e0!3m2!1sid!2sid!4v1688053121853!5m2!1sid!2sid"
                            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer id="footer">
        <div class="container">
            <div class="copyright">
                &copy; Copyright All Rights Reserved
            </div>
            <div class="credits">
            </div>
        </div>
    </footer>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <script src="{{asset('assets_front/vendor/purecounter/purecounter_vanilla.js')}}"></script>
    <script src="{{asset('assets_front/vendor/aos/aos.js')}}"></script>
    <script src="{{asset('assets_front/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets_front/vendor/glightbox/js/glightbox.min.js')}}"></script>
    <script src="{{asset('assets_front/vendor/isotope-layout/isotope.pkgd.min.j')}}s"></script>
    <script src="{{asset('assets_front/vendor/swiper/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('assets_front/vendor/php-email-form/validate.js')}}"></script>
    <script src="{{asset('assets_front/js/main.js')}}"></script>

</body>

</html>
