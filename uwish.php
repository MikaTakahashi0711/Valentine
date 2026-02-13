<?php
// Koneksi ke database (sesuaikan dengan settingmu)
$host = "sql208.infinityfree.com";
$username = "if0_41153155"; // Ganti dengan username DB-mu
$password = "lvpSi8MP9zf"; // Ganti dengan password DB-
$dbname = "if0_41153155_valentine_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari form dan sanitasi
$pesan = trim($_POST['pesan']);

// Gunakan prepared statement untuk keamanan
$stmt = $conn->prepare("INSERT INTO wish (pesan) VALUES (?)");
if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}
$stmt->bind_param("s", $pesan);

if ($stmt->execute()) {
    echo "<script>alert('Ucapan berhasil dikirim!'); window.location.href='wish.html';</script>";
} else {
    echo "Error saat insert: " . $stmt->error . "<br>Periksa tabel dan kolom.";
}

$stmt->close();
$conn->close();
?>