<?php
session_start();
require 'koneksi.php';

if (isset($_SESSION['username'])) {
    header('Location: home.php');
    exit;
}

$error = '';
$justRegistered = isset($_GET['registered']);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['proseslog'])) {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    if ($username === '' || $password === '') {
        $error = 'Username dan password wajib diisi.';
    } else {
        // Ambil password langsung (plaintext)
        $stmt = $koneksi->prepare("
            SELECT password
              FROM pengunjung_wonderful
             WHERE username = ?
             LIMIT 1
        ");
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows === 1) {
            $stmt->bind_result($db_password);
            $stmt->fetch();

            // Bandingkan langsung tanpa hash
            if ($password === $db_password) {
                session_regenerate_id(true);
                $_SESSION['username'] = $username;
                header('Location: home.php');
                exit;
            } else {
                $error = 'Username atau password salah.';
            }
        } else {
            $error = 'Username atau password salah.';
        }
        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Login</title>
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
    /* Container form */
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
    }

    /* Judul form */
    table th {
      color: #00f0ff;
      font-size: 24px;
      padding-bottom: 15px;
      text-align: center;
      text-shadow: 0 0 10px #00f0ff;
    }

    /* Label kolom kiri */
    table td:first-child {
      color: #66e0ff;
      font-weight: 600;
      padding-right: 15px;
      vertical-align: middle;
      width: 110px;
    }

    /* Input teks dan password */
    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 10px 12px;
      background: transparent;
      border: none;
      border-bottom: 2px solid #00f0ff;
      color: #00f0ff;
      font-size: 16px;
      transition: 0.3s ease;
      outline: none;
      box-shadow: none;
    }

    /* Efek fokus input */
    input[type="text"]:focus,
    input[type="password"]:focus {
      border-bottom-color: #ff00ff;
      box-shadow: 0 0 8px #ff00ff;
      color: #ff00ff;
    }

    /* Container tombol dan link daftar */
    .submit-daftar-container {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-top: 10px;
      gap: 10px;
    }

    /* Tombol submit */
    .submit-daftar-container button {
      flex-shrink: 0;
      padding: 12px 30px;
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

    /* Hover tombol */
    .submit-daftar-container button:hover {
      background: linear-gradient(90deg, #ff00ff, #00f0ff);
      box-shadow: 0 0 20px #00f0ffcc;
    }

    /* Link daftar */
    .submit-daftar-container .daftar-link {
      margin: 0;
      color: #66e0ff;
      font-size: 14px;
      white-space: nowrap;
    }

    .submit-daftar-container .daftar-link a {
      color: #ff00ff;
      font-weight: bold;
      text-decoration: none;
      transition: color 0.3s ease, text-shadow 0.3s ease;
    }

    .submit-daftar-container .daftar-link a:hover {
      color: #00f0ff;
      text-shadow: 0 0 8px #00f0ff;
    }

    /* Pesan error */
    p {
      color: #ff007f;
      font-weight: 700;
      text-align: center;
      margin-top: 15px;
      text-shadow: 0 0 6px #ff007f;
    }
  </style>
</head>
<body>
  <?php if ($justRegistered): ?>
    <p style="color:green;">Registrasi berhasil! Silakan login.</p>
  <?php endif; ?>
  <?php if ($error): ?>
    <p><?= htmlspecialchars($error) ?></p>
  <?php endif; ?>

  <form action="" method="POST">
    <input type="text" name="username" placeholder="Username" required autofocus><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <div class="submit-daftar-container">
      <button type="submit" name="proseslog">Login</button>
      <p class="daftar-link">Belum punya akun? <a href="input_owner.php">Daftar di sini</a></p>
    </div>
  </form>
</body>
</html>
