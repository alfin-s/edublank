<!DOCTYPE html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <title>wmk - ulm</title>
        <meta name="robots" content="noindex, follow" />
        <meta name="description" content="" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Place favicon.png in the root directory -->
        <link
            rel="shortcut icon"
            href="{{asset ('user/img/favicon.png') }}"
            type="image/x-icon"
        />
        <!-- Font Icons css -->
        <link rel="stylesheet" href="{{asset ('user/css/font-icons.css') }}" />
        <!-- plugins css -->
        <link rel="stylesheet" href="{{asset ('user/css/plugins.css') }}" />
        <!-- Main Stylesheet -->
        <link rel="stylesheet" href="{{asset ('user/css/style.css') }}" />
        <!-- Responsive css -->
        <link rel="stylesheet" href="{{asset ('user/css/responsive.css') }}" />
    </head>

    <body>
        <!--[if lte IE 9]>
            <p class="browserupgrade">
                You are using an <strong>outdated</strong> browser. Please
                <a href="https://browsehappy.com/">upgrade your browser</a> to
                improve your experience and security.
            </p>
        <![endif]-->

        <!-- Add your site or application content here -->

        <!-- Body main wrapper start -->
        <div class="body-wrapper">
            <!-- 404 area start -->
            <div class="ltn__coming-soon-area ltn__primary-bg text-color-white">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="coming-soon-inner">
                                <div
                                    class="section-title-area ltn__section-title-2"
                                >
                                    <h6
                                        class="section-subtitle ltn__secondary-color"
                                    >
                                        Mohon Maaf
                                    </h6>
                                    <h1 class="section-title white-color">
                                        Lokasi Kami Belum Tersedia
                                    </h1>
                                    <h5
                                        class="ltn__secondary-color"
                                        id="tanggal"
                                    ></h5>
                                </div>

                                <div class="ltn__newsletter-inner mt-50">
                                    <h3 class="ltn__clock">
                                    </h3>
                                </div>
                                <div class="btn-wrapper mt-50">
                                    <a href="/"
                                        class="theme-btn-1 btn btn-block"
                                    >
                                        Kembali
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 404 area end -->
        </div>

        <script>
            // Mengambil tanggal terkini
            var tanggalSekarang = new Date();

            // Mendapatkan informasi tanggal, bulan, dan tahun
            var tanggal = tanggalSekarang.getDate();
            var bulan = tanggalSekarang.getMonth() + 1; // Ingat, bulan dimulai dari 0
            var tahun = tanggalSekarang.getFullYear();

            // Format tanggal dengan menambahkan 0 di depan jika nilainya kurang dari 10
            if (tanggal < 10) {
                tanggal = "0" + tanggal;
            }

            if (bulan < 10) {
                bulan = "0" + bulan;
            }

            // Menampilkan tanggal terkini pada elemen dengan id "tanggal"
            document.getElementById("tanggal").innerHTML =
                tanggal + "/" + bulan + "/" + tahun;
        </script>

        <script>
            function updateClock() {
                // Mendapatkan tanggal saat ini
                var currentDate = new Date();

                // Menambahkan 14 hari ke tanggal saat ini
                currentDate.setDate(currentDate.getDate() + 14);

                // Mendapatkan detik, menit, dan jam yang sudah diubah
                var seconds = currentDate.getSeconds();
                var minutes = currentDate.getMinutes();
                var hours = currentDate.getHours();

                // Menambahkan nol di depan jika nilainya kurang dari 10
                seconds = seconds < 10 ? "0" + seconds : seconds;
                minutes = minutes < 10 ? "0" + minutes : minutes;
                hours = hours < 10 ? "0" + hours : hours;

                // Menampilkan hasil pada elemen dengan class "ltn__clock"
                var clockElement = document.querySelector(".ltn__clock");
                clockElement.innerHTML = hours + ":" + minutes + ":" + seconds;
            }

            // Memanggil fungsi updateClock setiap detik
            setInterval(updateClock, 1000);

            // Memanggil fungsi untuk menampilkan hasil secara langsung
            updateClock();
        </script>

        <!-- Body main wrapper end -->

        <!-- All JS Plugins -->
        <script src="{{asset ('user/js/plugins.js') }}"></script>
        <!-- Main JS -->
        <script src="{{asset ('user/js/main.js') }}"></script>
    </body>
</html>
