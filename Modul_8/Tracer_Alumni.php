<?php
// Lokasi file JSON untuk menyimpan data
$dataFile = 'alumni.json';

// Fungsi untuk membaca data dari file JSON
function readData() {
    global $dataFile;
    if (!file_exists($dataFile)) {
        file_put_contents($dataFile, json_encode([])); // Buat file jika belum ada
    }
    return json_decode(file_get_contents($dataFile), true);
}

// Fungsi untuk menulis data ke file JSON
function writeData($data) {
    global $dataFile;
    file_put_contents($dataFile, json_encode($data, JSON_PRETTY_PRINT));
}

// API handler
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];

    if ($action === 'add') {
        $name = $_POST['name'];
        $graduation_year = $_POST['graduation_year'];
        $job = $_POST['job'];

        $data = readData();
        $data[] = [
            'name' => $name,
            'graduation_year' => $graduation_year,
            'job' => $job,
        ];
        writeData($data);

        echo json_encode(["status" => "success"]);
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action'])) {
    $action = $_GET['action'];

    if ($action === 'get') {
        $data = readData();
        echo json_encode($data);
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tracer Alumni</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }

        .container {
            max-width: 600px;
            margin: 30px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        h1, h2 {
            text-align: center;
        }

        form {
            margin-bottom: 20px;
        }

        form input, form button {
            display: block;
            width: 100%;
            margin: 10px 0;
            padding: 10px;
            font-size: 16px;
        }

        form button {
            background: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }

        form button:hover {
            background: #0056b3;
        }

        #alumni-list {
            margin-top: 20px;
        }

        #alumni-list p {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            background: #f9f9f9;
            margin-bottom: 10px;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container">
        <h1>Tracer Alumni</h1>
        <form id="add-alumni-form">
            <input type="text" id="name" placeholder="Nama" required>
            <input type="number" id="graduation_year" placeholder="Tahun Lulus" required>
            <input type="text" id="job" placeholder="Pekerjaan" required>
            <button type="submit">Tambah Alumni</button>
        </form>
        <div id="alumni-list"></div>
    </div>

    <script>
        $(document).ready(function () {
            function fetchAlumni() {
                $.get('?action=get', function (data) {
                    const alumni = JSON.parse(data);
                    let listHTML = '<h2>Daftar Alumni</h2>';
                    alumni.forEach(a => {
                        listHTML += `<p>${a.name} - ${a.graduation_year} - ${a.job}</p>`;
                    });
                    $('#alumni-list').html(listHTML);
                });
            }

            $('#add-alumni-form').on('submit', function (e) {
                e.preventDefault();
                const name = $('#name').val();
                const graduationYear = $('#graduation_year').val();
                const job = $('#job').val();

                $.post('', { action: 'add', name, graduation_year: graduationYear, job }, function (response) {
                    const res = JSON.parse(response);
                    if (res.status === 'success') {
                        alert('Alumni berhasil ditambahkan!');
                        fetchAlumni();
                        $('#add-alumni-form')[0].reset();
                    } else {
                        alert('Gagal menambahkan alumni.');
                    }
                });
            });

            fetchAlumni();
        });
    </script>
</body>
</html>
