<?php
include "koneksi.php"; 
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>My Daily Journal</title>
  <link rel="icon" href="img/logo4.png"/>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    .dark-mode {
      background-color: #333;
      color: #ffffff;
    }
    .dark-mode .bg-danger-subtle {
      background-color: #686D76 !important; 
    }
    .bg-danger-subtle{
      background-color: #87CEFA !important;
    }
    .navbar-dark-mode {
      background-color: #686D76;
    }
    .dark-mode .card {
      background-color: #2a2a2a;
      color: #ffffff;
      border: none;
    }
    .dark-mode footer {
      background-color: #686D76;
    }
    .carousel-item img {
      object-fit: cover;
      width: 100%;
      height: auto;
    }
    .card-footer {
    background-color: #CC2B52; 
    color: #000; 
    }
    .dark-mode .card-footer {
    background-color: #740938 !important; 
    color: #ffffff !important; 
    }
    .dark-mode .card-footer small {
    color: #ffffff !important; 
    }
    .dark-mode #about {
    background-color: #333 !important; 
    color: #ffffff; 
    }
    .dark-mode #about img {
      border: 2px solid #ffffff; 
    }
  </style>
</head>
<body>
  <!--nav begi -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top">
    <div class="container">
      <a class="navbar-brand" href="#">My Daily Journal</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-dark">
          <li class="nav-item">
            <a class="nav-link" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#article">Article</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#schedule">Schedule</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#gallery">Gallery</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#about">About Me</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php" target="_blank">Login</a>
          </li>
        </ul>
        <button id="darkModeToggle" class="btn btn-outline-secondary ms-2">
          <i id="darkModeIcon" class="bi bi-moon-fill"></i>
        </button>
      </div>
    </div>
  </nav>
  <!--nav end-->
  <!--hero begin-->
  <section id="hero" class="text-center p-5 bg-danger-subtle text-sm-start">
    <div class="container">
      <div class="d-sm-flex flex-sm-row-reverse align-items-center">
        <img src="img/nad4.jpg" class="img-fluid" width="300"/>
        <div>
          <h1 class="fw-bold display-4">Capturing the Beauty in Everyday Moments: A Journey Through Life's Little Details</h1>
          <h4 class="lead display-6" style="font-size:24px;">Selamat datang di catatan harian ini!
            Di sini, semua momen sehari-hari diabadikan sebagai inspirasi untuk masa depan.</h4>
          <h6>
            <span id="tanggal"></span>
            <span id="jam"></span>
          </h6>
        </div>
      </div>
    </div>
  </section>
  <!--hero end-->
  <!-- article begin -->
<section id="article" class="text-center p-5">
  <div class="container">
    <h1 class="fw-bold display-4 pb-3">article</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
      <?php
      $sql = "SELECT * FROM article ORDER BY tanggal DESC";
      $hasil = $conn->query($sql); 

      while($row = $hasil->fetch_assoc()){
      ?>
        <div class="col">
          <div class="card h-100">
            <img src="img/<?= $row["gambar"]?>" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title"><?= $row["judul"]?></h5>
              <p class="card-text">
                <?= $row["isi"]?>
              </p>
            </div>
            <div class="card-footer">
              <small class="text-body-secondary">
                <?= $row["tanggal"]?>
              </small>
            </div>
          </div>
        </div>
        <?php
      }
      ?> 
    </div>
  </div>
