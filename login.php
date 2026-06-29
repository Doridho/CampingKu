<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Register Form</title>
    <link rel="stylesheet" href="./css/login.css">
</head>
<body>

    <!-- Memanggil proses di paling atas -->
    <?php include './koneksi/proses_login.php'; ?>

    <div class="container">
        <div class="card">
            <div class="card-left">
                
                <!-- Form Login -->
                <div class="form-box" id="loginForm">
                    <h2>Selamat Datang</h2>
                    <p>Silahkan masuk ke akun Anda</p>
                    
                    <!-- FIX: Action dikosongkan agar diproses oleh include di atas -->
                    <form action="" method="POST">
                        <div class="input-group">
                            <label for="login-email">Email</label>
                            <input type="email" name="email" id="login-email" required placeholder="Masukkan email">
                        </div>
                        <div class="input-group">
                            <label for="login-password">Password</label>
                            <input type="password" name="password" id="login-password" required placeholder="Masukkan password">
                        </div>
                        <button type="submit" name="btn-login" class="btn">Masuk</button>
                    </form>
                    <p class="switch-text">Belum punya akun? <a href="#" id="toRegister">Daftar disini</a></p>
                    <p class="switch-text">Kembali ke Beranda <a href="index.php" id="toHome">Beranda</a></p>
                </div>

                <!-- Form Register -->
                <div class="form-box hidden" id="registerForm">
                    <h2>Buat Akun</h2>
                    <p>Daftar untuk menikmati layanan kami</p>
                    
                    <!-- FIX: Pastikan action="" juga -->
                    <form action="" method="POST">
                        <div class="input-group">
                            <label for="reg-name">Nama Lengkap</label>
                            <input type="text" name="nama" id="reg-name" required placeholder="Nama Anda">
                        </div>
                        <div class="input-group">
                            <label for="reg-email">Email</label>
                            <input type="email" name="email" id="reg-email" required placeholder="Email Anda">
                        </div>
                        <div class="input-group">
                            <label for="reg-password">Password</label>
                            <input type="password" name="password" id="reg-password" required placeholder="Buat password">
                        </div>
                        <button type="submit" name="btn-register" class="btn">Daftar</button>
                    </form>
                    <p class="switch-text">Sudah punya akun? <a href="#" id="toLogin">Login disini</a></p>
                </div>

            </div>

            <div class="card-right">
                <img src="./img/logo.png" alt="Logo" class="logo">
            </div>
        </div>
    </div>

    <script src="./js/script.js"></script>
</body>
</html>