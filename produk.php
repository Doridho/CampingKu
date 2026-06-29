<?php
session_start();
require_once 'koneksi/koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk | CampingKu</title>

    <link rel="stylesheet" href="css/style.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body>

<?php include 'layout/navbar.php'; ?>

<section class="product-section" style="padding-top: 50px;">

    <div class="section-title">
        <h1>Daftar Produk</h1>
        <p>Pilihan terbaik untuk petualangan Anda.</p>
    </div>

    <div class="product-container">

        <?php
            // Mengambil semua data produk dari database, diurutkan dari yang terbaru
            $query_produk = "SELECT * FROM produk ORDER BY id_produk DESC";
            $tampil_produk = mysqli_query($koneksi , $query_produk);
            
            if (mysqli_num_rows($tampil_produk) == 0) {
                echo "<p style='color: black; text-align: center; width: 100%;'>Belum ada produk yang tersedia saat ini.</p>";
            } else {
                while($row = mysqli_fetch_assoc($tampil_produk)){
        ?>
            <div class="product-card">
                <div class="product-image">
                    <img src="./img/<?php echo $row['gambar']?>" alt="<?php echo $row['nama_produk']; ?>">
                </div>
                <h3><?php echo $row['nama_produk']; ?></h3>
                <p><?php echo $row['deskripsi']; ?></p>
                <span class="product-price">Rp <?php echo number_format($row['harga'],0,',','.'); ?> /hari</span>
                
                <a href="koneksi/proses_pesan.php?id=<?php echo $row['id_produk']; ?>" class="btn-card-sewa" style="text-decoration: none;">
                    <i class="fa-solid fa-cart-shopping"></i> Sewa Sekarang
                </a>
            </div>
        <?php
                }
            }
        ?>

    </div>

</section>

<?php include 'layout/footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>