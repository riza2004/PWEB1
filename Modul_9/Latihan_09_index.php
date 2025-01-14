<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Web Template</title>
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

  <style>
    body {
      margin: 0; /* Menghilangkan margin default dari body */
    }

    .jumbotron-bg {
      background-image: url('https://fkom.uniku.ac.id/wp-content/uploads/2023/01/Header-Home.jpg');
      background-size: cover;
      background-position: center;
      color: white; /* Warna teks di jumbotron */
    }
  </style>
</head>

<body>
  <!-- Bagian Atas: Jumbotron dengan Latar Belakang Gambar -->
  <header class="jumbotron-bg text-white text-center py-5">
    <div class="container">
      <h1 class="display-4">Selamat Datang di Website Kami</h1>
      <p class="lead">Ini adalah contoh jumbotron dengan latar belakang gambar di bagian atas halaman.</p>
    </div>
  </header>

  <div class="container-fluid my-4">
    <div class="row">
      <!-- Bagian Kiri: Menu -->
      <?php include "Latihan_09_menu.php"; ?>

      <!-- Bagian Tengah: Artikel -->
      <main class="col-md-10">
        <article>
          <!-- Form Pencarian Alumni -->
          <form method="GET" action="cari_alumni.php" class="mb-4">
            <div class="form-group mb-3">
              <label for="nama">Nama:</label>
              <input type="text" class="form-control" id="nama" name="nama">
            </div>
            <div class="form-group mb-3">
              <label for="jurusan">Jurusan:</label>
              <input type="text" class="form-control" id="jurusan" name="jurusan">
            </div>
            <div class="form-group mb-3">
              <label for="tahun_lulus">Tahun Lulus:</label>
              <input type="number" class="form-control" id="tahun_lulus" name="tahun_lulus">
            </div>
            <button type="submit" class="btn btn-primary">Cari Alumni</button>
          </form>

          <?php
          extract($_GET);
          if (isset($menu)) {
              if ($menu == "home") {
                  @include "Latihan_09_home.php";
              } else if ($menu == "about") {
                  include "Latihan_09_about.php";
              } else if ($menu == "ralumni") {
                  include "Latihan_09_ralumni.php";
              } else if ($menu == "calumni") {
                  include "Latihan_09_calumni.php";
              } else if ($menu == "ualumni") {
                  include "Latihan_09_ualumni.php";
              } else if ($menu == "buku tamu") {
                  include "PostTest_bukuTamu.php";
              } else if ($menu == "bursa kerja") {
                  include "Tugas_BursaKerja.php";
              } else if ($menu == "penelusuran alumni") {
                include "Tugas_PenelusuranAlumni.php";
              }else {
                  //include "Latihan_09_home.php";
              }
          } 
          ?>
        </article>
      </main>
    </div>
  </div>

  <!-- Bagian Bawah: Footer -->
  <footer class="bg-dark text-white text-center py-4">
    <p>&copy; 2024 Website Kami. All rights reserved.</p>
  </footer>

  <!-- Bootstrap 5 JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>