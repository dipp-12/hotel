<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order</title>
<!--    <link href="assets/css/style.css" rel="stylesheet"/>-->
</head>
<body>


<?php
// membuat koneksi ke database
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'hotel';
$connect = mysqli_connect($host, $username, $password, $database);

// Mengambil data dari tabel
$sql = "SELECT * FROM pesanan";
$result = mysqli_query($connect, $sql);

if (mysqli_num_rows($result) > 0) {
    // Menampilkan data pada halaman hasil
    echo '<table>';
    echo '<tr><th>Nama Pemesan</th><th>Nomor Identitas</th><th>Jenis Kelamin</th><th>Tipe Kamar</th><th>Tanggal Pesan</th><th>Durasi Penginapan</th><th>Termasuk Breakfast</th><th>Discount</th><th>Total Bayar</th></tr>';
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $row['Nama Pemesan'] . '</td>';
        echo '<td>' . $row['Nomor Identitas'] . '</td>';
        echo '<td>' . $row['Jenis Kelamin'] . '</td>';
        echo '<td>' . $row['Tipe Kamar'] . '</td>';
        echo '<td>' . $row['Tanggal Pesan'] . '</td>';
        echo '<td>' . $row['Durasi Penginapan'] . '</td>';
        echo '<td>' . $row['Termasuk Breakfast'] . '</td>';
        echo '<td>' . $row['Discount'] . '</td>';
        echo '<td>' . $row['Total Bayar'] . '</td>';
        echo '</tr>';
    }
    echo '</table>';
} else {
    echo "Data tidak ditemukan";
}


?>

<div style="width: 800px;margin: 0px auto;">
    <canvas id="myChart"></canvas>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>

<!--Menambahkan script untuk membuat chart-->
<script>
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Standar", "Deluxe", "Premium"],
            datasets: [{
                label: '',
                data: [
                    <?php
                    $jumlah_standar = mysqli_query($connect, "select * from pesanan where `Tipe Kamar`='standar'");
                    echo mysqli_num_rows($jumlah_standar);
                    ?>,
                    <?php
                    $jumlah_deluxe = mysqli_query($connect, "select * from pesanan where `Tipe Kamar`='deluxe'");
                    echo mysqli_num_rows($jumlah_deluxe);
                    ?>,
                    <?php
                    $jumlah_family = mysqli_query($connect, "select * from pesanan where `Tipe Kamar`='family'");
                    echo mysqli_num_rows($jumlah_family);
                    ?>,
                ],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 99, 100, 0.2)',
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(255,99,100,1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
</body>
</html>
