<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Online Shop Kalbe</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px 0;
        }

        h1 {
            margin: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            font-size: 24px;
            margin-top: 20px;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 10px;
        }

        form {
            margin-top: 20px;
        }

        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <header>
        <h1>Selamat Datang di Kalbe Online Shop</h1>
    </header>
    
    <div class="container">
        <!-- Daftar Produk -->
        <h2>Daftar Produk</h2>
        <ul>
            <?php
            // Koneksi ke database
            $conn = new mysqli("localhost", "root", "", "kalbe");

            // Periksa koneksi
            if ($conn->connect_error) {
                die("Koneksi ke database gagal: " . $conn->connect_error);
            }

            // Ambil data produk dari tabel Produk
            $sql = "SELECT * FROM Produk";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<li>" . $row["txtProductName"] . " - Rp " . number_format($row["decPrice"], 2) . "</li>";
                }
            } else {
                echo "Tidak ada produk yang tersedia saat ini.";
            }

            // Tutup koneksi
            $conn->close();
            ?>
        </ul>
        
        <!-- Formulir Pemesanan -->
        <h2>Pesan Produk</h2>
        <form action="proses_pesanan.php" method="post">
            ID Pelanggan: <input type="text" name="intCustomerID" required><br>
            Produk yang Dipesan: 
            <select name="intProductID" required>
                <option value="1">Prenagen Mommy - Rp 12,000.00</option>
                <option value="2">Prenagen Daddy - Rp 10,000.00</option>
            </select><br>
            Jumlah yang Dipesan: <input type="number" name="quantity" min="1" required><br>
            <input type="submit" value="Pesan Sekarang">
        </form>
    </div>
</body>
</html>
