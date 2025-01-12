<?php
session_start();
include "koneksi.php";

// Periksa apakah user sudah login
if (!isset($_SESSION['username'])) { 
    header("location:login.php");
    exit;
}

// Ambil data user berdasarkan sesi username
$username = $_SESSION['username']; 
$sqlUser = "SELECT * FROM user WHERE username = '$username'";
$resultUser = $conn->query($sqlUser);
$userData = $resultUser->fetch_assoc();

// Proses form ketika tombol Simpan ditekan
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $passwordBaru = isset($_POST['password']) && $_POST['password'] !== "" ? md5($_POST['password']) : $userData['password'];
    $fotoBaru = $userData['foto']; // Gunakan foto lama jika tidak diubah

    // Jika ada file foto baru yang diunggah
    if (isset($_FILES['foto']['name']) && $_FILES['foto']['name'] !== "") {
        $targetDir = "img/";
        $fotoBaru = basename($_FILES['foto']['name']);
        $targetFile = $targetDir . $fotoBaru;

        // Pindahkan file yang diunggah ke folder img/
        move_uploaded_file($_FILES['foto']['tmp_name'], $targetFile);
    }

    // Update data user
    $sqlUpdate = "UPDATE user SET password = '$passwordBaru', foto = '$fotoBaru' WHERE username = '$username'";
    if ($conn->query($sqlUpdate) === TRUE) {
        echo "<script>alert('Profil berhasil diperbarui!'); window.location.href='profile.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Profile Management</title>
    <link rel="icon" href="img/logo.png" />
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css"
    />
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous"
    />
    <style>
        html {
            position: relative;
            min-height: 100%;
        }

        body {
            margin-bottom: 100px; /* Margin bottom by footer height */
        }

        footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 100px; /* Set the fixed height of the footer here */
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-sm bg-body-tertiary sticky-top bg-danger-subtle">
        <div class="container">
            <a class="navbar-brand" href="">My Daily Journal</a>
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-dark">
                    <li class="nav-item">
                        <a class="nav-link" href="admin.php?page=dashboard">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin.php?page=article">Article</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin.php?page=gallery">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=homepage"><strong>Homepage</strong></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-danger fw-bold" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?= $_SESSION['username'] ?>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <section id="content" class="p-5">
        <div class="container">
            <h4 class="lead display-6 pb-2 border-bottom border-danger-subtle">Profil</h4>
                    <form method="POST" enctype="multipart/form-data">
                        <!-- Ganti Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Ganti Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Tuliskan Password Baru Jika Ingin Mengganti Password Saja">
                        </div>
                    
                        <!-- Ganti Foto -->
                        <div class="mb-3">
                            <label for="foto" class="form-label">Ganti Foto Profil</label>
                            <input type="file" class="form-control" id="foto" name="foto">
                        </div>

                        <!-- Foto Profil -->
                        <div class="mb-3">
                            <label for="fotoSaatIni" class="form-label">Foto Profil Saat Ini</label><br>
                            <img src="img/<?= $userData['foto'] ?>" alt="Profile Picture" class="img-thumbnail" style="width: 150px; height: 150px;">
                        </div>

                        <!-- Tombol Simpan -->
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-center p-3 bg-danger-subtle">
        <div>
            <a href="https://www.instagram.com/meinadzz__/profilecard/?igsh=MXIxNm4yYTNtY2t3OA==">
                <i class="bi bi-instagram h2 p-2 text-dark"></i>
            </a>
            <a href="https://x.com/skyblueecy?t=LShHP5Y762oDAwxlxYGT0g&s=09">
                <i class="bi bi-twitter h2 p-2 text-dark"></i>
            </a>
            <a href="https://wa.me/+6281239147073">
                <i class="bi bi-whatsapp h2 p-2 text-dark"></i>
            </a>
        </div>
        <div>Nadila Meivika Rahmawati &copy; 2024</div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
