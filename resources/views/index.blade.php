<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>SPK Siswa Terbaik</title>
    <meta content="" name="description">
    <meta content="" name="keywords">


    <link href="/beranda/gambar/logo.jpeg" rel="icon">
    <link href="/beranda/gambar/logo.jpeg" rel="apple-touch-icon">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i"
        rel="stylesheet">
    <link href="/beranda/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="/beranda/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/beranda/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/beranda/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/beranda/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/beranda/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="/beranda/assets/css/style.css" rel="stylesheet">
</head>

<body class="bg-primary">

    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutModalLabel">Konfirmasi Logout</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin keluar?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" form="logoutForm" class="btn btn-primary">Ya, Keluar</button>
                </div>
            </div>
        </div>
    </div>

    <header id="header" class="fixed-top d-flex align-items-center" style="display: flex; align-items: center;">
        <div class="container d-flex align-items-center justify-content-between">
            <div class="logo" style="display: flex; align-items: center;">
                <img src="/beranda/gambar/logo.jpeg" alt="Logo Siswa Terbaik" style="margin-right: 10px;">
                <h1 class="text-light"><a href="/"><span>Siswa Terbaik</span></a></h1>
            </div>
        </div>
    </header>



    <section id="hero" class="d-flex align-items-center">

        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    <h1 class="text-uppercase">Sistem Pendukung Keputusan</h1>
                    <h2 class="text-capitalize">pemilihan siswa terbaik pada sekolah yayasan pendidikan islam bina insan kadomas-pandeglang
                    </h2>

                    @auth
                    <div class="d-flex">
                        <a class="btn btn-get-started scrollto bg-primary mx-2" style="margin-top: 10px;" href="/dashboard">Dashboard</a>
                        <form id="logoutForm" action="/logout" method="post">
                            @csrf
                            <button type="button" class="btn btn-get-started scrollto bg-primary mx-2"
                                data-bs-toggle="modal" data-bs-target="#logoutModal" style="margin-top: 10px;">
                                <i class="fas fa-person-walking-dashed-line-arrow-right"></i> Keluar
                            </button>
                        </form>
                    </div>
                    @endauth

                    @guest
                    <div>
                        <a href="/login" class="btn-get-started scrollto bg-primary" style="margin-top: 10px;">Login</a>
                    </div>
                    @endguest

                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img">
                    <img src="/beranda/assets/img/hero-img.svg" class="img-fluid animated" alt="">
                </div>
            </div>
        </div>

    </section>


    <footer id="footer" class="fixed-bottom text-align-center">
        <div class="container mt-4">
            <div class="copyright">
                &copy; Copyright <strong><span>
                        <?= Date('Y'); ?>
                    </span></strong>. SPK Siswa Terbaik
            </div>
        </div>
    </footer>

    <script src="/beranda/assets/vendor/aos/aos.js"></script>
    <script src="/beranda/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/beranda/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="/beranda/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="/beranda/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="/beranda/assets/vendor/php-email-form/validate.js"></script>
    <script src="/beranda/assets/js/main.js"></script>

</body>

</html>
