<?php
session_start();
require_once 'koneksi/koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hubungi Kami - CampingKu</title>

    <!-- CSS halaman kontak -->
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="css/kontak.css">

    <!-- Font Awesome untuk icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <script src="./js/script.js"></script>
</head>

<body>

    <!-- Banner Atas -->
    <section class="banner-atas">
    </section>

    <!-- Hero -->
    <section class="hero-kontak">

        <div class="hero-content">
            <h1>Hubungi Kami</h1>

            <p>
                Ada pertanyaan tentang rental peralatan camping?
                Tim kami siap membantu Anda!
            </p>
        </div>

    </section>

    <!-- Section Kontak -->
    <section class="kontak-section">

        <!-- Informasi Kontak -->
        <div class="info-kontak">

            <h2>Informasi Kontak</h2>

            <!-- Alamat -->
            <div class="item-kontak">
                <div class="icon">
                    <i class="fa-solid fa-location-dot"></i>
                </div>

                <div>
                    <h4>Alamat Lokasi</h4>
                    <p>Jl. Factory, komplek, Bima Sakti no. 4</p>
                </div>
            </div>

            <!-- Telepon -->
            <div class="item-kontak">
                <div class="icon">
                    <i class="fa-solid fa-phone"></i>
                </div>

                <div>
                    <h4>Telepon</h4>
                    <p>0808-0888-8800</p>
                </div>
            </div>

            <!-- Email -->
            <div class="item-kontak">
                <div class="icon">
                    <i class="fa-solid fa-envelope"></i>
                </div>

                <div>
                    <h4>Email</h4>
                    <p>campingku@gmail.com</p>
                </div>
            </div>

            <!-- Jam Operasional -->
            <div class="item-kontak">
                <div class="icon">
                    <i class="fa-regular fa-clock"></i>
                </div>

                <div>
                    <h4>Jam Operasional</h4>
                    <p>Jam 15.00 - 17.30</p>
                </div>
            </div>

            <!-- Tombol WhatsApp -->
            <a href="https://wa.me/+6282158774652" class="btn-wa">
                Chat Via WhatsApp
            </a>

        </div>

        <!-- Form Kirim Pesan -->
        <div class="form-kontak">

            <h2>Kirim Pesan</h2>

            <form action="proses_kontak.php" method="POST">

                <!-- Baris 1 -->
                <div class="row">

                    <div class="group">
                        <label>Nama Lengkap*</label>
                        <input type="text"
                            name="nama"
                            required>
                    </div>

                    <div class="group">
                        <label>Email*</label>
                        <input type="email"
                            name="email"
                            required>
                    </div>

                </div>

                <!-- Baris 2 -->
                <div class="kontak-row">

                    <div class="group">
                        <label>Nomor Telepon*</label>
                        <input type="text"
                            name="telepon"
                            required>
                    </div>

                    <div class="group">
                        <label>Subject*</label>
                        <input type="text"
                            name="subject"
                            required>
                    </div>

                </div>

                <!-- Pesan -->
                <div class="group">
                    <label>Pesan*</label>
                    <textarea
                        name="pesan"
                        rows="7"
                        required>
                    </textarea>
                </div>

                <!-- Tombol Submit -->
                <button type="submit">
                    Kirim Pesan
                </button>

            </form>

        </div>

    </section>

    <?php include 'layout/navbar.php'; ?>

    <!-- isi halaman kontak -->

    <?php include 'layout/footer.php'; ?>

</body>

</html>