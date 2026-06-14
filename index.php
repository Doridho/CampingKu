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
    <script src="./js/script.js"></script>
</head>
<body>
    <?php
    require_once './koneksi/koneksi.php';
    include_once './layout/navbar.php'; //memanggil navbar
    ?>

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
                <?php
                    $query_produk = "SELECT * FROM produk ORDER BY id_produk DESC LIMIT 4";
                    $tampil_produk = mysqli_query($koneksi , $query_produk);
                    
                    if (mysqli_num_rows($tampil_produk) == 0) {
                        echo "<p style='color: yellow; text-align: center; width: 100%;'>Pesan Tes: Data di database kosong, Makanya Kartu Gak Muncul!</p>";
                    }
                    while($row = mysqli_fetch_assoc($tampil_produk)){
                    ?>
                    <div class="product-card">
                        <div class="product-image">
                            <img src="./img/<?php echo $row['gambar']?>" alt="<?php echo $row['nama_produk']; ?>">
                        </div>
                        <h3><?php echo $row['nama_produk']; ?></h3>
                        <p><?php echo $row['deskripsi']; ?></p>
                        <span class="product-price">Rp <?php echo number_format($row['harga'],0,',','.'); ?> /hari</span>
                        <button class="btn-card-sewa"><i class="fa-solid fa-cart-shopping"></i> Sewa Sekarang</button>
                    </div>
                <?php
                    }
                ?>    
            </div>
        </section>
    </div>

    <?php include_once './layout/footer.php'; ?>
    <script src="./js/script.js"></script>
</body>
</html>