<?php
// Memulai session
session_start();

// Menghapus semua data session
session_unset();

// Menghancurkan session
session_destroy();

// Redirect ke halaman index setelah berhasil logout
header("Location: index.php");
exit;
?>
