<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!-- NAVBAR SECTION -->
<div class="navbar">
    <div class="logo">
        <img src="./img/logo.png" alt="Logo CampingKu">
    </div>
    
    <!-- id toggle -->
    <button class="menu-toggle" id="menu-toggle">
        <i class="fa-solid fa-bars"></i>
    </button>
    
    <!-- id navbar -->
    <div class="nav-container" id="nav-container">
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
                echo '<li><a href="./dashboard.php" class="btn-dashboard"><i class="fa-solid fa-gauge"></i> Dashboard</a></li>';
            } else {
                echo '<li><a href="./login.php" class="btn-login"><i class="fa-solid fa-right-to-bracket"></i> Login</a></li>';
            }
            ?>
        </ul>
    </div>
</div>