</section>
<!-- article end -->
  <!--schedule begin-->
  <section id="schedule" class="text-center p-5">
    <div class="container">
      <h1 class="fw-bold display-4 pb-3">Schedule</h1>
      <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
        <div class="col">
          <div class="card h-100">
            <div class="card-footer"><small class="text-body-secondary">Senin</small></div>
            <div class="card-body">
              <h5 class="card-title">Logika Informatika</h5>
              <p class="card-text">8.40-10.20 | H.4.4</p>
              <h5 class="card-title">Etika Profesi</h5>
              <p class="card-text">12.30-14.10 | H.4.7</p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-100">
            <div class="card-footer"><small class="text-body-secondary">Selasa</small></div>
            <div class="card-body">
              <h5 class="card-title">Pemrograman Web</h5>
              <p class="card-text">9.00-10.40 | H.3.5</p>
              <h5 class="card-title">Sistem Basis Data</h5>
              <p class="card-text">13.00-15.00 | H.3.2</p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-100">
            <div class="card-footer"><small class="text-body-secondary">Rabu</small></div>
            <div class="card-body">
              <h5 class="card-title">Sistem Operasi</h5>
              <p class="card-text">10.20-12.00 | H.4.6</p>
              <h5 class="card-title">Probabilitas & Statistik</h5>
              <p class="card-text">14.00-16.00 | H.4.3</p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-100">
            <div class="card-footer"><small class="text-body-secondary">Kamis</small></div>
            <div class="card-body">
              <h5 class="card-title">Penambangan Data</h5>
              <p class="card-text">8.00-9.40 | H.4.8</p>
              <h5 class="card-title">Kriptografi</h5>
              <p class="card-text">11.00-12.40 | H.4.5</p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-100">
            <div class="card-footer"><small class="text-body-secondary">Jumat</small></div>
            <div class="card-body">
              <h5 class="card-title">Rekayasa Perangkat Lunak</h5>
              <p class="card-text">8.00-9.40 | H.5.5</p>
              <h5 class="card-title">Pancasila</h5>
              <p class="card-text">11.00-12.40 | H.4.5</p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-100">
            <div class="card-footer"><small class="text-body-secondary">Sabtu</small></div>
            <div class="card-body">
              <h5 class="card-title">Free</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--schedule end-->
  <!--gallery begin-->
  <section id="gallery" class="text-center p-5 bg-danger-subtle">
    <div class="container">
      <h1 class="fw-bold display-4 pb-3">Gallery</h1>
      <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="img/tabebuya.jpg" class="d-block w-100" alt="tabebuya">
          </div>
          <div class="carousel-item">
            <img src="img/tempo.jpg" class="d-block w-100" alt="tempo">
          </div>
          <div class="carousel-item">
            <img src="img/nad2.jpg" class="d-block w-100" alt="memories">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </button>
      </div>
    </div>
  </section>
  <!--gallery end-->
  <!--about me begin-->
  <section id="about" class="text-center p-5" style="background-color: #87CEFA;">
    <div class="container">
      <h1 class="fw-bold display-4 pb-3">About Me</h1>
      <div class="d-flex flex-column flex-md-row align-items-center justify-content-center">
        <div class="me-md-4">
          <img 
            id="profilePicture" 
            src="img/nad8.jpg" 
            alt="Profile Picture" 
            class="rounded-circle" 
            width="200" 
            style="cursor: pointer;"
          />
        </div>
        <div id="profileDescription" class="mt-3 mt-md-0 text-start">
          <h3>Nadila Meivika Rahmawati</h3>
          <p>A11.2023.15360<br>Program Studi Teknik Informatika<br>Universitas Dian Nuswantoro</p>
        </div>
      </div>
    </div>
  </section>
  <!--about me end-->
  <!--footer begin-->
  <footer class="text-center p-5">
    <div>
      <a href="https://www.instagram.com/meinadzz__/profilecard/?igsh=MXIxNm4yYTNtY2t3OA=="><i class="bi bi-instagram p-2 text-dark"></i></a>
      <a href="https://x.com/skyblueecy?t=LShHP5Y762oDAwxlxYGT0g&s=09"><i class="bi bi-twitter-x p-2 text-dark"></i></a>
      <a href="https://wa.me/+6281239147073"><i class="bi bi-whatsapp p-2 text-dark"></i></a>
    </div>
    <div>
      Nadila Meivika Rahmawati &copy; 2024
    </div>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // DARK MODE SWITCHER
    const darkModeToggle = document.getElementById("darkModeToggle");
    const darkModeIcon = document.getElementById("darkModeIcon");
  
    function enableDarkMode() {
      document.body.classList.add("dark-mode");
      document.querySelector("nav").classList.add("navbar-dark-mode");
      localStorage.setItem("darkMode", "enabled");
      darkModeIcon.classList.replace("bi-moon-fill", "bi-sun-fill");
    }
  
    function disableDarkMode() {
      document.body.classList.remove("dark-mode");
      document.querySelector("nav").classList.remove("navbar-dark-mode");
      localStorage.setItem("darkMode", "disabled");
      darkModeIcon.classList.replace("bi-sun-fill", "bi-moon-fill");
    }
  
    if (localStorage.getItem("darkMode") === "enabled") {
      enableDarkMode();
    } else {
      disableDarkMode();
    }
  
    darkModeToggle.addEventListener("click", () => {
      if (localStorage.getItem("darkMode") !== "enabled") {
        enableDarkMode();
      } else {
        disableDarkMode();
      }
    });
  
    // Waktu
    window.setTimeout("tampilWaktu()", 1000);
    function tampilWaktu(){
        var waktu = new Date();
        var bulan = waktu.getMonth() + 1;
  
        setTimeout("tampilWaktu", 1000);
        document.getElementById("tanggal").innerHTML = 
            waktu.getDate() + "/" + bulan + "/" + waktu.getFullYear();
        document.getElementById("jam").innerHTML = 
            waktu.getHours() + ":" + waktu.getMinutes() + ":" + waktu.getSeconds(); 
    }
    // Toggle visibility of the description
    const profilePicture = document.getElementById('profilePicture');
    const profileDescription = document.getElementById('profileDescription');

    profilePicture.addEventListener('click', () => {
      if (profileDescription.style.display === 'none' || profileDescription.style.display === '') {
        profileDescription.style.display = 'block';
      } else {
        profileDescription.style.display = 'none';
      }
    });
  </script>  
</body>
</html>
