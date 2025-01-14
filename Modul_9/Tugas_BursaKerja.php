<?php
include 'Latihan_09_config.php'; // Koneksi ke database

// Tambahkan lowongan baru
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_job'])) {
    $posisi = htmlspecialchars(trim($_POST['posisi']));
    $perusahaan = htmlspecialchars(trim($_POST['perusahaan']));
    $lokasi = htmlspecialchars(trim($_POST['lokasi']));
    $deskripsi = htmlspecialchars(trim($_POST['deskripsi']));

    $stmt = $conn->prepare("INSERT INTO bursa_kerja (posisi, perusahaan, lokasi, deskripsi) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $posisi, $perusahaan, $lokasi, $deskripsi);

    if ($stmt->execute()) {
        echo "<div class='alert alert-success'>Lowongan berhasil ditambahkan!</div>";
    } else {
        echo "<div class='alert alert-danger'>Gagal menambahkan lowongan.</div>";
    }
    $stmt->close();
}

// Tampilkan lowongan
$result = $conn->query("SELECT * FROM bursa_kerja ORDER BY tanggal_posting DESC");
?>

<div class="container">
    <h2>Bursa Kerja</h2>
    <form method="POST" action="">
        <div class="mb-3">
            <label for="posisi" class="form-label">Posisi</label>
            <input type="text" class="form-control" id="posisi" name="posisi" required>
        </div>
        <div class="mb-3">
            <label for="perusahaan" class="form-label">Perusahaan</label>
            <input type="text" class="form-control" id="perusahaan" name="perusahaan" required>
        </div>
        <div class="mb-3">
            <label for="lokasi" class="form-label">Lokasi</label>
            <input type="text" class="form-control" id="lokasi" name="lokasi">
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4"></textarea>
        </div>
        <button type="submit" class="btn btn-primary" name="add_job">Tambah Lowongan</button>
    </form>
    <hr>
    <h3>Daftar Lowongan</h3>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='mb-3'>
                <h5>" . htmlspecialchars($row['posisi']) . "</h5>
                <p>Perusahaan: " . htmlspecialchars($row['perusahaan']) . "</p>
                <p>Lokasi: " . htmlspecialchars($row['lokasi']) . "</p>
                <p>Deskripsi: " . htmlspecialchars($row['deskripsi']) . "</p>
                <small>Diposting pada: " . $row['tanggal_posting'] . "</small>
            </div><hr>";
        }
    } else {
        echo "<p>Belum ada lowongan tersedia.</p>";
    }
    $conn->close();
    ?>
</div>