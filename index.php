<?php
include "koneksi.php"; 
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MusNia</title>
    <link rel="icon" href="GAMBAR/Logo web.jpg">
    <link rel="stylesheet" 
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
    >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" 
        rel="stylesheet" 
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" 
        crossorigin="anonymous"
    >
  </head>
  <body>
    <!--Nav Begin-->
    <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">MusNia</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-dark">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#article">Article</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#gallery">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#jadwal">Jadwal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#profil">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php" target="_blank">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="registrasi.php" class="nav-link text-danger">Daftar akun disini</a>
                    </li>
                    <li class="nav-item">
                        <button id="blackbutton" class="bg-black h2 text-white"><i class="bi bi-moon-stars-fill"></i></button>
                    </li>
                    <li class="nav-item">
                        <button id="whitebutton" class="bg-danger h2 text-white"><i class="bi bi-brightness-high"></i></button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--Nav End-->
    <!--Hero Begin-->
    <section id="hero" class="text-center p-5 bg-danger-subtle text-sm-start" >
        <div class="container">
            <div class="d-sm-flex flex-sm-row-reverse align-items-center">
                <img src="GAMBAR/ukulele.jpg" class="img-fluid" width="300">
                <div>
                    <h1 class="fw-bold display-4">
                        MusNia
                    </h1>
                    <h4 class="lead display-6">
                        Membahas musik bersama MusNia (Music Mania). Karena musik adalah hidup.
                    </h4>
                    <h6>
                        <span id="tanggal"></span>
                        <span id="jam"></span>
                    </h6>
                </div>
            </div>
        </div>
    </section>
    <!--Hero End-->
    <!-- Article begin -->
        <section id="article" class="text-center p-5">
        <div class="container">
            <h1 class="fw-bold display-4 pb-3">Article</h1>
            <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
            <?php
            $sql = "SELECT * FROM article ORDER BY tanggal DESC";
            $hasil = $conn->query($sql); 

            while($row = $hasil->fetch_assoc()){
            ?>
                <div class="col">
                <div class="card h-100">
                    <img src="GAMBAR/<?= $row["gambar"]?>" class="card-img-top" alt="..." />
                    <div class="card-body">
                    <h5 class="card-title"><?= $row["judul"]?></h5>
                    <p class="card-text">
                        <?= $row["isi"]?>
                    </p>
                    </div>
                    <div class="card-footer">
                    <small class="text-body-secondary">
                        <?= $row["tanggal"]?>
                    </small>
                    </div>
                </div>
                </div>
                <?php
            }
            ?> 
            </div>
        </div>
        </section>
    <!-- Article end -->
    <!--Gallery Begin-->
    <section id="gallery" class="text-center p-5 bg-danger-subtle">
        <div class="container">
            <h1 class="fw-bold display-4 pb-3">Gallery</h1>
            <div id="carouselExample" class="carousel slide" data-bs-ride="carousel" data-bs-interval = "3000">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="GAMBAR/Alat Musik.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="GAMBAR/Album Musik.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="GAMBAR/Note Musik.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="GAMBAR/Piringan Hitam.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="GAMBAR/Microphone.jpg" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>
    <!--Gallery End-->
    <!--Jadwal Begin-->
    <section id="jadwal" class="text-center p-5 bg-info-subtle bg-gradient">
        <div class="container">
            <h1 class="fw-bold display-4 pb-3">Jadwal Kuliah & Kegiatan Mahasiswa</h1>
            <div class="row row-cols-1 row-cols-md-4 g-4 justify-content-center">
                <div class="col">
                    <div class="card h-100">
                        <div class="card-header text-center bg-primary bg-gradient text-light">
                            <small class="card-title">Senin</small>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">09:30 - 12:00</h5>
                            <p class="card-text">Probabilitas dan Statistika<br>Ruang H.5.11
                            </p>
                            <h5 class="card-title">15:30 - 18:00</h5>
                            <p class="card-text">Logika Informatika<br>Ruang H.3.9</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <div class="card-header text-center bg-success bg-gradient text-light">
                            <small class="card-title">Selasa</small>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">10:20 - 12:00</h5>
                            <p class="card-text">Basis Data<br>Ruang D.2.K
                            </p>
                            <h5 class="card-title">12:30 - 14:10</h5>
                            <p class="card-text">Pemrograman Berbasis Web<br>Ruang D.2.J</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <div class="card-header text-center bg-danger bg-gradient text-light">
                            <small class="card-title">Rabu</small>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">09:30 - 12:00</h5>
                            <p class="card-text">Rekayasa Perangkat Lunak<br>Ruang H.3.10
                            </p>
                            <h5 class="card-title">12:30 - 15:00</h5>
                            <p class="card-text">Kriptografi<br>Ruang H.5.9</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <div class="card-header text-center bg-warning bg-gradient text-light">
                            <small class="card-title">Kamis</small>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">10:20 - 12:00</h5>
                            <p class="card-text">Basis Data<br>Ruang H.5.6
                            </p>
                            <h5 class="card-title">12:30 - 15:00</h5>
                            <p class="card-text">Sistem Operasi<br>Ruang H.3.10</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <div class="card-header text-center bg-info bg-gradient text-light">
                            <small class="card-title">Jumat</small>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">15:30 - 18:00</h5>
                            <p class="card-text">Penambangan Data<br>Kulino / Online
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <div class="card-header text-center bg-secondary bg-gradient text-light">
                            <small class="card-title">Sabtu</small>
                        </div>
                        <div class="card-body">
                            <p class="card-text">Tidak ada jadwal
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <div class="card-header text-center bg-dark bg-gradient text-light">
                            <small class="card-title">Minggu</small>
                        </div>
                        <div class="card-body">
                            <p class="card-text">Tidak ada jadwal
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Jadwal End-->
    <!--Profil Begin-->
    <section id="profil" class="text-center p-5 bg-danger-subtle text-sm-start">
    <div class="container">
        <h1 class="fw-bold display-4 text-center mb-5">
            Profil Mahasiswa
        </h1>
        <div class="d-flex flex-column flex-sm-row align-items-center justify-content-center">
            <img src="GAMBAR/Foto Profil.jpg" 
                 class="rounded-circle mb-4 mb-sm-0" 
                 style="width: 250px; height: 250px; object-fit: cover;">            
                <div class="ms-sm-5 text-center text-sm-start">                
                    <h2 class="fw-bold mb-3">Adam Haritsa Thahara</h2>                
                    <table class="table table-borderless" style="max-width: 500px; ">
                        <tbody>
                            <tr>
                                <td class="fw-bold text-nowrap">NIM</td>
                                <td style="width: 16px;">:</td>
                                <td>A11.2024.15556</td>
                            </tr>
                            <tr>
                                <td class="fw-bold text-nowrap">Program Studi</td>
                                <td style="width: 16px;">:</td>
                                <td>S1-Teknik Informatika</td>
                            </tr>
                            <tr>
                                <td class="fw-bold text-nowrap">Email</td>
                                <td style="width: 16px;">:</td>
                                <td>111202415556@mhs.dinus.ac.id</td> </tr>
                            <tr>
                                <td class="fw-bold text-nowrap">Telepon</td>
                                <td style="width: 16px;">:</td>
                                <td>+62 812 3456 7890</td>
                            </tr>
                            <tr>
                                <td class="fw-bold text-nowrap">Alamat</td>
                                <td style="width: 16px;">:</td>
                                <td>Jl. Sinar Bahagia Raya, Semarang</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!--Profil End-->
    <!--Footer Begin-->
    <footer class="text-center p-5">
        <div>
            <a href="https://www.instagram.com/udinusofficial"><i class="bi bi-instagram h2 p-2 text-dark"></i></a>
            <a href="https://twitter.com/udinusofficial"><i class="bi bi-twitter h2 p-2 text-dark"></i></a>
            <a href="https://wa.me/+6281393167352"><i class="bi bi-whatsapp h2 p-2 text-dark"></i></a>
        </div>
        <div>
            Adam Haritsa Thahara &copy; 2025
        </div>
    </footer>
    <!--Footer End-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" 
    crossorigin="anonymous"
    ></script>
    <script type="text/javascript">
        // untuk bagian menampilkan waktu di "hero"
        window.setTimeout("tampilWaktu()", 1000);

        function tampilWaktu() {
            var waktu = new Date ();
            var bulan = waktu. getMonth() + 1;

            setTimeout("tampilWaktu()",1000);
            document.getElementById("tanggal").innerHTML =
                waktu.getDate() + "/" + bulan + "/"+ waktu.getFullYear();
            document.getElementById("jam").innerHTML =
                waktu.getHours () +
                ":" +
                waktu.getMinutes() +
                ":" +
                waktu.getSeconds();
            }
        // Javascript untuk tombol mode gelap
        document.getElementById("blackbutton").onclick = function () {
            // untuk bagian section (article, hero, gallery)
            document.getElementById("article").classList.remove("bg-white");
            document.getElementById("article").classList.remove("text-dark");
            document.getElementById("article").classList.add("bg-dark");
            document.getElementById("article").classList.add("text-light");

            document.getElementById("hero").classList.remove("bg-danger-subtle");
            document.getElementById("hero").classList.add("bg-secondary");
            document.getElementById("hero").classList.add("text-light");

            document.getElementById("gallery").classList.remove("bg-danger-subtle");
            document.getElementById("gallery").classList.add("bg-secondary");
            document.getElementById("gallery").classList.add("text-light");
            
            // untuk bagian section (jadwal, profil)
            document.getElementById("jadwal").classList.remove("bg-info-subtle");
            document.getElementById("jadwal").classList.add("bg-dark"); // Latar section jadwal jadi gelap
            document.getElementById("jadwal").classList.add("text-light");

            document.getElementById("profil").classList.remove("bg-danger-subtle");
            document.getElementById("profil").classList.add("bg-secondary"); // Latar section profil jadi abu-abu gelap
            document.getElementById("profil").classList.add("text-light");

            // untuk bagian card pada #jadwal (mode gelap)
            const jadwalCards = document.querySelectorAll("#jadwal .card");
            jadwalCards.forEach(function(card) {
                card.classList.add("bg-secondary"); // background card jadi abu-abu gelap
                card.classList.add("text-light");
            });

            // untuk bagian tombol gelap dan terang (opsional)
            document.getElementById("blackbutton").classList.remove("bg-black");
            document.getElementById("blackbutton").classList.remove("text-white");
            document.getElementById("blackbutton").classList.add("bg-light");
            document.getElementById("blackbutton").classList.add("text-dark");
            document.getElementById("whitebutton").classList.remove("bg-danger");
            document.getElementById("whitebutton").classList.add("bg-black");

            // untuk bagian card pada #article (mode gelap)
            const articleCards = document.querySelectorAll("#article .card");
            articleCards.forEach(function(card) {
                card.classList.add("bg-secondary"); // background mode gelap
                card.classList.add("text-light");
            });
            
            // untuk bagian remove dan/atau add khusus footer (memudahkan dalam memisahkan)
            const footerIcons = document.querySelectorAll("footer .bi");
            // gabung dengan bagian footer, yang ini untuk bagian icon dan tulisan agar berubah juga
            footerIcons.forEach(function(icon) {
                icon.classList.remove("text-dark");
                icon.classList.add("text-light"); // Ganti teks jadi terang
            });
            document.getElementsByTagName("footer")[0].classList.add("bg-dark");
            document.getElementsByTagName("footer")[0].classList.add("text-light");
        };

        // Javascript untuk tombol mode terang
        document.getElementById("whitebutton").onclick = function () {
            // untuk bagian section (article, hero, gallery)
            document.getElementById("article").classList.remove("bg-dark");
            document.getElementById("article").classList.remove("text-light");
            document.getElementById("article").classList.add("bg-white");
            document.getElementById("article").classList.add("text-dark");

            document.getElementById("hero").classList.remove("bg-secondary");
            document.getElementById("hero").classList.remove("text-light");
            document.getElementById("hero").classList.add("bg-danger-subtle");

            document.getElementById("gallery").classList.remove("bg-secondary");
            document.getElementById("gallery").classList.remove("text-light");
            document.getElementById("gallery").classList.add("bg-danger-subtle");
            
            // untuk bagian section (jadwal, profil)
            document.getElementById("jadwal").classList.remove("bg-dark");
            document.getElementById("jadwal").classList.remove("text-light");
            document.getElementById("jadwal").classList.add("bg-info-subtle"); // Kembalikan ke terang

            document.getElementById("profil").classList.remove("bg-secondary");
            document.getElementById("profil").classList.remove("text-light");
            document.getElementById("profil").classList.add("bg-danger-subtle"); // Kembalikan ke default (disini merah muda)

            // untuk bagian card pada #jadwal (mode terang)
            const jadwalCards = document.querySelectorAll("#jadwal .card");
            jadwalCards.forEach(function(card) {
                card.classList.remove("bg-secondary"); // Hapus class gelapnya
                card.classList.remove("text-light");
            });

            // untuk bagian tombol gelap dan terang (opsional)
            document.getElementById("blackbutton").classList.remove("bg-light");
            document.getElementById("blackbutton").classList.remove("text-dark");
            document.getElementById("blackbutton").classList.add("bg-black");
            document.getElementById("blackbutton").classList.add("text-white");
            document.getElementById("whitebutton").classList.remove("bg-black");
            document.getElementById("whitebutton").classList.add("bg-danger");

            // untuk bagian card pada #article (mode terang)
            const articleCards = document.querySelectorAll("#article .card");
            articleCards.forEach(function(card) {
                card.classList.remove("bg-secondary"); // Hapus class gelapnya
                card.classList.remove("text-light");
            });
            
            // untuk bagian remove dan/atau add khusus footer (memudahkan dalam memisahkan)
            const footerIcons = document.querySelectorAll("footer .bi");
            // gabung dengan bagian footer, yang ini untuk bagian icon dan tulisan agar berubah juga
            footerIcons.forEach(function(icon) {
                icon.classList.remove("text-light");
                icon.classList.add("text-dark"); // Ganti jadi gelap lagi
            });
            document.getElementsByTagName("footer")[0].classList.remove("bg-dark");
            document.getElementsByTagName("footer")[0].classList.remove("text-light");
        };
            // const collection = document.getElementsByClassName("navbar");
            // for (let i = 0; i < collection.length; i++) {
            // document.nav.classList.remove("bg-body-tertiary");
            // document.nav.classList.remove("text-dark");
            // document.nav.classList.add("bg-black");
            // document.nav.classList.add("text-white");
            // }
    </script>
</html>