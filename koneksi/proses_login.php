<?php
// Memulai session untuk menyimpan data login user
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 1. KONEKSI DATABASE
$host     = "localhost";
$db_user  = "root"; // Mengubah nama variabel agar tidak bentrok dengan data input
$password = "";
$database = "CampingKu"; 

$conn = mysqli_connect($host, $db_user, $password, $database);

if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// 2. PROSES REGISTER
if (isset($_POST['btn-register'])) {
    $nama     = mysqli_real_escape_string($conn, $_POST['nama']);
    $email    = mysqli_real_escape_string($conn, $_POST['email']);
    $pass_raw = $_POST['password'];

    // Enkripsi password sebelum disimpan ke database
    $password_hashed = password_hash($pass_raw, PASSWORD_DEFAULT);

    // FIX: Pastikan nama tabelnya 'users' sesuai dengan proses login
    $cek_email = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'");
    
    if (mysqli_num_rows($cek_email) > 0) {
        echo "<script>alert('Email sudah terdaftar! Gunakan email lain.');</script>";
    } else {
        // FIX: Menggunakan kolom 'username', mengisi dengan variabel '$nama', dan password yang sudah di-hash '$password_hashed'
        $query_reg = "INSERT INTO users (username, email, password) VALUES ('$nama', '$email', '$password_hashed')";
        
        if (mysqli_query($conn, $query_reg)) {
            echo "<script>alert('Registrasi Berhasil! Silakan login.');</script>";
        } else {
            echo "<script>alert('Registrasi Gagal, coba lagi.');</script>";
        }
    }
}

// 3. PROSES LOGIN
if (isset($_POST['btn-login'])) {
    $email    = mysqli_real_escape_string($conn, $_POST['email']);
    $pass_raw = $_POST['password'];

    // FIX: Nama tabel disamakan menjadi 'users'
    $query_login = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
    
    if (mysqli_num_rows($query_login) === 1) {
        $row = mysqli_fetch_assoc($query_login);
        
        // Verifikasi password yang diinput dengan password terenkripsi di database
        if (password_verify($pass_raw, $row['password'])) {
            // Set session jika login sukses
            $_SESSION['login'] = true;
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['nama'] = $row['username'];
            
            // Menggunakan kombinasi JS redirect agar lebih aman dari masalah output buffering
            echo "<script>
                    alert('Login Berhasil! Selamat Datang, " . $row['username'] . "');
                    window.location.href = 'index.php';
                  </script>";
            
            exit;
        } else {
            echo "<script>alert('Password salah!');</script>";
        }
    } else {
        echo "<script>alert('Email tidak ditemukan!');</script>";
    }
}
?>