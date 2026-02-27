<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $layanan = $_POST['layanan'];
    $dokter  = $_POST['dokter'];
    $nama    = $_POST['nama'];
    $email   = $_POST['email'];
    $tanggal = $_POST['tanggal'];
    $jam     = $_POST['jam'];

    $stmt = $conn->prepare("INSERT INTO appointments 
        (layanan, dokter, nama, email, tanggal, jam) 
        VALUES (?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("ssssss", $layanan, $dokter, $nama, $email, $tanggal, $jam);

    if ($stmt->execute()) {
        echo "<script>
                alert('Janji berhasil dibuat!');
                window.location='index.html';
              </script>";
    } else {
        echo "Gagal menyimpan data: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>