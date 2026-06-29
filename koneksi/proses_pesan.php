<?php
session_start();
require_once 'koneksi.php';

// Pastikan user sudah login
if (!isset($_SESSION['user_id'])) {
    echo "<script>
            alert('Silakan login terlebih dahulu untuk menyewa barang.');
            window.location.href = '../login.php';
          </script>";
    exit;
}

if (isset($_GET['id'])) {
    $id_produk = intval($_GET['id']);
    $user_id = $_SESSION['user_id'];

    // Cek apakah produk dengan ID tersebut ada
    $cek_produk = mysqli_query($koneksi, "SELECT id_produk FROM produk WHERE id_produk = '$id_produk'");
    
    if (mysqli_num_rows($cek_produk) > 0) {
        // Masukkan pesanan baru dengan status pending
        $query_pesan = "INSERT INTO pesanan (user_id, id_produk, status) VALUES ('$user_id', '$id_produk', 'pending')";
        
        if (mysqli_query($koneksi, $query_pesan)) {
            echo "<script>
                    alert('Barang berhasil dipesan! Silakan konfirmasi di Dashboard.');
                    window.location.href = '../dashboard.php';
                  </script>";
            exit;
        } else {
            echo "<script>alert('Gagal memesan barang. Silakan coba lagi.'); window.location.href = '../index.php';</script>";
        }
    } else {
        echo "<script>alert('Produk tidak ditemukan!'); window.location.href = '../index.php';</script>";
    }
} else {
    header("Location: ../index.php");
    exit;
}
?>
