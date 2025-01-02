<?php
$file = 'alumni.csv';

session_start();

// Fungsi untuk membaca data dari file CSV
function readAlumniData($file) {
    $data = [];
    if (file_exists($file)) {
        $handle = fopen($file, 'r');
        while (($row = fgetcsv($handle)) !== false) {
            $data[] = $row;
        }
        fclose($handle);
    }
    return $data;
}

// Fungsi untuk menulis data ke file CSV
function writeAlumniData($file, $data) {
    $handle = fopen($file, 'w');
    foreach ($data as $row) {
        fputcsv($handle, $row);
    }
    fclose($handle);
}

// Mengelola Create
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['add'])) {
    $nim = $_POST['nim'];
    $name = $_POST['name'];
    $major = $_POST['major'];
    $year = $_POST['year'];

    $data = readAlumniData($file);
    $data[] = [$nim, $name, $major, $year];
    writeAlumniData($file, $data);

    echo "<div class='alert alert-success' role='alert'>Data berhasil ditambahkan!</div>";
}

// Mengelola Delete
if (isset($_POST['delete'])) {
    $index = $_POST['index'];
    $data = readAlumniData($file);
    unset($data[$index]);
    $data = array_values($data);
    writeAlumniData($file, $data);
    echo "<div class='alert alert-success' role='alert'>Data berhasil dihapus!</div>";
}
?>

<div class="container">
    <h1 class="text-center">Manajemen Data Alumni</h1>

    <!-- Formulir Create -->
    <div class="card mb-4">
        <div class="card-body">
            <h4>Tambah Data Alumni</h4>
            <form method="post" action="">
                <div class="form-group mb-2">
                    <label for="nim">NIM:</label>
                    <input type="text" class="form-control" id="nim" name="nim" required>
                </div>
                <div class="form-group mb-2">
                    <label for="name">Nama:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group mb-2">
                    <label for="major">Jurusan:</label>
                    <input type="text" class="form-control" id="major" name="major" required>
                </div>
                <div class="form-group mb-3">
                    <label for="year">Angkatan:</label>
                    <input type="number" class="form-control" id="year" name="year" required>
                </div>
                <button type="submit" class="btn btn-primary" name="add">Tambah Data</button>
            </form>
        </div>
    </div>

    <!-- Data Alumni -->
    <div class="card">
        <div class="card-body">
            <h4>Daftar Alumni</h4>
            <?php
            $data = readAlumniData($file);
            if (!empty($data)): ?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Jurusan</th>
                            <th>Angkatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $index => $alumnus): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($alumnus[0]); ?></td>
                                <td><?php echo htmlspecialchars($alumnus[1]); ?></td>
                                <td><?php echo htmlspecialchars($alumnus[2]); ?></td>
                                <td><?php echo htmlspecialchars($alumnus[3]); ?></td>
                                <td>
                                    <form method="post" action="" style="display:inline;">
                                        <input type="hidden" name="index" value="<?php echo $index; ?>">
                                        <button type="submit" class="btn btn-danger btn-sm" name="delete">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>Tidak ada data untuk ditampilkan.</p>
            <?php endif; ?>
        </div>
    </div>
</div>