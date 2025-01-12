<?php
session_start();
include "koneksi.php";

// Pastikan pengguna sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];
$foto_baru = $password_baru = "";

// Cek apakah ada foto baru yang diupload
if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
    $foto_baru = $_FILES['foto']['name'];
    $tmp_name = $_FILES['foto']['tmp_name'];
    $upload_dir = "img/";

    // Pindahkan file ke folder img
    if (move_uploaded_file($tmp_name, $upload_dir . $foto_baru)) {
        // Berhasil upload, update foto di database
        $stmt = $conn->prepare("UPDATE users SET foto = ? WHERE username = ?");
        $stmt->bind_param("ss", $foto_baru, $username);
        $stmt->execute();
        $stmt->close();
    } else {
        echo "<script>alert('Gagal mengupload foto!');</script>";
    }
}

// Cek jika password diubah
if (!empty($_POST['password'])) {
    $password_baru = md5($_POST['password']); // Enkripsi password dengan MD5

    // Update password di database
    $stmt = $conn->prepare("UPDATE users SET password = ? WHERE username = ?");
    $stmt->bind_param("ss", $password_baru, $username);
    $stmt->execute();
    $stmt->close();
}

echo "<script>alert('Profil berhasil diperbarui!');</script>";
header("Location: profile.php");
?>
