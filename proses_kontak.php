<?php

// Memanggil koneksi database
include 'koneksi/koneksi.php';

// Mengambil data dari form
$nama     = $_POST['nama'];
$email    = $_POST['email'];
$telepon  = $_POST['telepon'];
$subject  = $_POST['subject'];
$pesan    = $_POST['pesan'];

// Menyimpan data ke database
$query = mysqli_query($koneksi,"
INSERT INTO pesan_kontak
(nama,email,telepon,subject,pesan)
VALUES
('$nama','$email','$telepon','$subject','$pesan')
");

// Mengecek apakah data berhasil disimpan
if($query){

    echo "
    <script>
        alert('Pesan berhasil dikirim');
        window.location='kontak.php';
    </script>
    ";

}else{

    echo "
    <script>
        alert('Pesan gagal dikirim');
        window.location='kontak.php';
    </script>
    ";

}

?>