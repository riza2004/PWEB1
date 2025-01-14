<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $pesan = $_POST['pesan'];

    // Koneksi ke database
    $conn = new mysqli("localhost", "root", "", "db_buku tamu");

    // Periksa koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Query untuk menyimpan data
    $sql = "INSERT INTO buku_tamu (nama, email, pesan) VALUES ('$nama', '$email', '$pesan')";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>Pesan berhasil disimpan!</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
    }

    $conn->close();
}
?>

<h2>Buku Tamu</h2>
<form method="POST" action="">
    <div class="mb-3">
        <label for="nama" class="form-label">Nama:</label>
        <input type="text" class="form-control" id="nama" name="nama" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="mb-3">
        <label for="pesan" class="form-label">Pesan:</label>
        <textarea class="form-control" id="pesan" name="pesan" rows="5" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Kirim</button>
</form>