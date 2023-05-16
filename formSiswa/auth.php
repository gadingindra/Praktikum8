<?php
// Memanggil koneksi.php untuk menghubungkan ke database
// Memulai sesi
session_start();

function authenticate($username, $password)
{
    include "db_peserta-didik.php";

    // Query untuk mencari data user berdasarkan username
    $query = "SELECT * FROM user WHERE username = '$username'";


    // Eksekusi query
    $result = mysqli_query($koneksi, $query);

    // Cek apakah query berhasil dieksekusi
    if (!$result) {
        die("Query gagal dijalankan: " . mysqli_error($koneksi));
    }

    // Ambil data user dari hasil query
    $hasiluser = mysqli_fetch_assoc($result);

    // Verifikasi password dengan password_hash()
    if ($username && password_verify($password, $hasiluser['password'])) {
        // Jika username dan password cocok, simpan data user ke dalam sesi
        $_SESSION['user'] = $hasiluser;
        return true;
    } else {
        // Jika username atau password tidak cocok, kembalikan false
        return false;
    }
}

function is_authenticated()
{
    return isset($_SESSION['user']);
}

function logout()
{
    unset($_SESSION['user']);
    session_destroy();
}

function register($username, $email, $password)
{
    include 'db_peserta-didik.php';
    // Enkripsi password dengan fungsi password_hash() sebelum disimpan ke database
    $password = password_hash($password, PASSWORD_DEFAULT);

    // Query untuk menambahkan data baru ke dalam tabel mahasiswa
    $query = "INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$password')";

    // Eksekusi query
    $result = mysqli_query($koneksi, $query);

    // Cek apakah query berhasil dieksekusi
    if (!$result) {
        die("Query gagal dijalankan: " . mysqli_error($koneksi));
        return false;
    } else {
        return true;
    }
}
?>