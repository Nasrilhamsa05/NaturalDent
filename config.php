<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $layanan = $_POST['layanan'];
    $dokter  = $_POST['dokter'];
    $nama    = $_POST['nama'];
    $email   = $_POST['email'];
    $tanggal = $_POST['tanggal'];
    $jam     = $_POST['jam'];

    $query = "INSERT INTO appointments 
              (layanan, dokter, nama, email, tanggal, jam)
              VALUES 
              ('$layanan','$dokter','$nama','$email','$tanggal','$jam')";

    if (mysqli_query($conn, $query)) {
        echo "<script>
                alert('Janji berhasil dibuat!');
                window.location='index.php';
              </script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>