<h1>Informasi Alumni</h1>
<?php
// Deklarasi Variabel 
$namaAlumni = "Dede Irawan"; 
$tahunKelulusan = 2005; 
$statusAktif = true; 
$jumlahLulusan5Tahun = 300 ; 
$tahunSekarang = @date("Y");
//Operator Aritmatika
$lamaKelulusan = $tahunSekarang - $tahunKelulusan; 
$rasioAlumni = $jumlahLulusan5Tahun / 150; // Misalkan 150 adalah total alumni
echo "<p>Lama Kelulusan: $lamaKelulusan tahun</p>";
// Operator Penugasan dan Perbandingan
$jumlahAlumni = 120 ; 
$jumlahAlumni += 10 ; 
if ($jumlahAlumni >= 130 ) { 
    echo "<p>Jumlah alumni sudah mencukupi untuk acara reuni.</p>"; 
}
// Operator Logika 
if ($statusAktif && $lamaKelulusan <= 5) {
echo "<p>$namaAlumni adalah alumni aktif dan lulus dalam 5 tahun terakhir </ p >";
} else { 
    echo "<p>$namaAlumni adalah alumni tidak aktif atau lulus lebih dari 5 tahun yang lalu. </p >" ; 
}
// Manipulasi String
echo "<p>Nama Lengkap: $namaAlumni</p>"; 
echo "<p>Nama dalam Huruf Besar:" .strtoupper($namaAlumni). "</p>"; 
echo "<p>Nama dalam Huruf Kecil: " .strtolower($namaAlumni). "</p>";
$initials = substr($namaAlumni, 0, 1).substr($namaAlumni, strpos($namaAlumni, " ") + 1, 1); 
echo "<p>Inisial: $initials</p>";
?>