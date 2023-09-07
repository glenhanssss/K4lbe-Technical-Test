<?php
// Koneksi ke database (sama seperti di atas)

$conn = new mysqli("localhost", "root", "", "kalbe");

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $intCustomerID = $_POST["intCustomerID"];
    $intProductID = $_POST["intProductID"];
    $quantity = $_POST["quantity"];

    // Masukkan data pesanan ke tabel Penjualan
    $sql = "INSERT INTO Penjualan (intCustomerID, intProductID, dtSalesOrder, intQty) 
            VALUES ('$intCustomerID', '$intProductID', NOW(), '$quantity')";

    if ($conn->query($sql) === TRUE) {
        echo "Pemesanan berhasil.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Tutup koneksi (sama seperti di atas)
?>
