<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard User</title>

    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>

<?php include 'layout/navbar.php'; ?>

<section class="banner-atas"></section>

<div class="container">

    <div class="section-title">
        <h1>Dashboard</h1>
        <p>Selamat datang di CampingKu</p>
    </div>

    <div class="feature-card">
        <h3>Halo User 👋</h3>

        <p>
            Anda berhasil login ke sistem CampingKu.
        </p>
    </div>

</div>

<?php include 'layout/footer.php'; ?>

</body>
</html>