<html>
<head>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;700&display=swap" rel="stylesheet">
    <style>
body {
    margin: 0;
    padding: 20px;
    background: #0f0f1a;
    font-family: 'Orbitron', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    color: #00f0ff;
    min-height: 100vh;
}


h3 {
    text-align: center;
    font-size: 2rem;
    font-weight: 700;
    color: #00f0ff;
    text-shadow: 0 0 10px #00f0ff, 0 0 20px #00f0ff;
    margin-bottom: 30px;
}


table {
    width: 100%;
    border-collapse: collapse;
    background: #1e213a;
    border-radius: 12px;
    overflow: hidden;
    box-shadow:
        0 0 15px #00f0ffaa,
        inset 0 0 10px #00f0ff88;
    border-top: 4px solid #00f0ff;
    backdrop-filter: blur(10px);
}

table th {
    color: #00f0ff;
    font-size: 18px;
    padding: 15px 10px;
    text-align: center;
    text-shadow: 0 0 10px #00f0ff;
    background: linear-gradient(90deg, #00f0ff, #ff00ff);
    font-weight: 700;
    border-bottom: 2px solid #00f0ff;
}


table tr {
    transition: background-color 0.3s ease;
}

/* Hover baris */
table tr:hover {
    background-color: rgba(255, 0, 255, 0.15);
    cursor: pointer;
}

/* Sel tabel */
table td {
    padding: 12px 10px;
    text-align: center;
    border-bottom: 1px solid #00f0ff55;
    color: #66e0ff;
    font-weight: 500;
}


table td:not(:last-child) {
    border-right: 1px solid #00f0ff55;
}

/* Password diwarnai khusus */
table td:last-child {
    color: #ff00ff;
    font-weight: 700;
    font-family: monospace;
    letter-spacing: 2px;
}


table {
    max-height: 500px;
    display: block;
    overflow-x: auto;
}

table::-webkit-scrollbar {
    height: 8px;
}

table::-webkit-scrollbar-track {
    background: #0f0f1a;
}

table::-webkit-scrollbar-thumb {
    background: linear-gradient(90deg, #00f0ff, #ff00ff);
    border-radius: 10px;
}

@media screen and (max-width: 600px) {
    table th, table td {
        font-size: 14px;
        padding: 8px 5px;
    }
}
    </style>
</head>
<body>
<h3> Data Owner Properti</h3>
<table border="1">
    <tr>
        <th>No</th>
        <th>Nama Lengkap</th>
        <th>Username</th>
        <th>Tempat Lahir</th>
        <th>Tanggal Lahir</th>
        <th>Alamat</th>
        <th>Harga Jual Properti</th>
        <th>Jenis Properti</th>
        <th>Jenis Sertifikat</th>
        <th>Password</th>
    </tr>

<?php
include "koneksi.php";
$no=1;
$ambildata = mysqli_query($koneksi,"select * from `owner properti`");
while ($tampil = mysqli_fetch_array($ambildata)){
echo "
<tr>
    <td>$no</td>
    <td>$tampil[nama]</td>
    <td>$tampil[username]</td>
    <td>$tampil[tempat_lahir]</td>
    <td>$tampil[tanggal_lahir]</td>
    <td>$tampil[alamat]</td>
    <td>$tampil[harga_jual_rupiah]</td>
    <td>$tampil[jenis_properti]</td>
    <td>$tampil[jenis_sertifikat]</td>
    <td>$tampil[password]</td>
</tr>";
$no++;

}
?>
</table>
</body>
</html>