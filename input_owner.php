<?php
session_start();
require 'koneksi.php';

$errorMsg = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['proses'])) {
    // validasi dan penyimpanan data
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Daftar Pengunjung</title>
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
    }
    form {
      background: #1e213a;
      padding: 30px 40px;
      border-radius: 12px;
      width: 320px;
      box-shadow:
        0 0 15px #00f0ffaa,
        inset 0 0 10px #00f0ff88;
      border-top: 4px solid #00f0ff;
      backdrop-filter: blur(10px);
      display: flex;
      flex-direction: column;
      gap: 12px;
    }
    h3 {
      text-align: center;
      color: #00f0ff;
      text-shadow: 0 0 10px #00f0ff;
      margin-bottom: 20px;
    }
    input[type="text"],
    input[type="email"],
    input[type="password"] {
      padding: 10px 12px;
      background: transparent;
      border: none;
      border-bottom: 2px solid #00f0ff;
      color: #00f0ff;
      font-size: 16px;
      transition: 0.3s ease;
      outline: none;
      box-shadow: none;
      width: 100%;
    }
    input[type="text"]:focus,
    input[type="email"]:focus,
    input[type="password"]:focus {
      border-bottom-color: #ff00ff;
      box-shadow: 0 0 8px #ff00ff;
      color: #ff00ff;
    }
    button {
      padding: 12px 0;
      background: linear-gradient(90deg, #00f0ff, #ff00ff);
      border: none;
      border-radius: 8px;
      color: #0f0f1a;
      font-weight: 700;
      font-size: 18px;
      cursor: pointer;
      box-shadow: 0 0 12px #ff00ffaa;
      transition: background 0.4s ease, box-shadow 0.4s ease;
    }
    button:hover {
      background: linear-gradient(90deg, #ff00ff, #00f0ff);
      box-shadow: 0 0 20px #00f0ffcc;
    }
    p {
      text-align: center;
      font-size: 14px;
      margin-top: 15px;
      color: #66e0ff;
    }
    p a {
      color: #ff00ff;
      font-weight: bold;
      text-decoration: none;
      transition: color 0.3s ease, text-shadow 0.3s ease;
    }
    p a:hover {
      color: #00f0ff;
      text-shadow: 0 0 8px #00f0ff;
    }
    p.error {
      color: #ff007f;
      font-weight: 700;
      text-shadow: 0 0 6px #ff007f;
    }
  </style>
</head>
<body>
  <form action="" method="post" novalidate>
    <h3>Form Registrasi</h3>
    <?php if ($errorMsg): ?>
      <p class="error"><?= htmlspecialchars($errorMsg) ?></p>
    <?php endif; ?>
    <input type="text"    name="username" placeholder="Username" required>
    <input type="text"    name="nama"     placeholder="Nama Lengkap" required>
    <input type="email"   name="email"    placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit" name="proses">Daftar</button>
    <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>
  </form>
</body>
</html>
