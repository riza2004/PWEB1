<h3>DAFTAR ALUMNI</h3>
<hr>
<a href="?menu=calumni" class="btn btn-primary mb-3">Tambah</a>
<?php
include 'Latihan_09_config.php';

$sql = "SELECT * FROM alumni";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='table table-bordered'>";
    echo "<tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Tahun Lulus</th>
            <th>Jurusan</th>
            <th>Foto</th>
            <th>Aksi</th>
          </tr>";
    
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["nama"] . "</td>";
        echo "<td>" . $row["tahun_lulus"] . "</td>";
        echo "<td>" . $row["jurusan"] . "</td>";
        echo "<td><img src='" . $row["foto"] . "' width='50'></td>";
        echo "<td>
                <a class='btn btn-warning' href='Latihan_09_index.php?menu=ualumni&id=" . $row["id"] . "'>Edit</a> |
                <a class='btn btn-danger' href='Latihan_09_dalumni.php?id=" . $row["id"] . "'>Hapus</a>
              </td>";
        echo "</tr>";
    }
    
    echo "</table>";
} else {
    echo "Tidak ada data";
}

$conn->close();
?>