<?php
session_start();
require_once 'koneksi.php';

// Pastikan user sudah login
if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Silakan login terlebih dahulu.'); window.location.href = '../login.php';</script>";
    exit;
}

if (isset($_GET['id']) && isset($_GET['aksi'])) {
    $id_pesanan = intval($_GET['id']);
    $aksi = $_GET['aksi'];
    $user_id = $_SESSION['user_id'];

    // Pastikan pesanan tersebut adalah milik user yang sedang login
    $cek_pesanan = mysqli_query($koneksi, "SELECT id_pesanan FROM pesanan WHERE id_pesanan = '$id_pesanan' AND user_id = '$user_id' AND status = 'pending'");
    
    if (mysqli_num_rows($cek_pesanan) > 0) {
        $status_baru = '';
        if ($aksi === 'sewa') {
            $status_baru = 'disewa';
            $pesan_alert = 'Pesanan berhasil dikonfirmasi! Barang sedang disewa.';
        } elseif ($aksi === 'batal') {
            $status_baru = 'dibatalkan';
            $pesan_alert = 'Pesanan berhasil dibatalkan.';
        } else {
            echo "<script>alert('Aksi tidak valid!'); window.location.href = '../dashboard.php';</script>";
            exit;
        }

        $update_query = "UPDATE pesanan SET status = '$status_baru' WHERE id_pesanan = '$id_pesanan'";
        
        if (mysqli_query($koneksi, $update_query)) {
            echo "<script>alert('$pesan_alert'); window.location.href = '../dashboard.php';</script>";
        } else {
            echo "<script>alert('Gagal mengupdate pesanan.'); window.location.href = '../dashboard.php';</script>";
        }
    } else {
        echo "<script>alert('Pesanan tidak valid atau sudah diproses.'); window.location.href = '../dashboard.php';</script>";
    }
} else {
    header("Location: ../dashboard.php");
    exit;
}
?>
