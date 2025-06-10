<?php
include "session.php";
include "koneksi.php";
?>
<html>
<head>
    <style>
        body {
    margin: 0;
    padding: 0;
    background: #0f0f1a;
    font-family: 'Orbitron', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    color: #00f0ff;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
}

/* Container paragraf */
p {
    background: #1e213a;
    padding: 30px 40px;
    border-radius: 12px;
    box-shadow:
        0 0 15px #00f0ffaa,
        inset 0 0 10px #00f0ff88;
    border-top: 4px solid #00f0ff;
    max-width: 400px;
}

/* Teks Halo */
p b {
    color: #ff00ff;
    font-weight: 900;
    text-shadow: 0 0 8px #ff00ff;
}

/* Tautan Logout */
p a {
    color: #00f0ff;
    font-weight: 700;
    text-decoration: none;
    margin-left: 5px;
    transition: color 0.3s ease, text-shadow 0.3s ease;
}

p a:hover {
    color: #ff00ff;
    text-shadow: 0 0 12px #ff00ff;
}
    </style>
</head>
<body>
<p>

Halo, selamat datang<b><?php echo $_SESSION['username']; ?></b><br>
Silahkan<a href="index.html"><b>klik</b>untuk kembali ke beranda
</p>
</body>
</html>