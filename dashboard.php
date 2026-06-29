<?php
session_start();
require_once 'koneksi/koneksi.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$nama_user = $_SESSION['nama'] ?? 'User';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard User</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        .dashboard-container { margin-top: 40px; }
        .order-card {
            background: #fff;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 20px;
        }
        .order-card img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 10px;
        }
        .order-info { flex: 1; color: #333; }
        .order-info h3 { margin: 0 0 10px 0; color: #000; }
        .order-info p { margin: 5px 0; font-size: 14px; }
        .badge {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
            display: inline-block;
            margin-bottom: 10px;
        }
        .badge.pending { background: #ffeaa7; color: #d63031; }
        .badge.disewa { background: #55efc4; color: #00b894; }
        .badge.dibatalkan { background: #ff7675; color: #fff; }
        .badge.selesai { background: #74b9ff; color: #0984e3; }
        
        .order-actions {
            display: flex;
            gap: 10px;
        }
        .btn-sewa-confirm {
            background: #23C292;
            color: #fff;
            padding: 8px 15px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            font-size: 14px;
        }
        .btn-sewa-confirm:hover { background: #1da37a; }
        .btn-batal {
            background: #e74c3c;
            color: #fff;
            padding: 8px 15px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            font-size: 14px;
        }
        .btn-batal:hover { background: #c0392b; }
    </style>
</head>
<body>

<?php include 'layout/navbar.php'; ?>

<section class="banner-atas" style="height: 120px; background: #171717;"></section>

<div class="container dashboard-container">

    <div class="section-title">
        <h1>Dashboard</h1>
        <p>Selamat datang di area member CampingKu</p>
    </div>

    <div class="feature-card" style="margin-bottom: 40px;">
        <h3>Halo <?php echo htmlspecialchars($nama_user); ?> 👋</h3>
        <p>Anda berhasil login ke sistem CampingKu. Berikut adalah daftar pesanan penyewaan Anda.</p>
    </div>

    <div class="pesanan-list">
        <h2 style="color: #000; margin-bottom: 20px;">Pesanan Anda</h2>
        
        <?php
        $query_pesanan = "SELECT p.*, pr.nama_produk, pr.gambar, pr.harga 
                          FROM pesanan p 
                          JOIN produk pr ON p.id_produk = pr.id_produk 
                          WHERE p.user_id = '$user_id' 
                          ORDER BY p.tanggal_pesan DESC";
        $result_pesanan = mysqli_query($koneksi, $query_pesanan);

        if (mysqli_num_rows($result_pesanan) > 0) {
            while ($row = mysqli_fetch_assoc($result_pesanan)) {
                $status_class = $row['status'];
                $status_text = ucfirst($row['status']);
                if ($row['status'] == 'disewa') {
                    $status_text = 'Sedang Disewa';
                }
                ?>
                <div class="order-card">
                    <img src="./img/<?php echo htmlspecialchars($row['gambar']); ?>" alt="Produk">
                    <div class="order-info">
                        <span class="badge <?php echo $status_class; ?>"><?php echo $status_text; ?></span>
                        <h3><?php echo htmlspecialchars($row['nama_produk']); ?></h3>
                        <p>Tanggal Pesan: <?php echo date('d M Y H:i', strtotime($row['tanggal_pesan'])); ?></p>
                        <p>Harga: <strong>Rp <?php echo number_format($row['harga'],0,',','.'); ?> / hari</strong></p>
                    </div>
                    
                    <?php if ($row['status'] === 'pending') { ?>
                        <div class="order-actions">
                            <a href="koneksi/update_pesanan.php?id=<?php echo $row['id_pesanan']; ?>&aksi=sewa" class="btn-sewa-confirm"><i class="fa-solid fa-check"></i> Sewa</a>
                            <a href="koneksi/update_pesanan.php?id=<?php echo $row['id_pesanan']; ?>&aksi=batal" class="btn-batal"><i class="fa-solid fa-xmark"></i> Tidak</a>
                        </div>
                    <?php } ?>
                </div>
                <?php
            }
        } else {
            echo "<p style='color: #444; text-align: center; padding: 20px; background: #f9f9f9; border-radius: 10px;'>Belum ada pesanan barang. Silakan ke halaman Produk untuk menyewa.</p>";
        }
        ?>
    </div>

</div>

<?php include 'layout/footer.php'; ?>

<script src="js/script.js"></script>
</body>
</html>