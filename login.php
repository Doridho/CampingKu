<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Register Form</title>
    <link rel="stylesheet" href="./css/login.css">
</head>
<body>

    <div class="container">
        <div class="card">
            <!-- Bagian Kiri: Form Konten (Warna #006240) -->
            <div class="card-left">
                
                <!-- Form Login -->
                <div class="form-box" id="loginForm">
                    <h2>Selamat Datang</h2>
                    <p>Silahkan masuk ke akun Anda</p>
                    <form>
                        <div class="input-group">
                            <label for="login-email">Email</label>
                            <input type="email" id="login-email" required placeholder="Masukkan email">
                        </div>
                        <div class="input-group">
                            <label for="login-password">Password</label>
                            <input type="password" id="login-password" required placeholder="Masukkan password">
                        </div>
                        <button type="submit" class="btn">Masuk</button>
                    </form>
                    <p class="switch-text">Belum punya akun? <a href="#" id="toRegister">Daftar disini</a></p>
                </div>

                <!-- Form Register (Hidden by default) -->
                <div class="form-box hidden" id="registerForm">
                    <h2>Buat Akun</h2>
                    <p>Daftar untuk menikmati layanan kami</p>
                    <form>
                        <div class="input-group">
                            <label for="reg-name">Nama Lengkap</label>
                            <input type="text" id="reg-name" required placeholder="Nama Anda">
                        </div>
                        <div class="input-group">
                            <label for="reg-email">Email</label>
                            <input type="email" id="reg-email" required placeholder="Email Anda">
                        </div>
                        <div class="input-group">
                            <label for="reg-password">Password</label>
                            <input type="password" id="reg-password" required placeholder="Buat password">
                        </div>
                        <button type="submit" class="btn">Daftar</button>
                    </form>
                    <p class="switch-text">Sudah punya akun? <a href="#" id="toLogin">Login disini</a></p>
                </div>

            </div>

            <!-- Bagian Kanan: Logo (Warna Putih) -->
            <div class="card-right">
                <!-- Ganti URL gambar di bawah dengan logo Anda -->
                <img src="./img/logo.png" alt="Logo" class="logo">
            </div>
        </div>
    </div>

    <script src="./js/script.js"></script>
</body>
</html>