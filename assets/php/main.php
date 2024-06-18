<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotel";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Dijalankan ketika tombol simpan ditekan
if (isset($_POST['simpan'])) {
    // Get the data from the form
    $namaPemesan = $_POST['namaPemesan'];
    $jenisKelamin = $_POST['jenisKelamin'];
    $nomorIdentitas = $_POST['nomorIdentitas'];
    $tipeKamar = $_POST['tipeKamar'];
    $tanggalPesan = $_POST['tanggalPesan'];
    $durasiMenginap = $_POST['durasiMenginap'] . " hari";
    $termasukBreakfast = isset($_POST['breakfast']) ? 'Ya' : 'Tidak';
    $totalBayar = $_POST['totalBayar'];

    if ($durasiMenginap >= 3) {
        $diskon = '10%';
    } else {
        $diskon = '0%';
    }

    // Menyiapkan query untuk input data
    $sql = "INSERT INTO pesanan (`Nama Pemesan`, `Nomor Identitas`, `Jenis Kelamin`, `Tipe Kamar`, `Tanggal Pesan`, `Durasi Penginapan`, `Termasuk Breakfast`, `Discount`, `Total Bayar`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        // Memasukkan data ke dalam query
        $stmt->bind_param("sisssssss", $namaPemesan, $nomorIdentitas, $jenisKelamin, $tipeKamar, $tanggalPesan, $durasiMenginap, $termasukBreakfast, $diskon, $totalBayar);

        if ($stmt->execute()) {
            header("Location: ../../index.html");
        } else {
            echo "ERROR: Could not execute query: $sql. " . $conn->error;
        }
    } else {
        echo "ERROR: Could not prepare query: $sql. " . $conn->error;
    }

    // Menutup statement
    $stmt->close();

    // Menutup koneksi
    $conn->close();
}
?>