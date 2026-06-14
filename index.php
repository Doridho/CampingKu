<?php
session_start();
require_once './koneksi/koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CampingKu - Rental Alat Camping</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>

    <div class="navbar">
        <div class="logo">
            <img src="./img/logo.png" alt="Logo CampingKu">
        </div>
        
        <nav>
            <ul>
                <li><a href="./index.php">Beranda</a></li>
                <li><a href="./produk.php">Produk</a></li>
                <li><a href="./kontak.php">Hubungi Kami</a></li>
            </ul>
        </nav>

        <ul class="menu-kanan">
            <?php
            if (isset($_SESSION['user_id'])) {
                echo '<li><a href="./logout.php" class="btn-logout"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>';
                echo '<li><a href="./dahboard.php" class="btn-dashboard"><i class="fa-solid fa-gauge"></i> Dashboard</a></li>';
            } else {
                echo '<li><a href="./login.php" class="btn-login"><i class="fa-solid fa-right-to-bracket"></i> Login</a></li>';
            }
            ?>
        </ul>
    </div>

    <div class="header-container">
        <div class="image-bg">
            <img src="./img/landingpage.jpeg" alt="Landing Page">
        </div>
        <div class="text-header">
            <h1 class="header-1">PETUALANGAN HEBAT DIMULAI DARI SINI</h1>
            <h2 class="header-2">Sewa perlengkapan camping premium dan lengkap.<br>Hemat, praktis, siap pakai!</h2>
            <button class="btn-sewa"><i class="fa-solid fa-cart-shopping"></i> Sewa Sekarang</button>
        </div>
    </div>

    <div class="container">
        <div class="section-title">
            <h1>Mengapa Harus CampingKu?</h1>
            <p>Kami menyediakan pengalaman rental peralatan camping yang tak tertandingi dengan berbagai keunggulan</p>
        </div>

        <section class="features-section">
            <div class="features-container">
                
                <div class="feature-card">
                    <div class="icon-wrapper">
                        <i class="fa-regular fa-star"></i> 
                    </div>
                    <h3>Kualitas Terbaik</h3>
                    <p>Peralatan camping dari brand terpercaya, selalu terawat dan siap pakai untuk setiap petualangan Anda.</p>
                </div>

                <div class="feature-card">
                    <div class="icon-wrapper">
                        <i class="fa-solid fa-cart-shopping"></i> 
                    </div>
                    <h3>Proses Mudah & Cepat</h3>
                    <p>Sewa cepat dan praktis melalui platform online kami. Tanpa ribet, langsung siap berangkat!</p>
                </div>

                <div class="feature-card">
                    <div class="icon-wrapper">
                        <i class="fa-solid fa-arrow-right"></i> 
                    </div>
                    <h3>Harga Terjangkau</h3>
                    <p>Nikmati petualangan tanpa khawatir kantong bolong. Harga kompetitif dengan kualitas maksimal.</p>
                </div>
            </div>
        </section>

        <section class="product-section">
            <div class="section-title">
                <h1>Produk Populer</h1>
                <p>Pilihan terbaik untuk petualangan Anda.</p>
            </div>

            <div class="product-container">
                <div class="product-card">
                    <img src="./img/tenda.jpg" alt="Tenda">
                    <h3>Tenda</h3>
                    <p>Tenda camping dengan kualitas terbaik.</p>
                    <span class="product-price">Rp 50.000/hari</span>
                    <button class="btn-sewa"><i class="fa-solid fa-cart-shopping"></i> Sewa Sekarang</button>
                </div>

                <div class="product-card">
                    <img src="./img/tenda.jpg" alt="Tenda">
                    <h3>Tenda</h3>
                    <p>Tenda camping dengan kualitas terbaik.</p>
                    <span class="product-price">Rp 50.000/hari</span>
                    <button class="btn-sewa"><i class="fa-solid fa-cart-shopping"></i> Sewa Sekarang</button>
                </div>

                <div class="product-card">
                    <img src="./img/tenda.jpg" alt="Tenda">
                    <h3>Tenda</h3>
                    <p>Tenda camping dengan kualitas terbaik.</p>
                    <span class="product-price">Rp 50.000/hari</span>
                    <button class="btn-sewa"><i class="fa-solid fa-cart-shopping"></i> Sewa Sekarang</button>
                </div>
                
                <div class="product-card">
                    <img src="./img/tenda.jpg" alt="Tenda">
                    <h3>Tenda</h3>
                    <p>Tenda camping dengan kualitas terbaik.</p>
                    <span class="product-price">Rp 50.000/hari</span>
                    <button class="btn-sewa"><i class="fa-solid fa-cart-shopping"></i> Sewa Sekarang</button>
                </div>
            </div>
        </section>
    </div>
</body>
</html>