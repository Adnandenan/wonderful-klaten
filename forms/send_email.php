<?php
// forms/send_email.php

// Konfigurasi email
$to = 'muhammadadnan1308@gmail.com'; 
$subject = 'Pesan Baru dari Website Wonderful Klaten';

// Mengambil data dari form
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$formSubject = $_POST['subject'] ?? '';
$message = $_POST['message'] ?? '';

// Validasi input
$errors = [];
if (empty($name)) $errors[] = 'Nama harus diisi';
if (empty($email)) $errors[] = 'Email harus diisi';
if (empty($formSubject)) $errors[] = 'Subjek harus diisi';
if (empty($message)) $errors[] = 'Pesan harus diisi';

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Format email tidak valid';
}

// Jika ada error, kirim respons error
if (!empty($errors)) {
    http_response_code(400);
    echo implode('<br>', $errors);
    exit;
}

// Membuat isi email
$emailBody = "
<html>
<head>
    <title>Pesan Kontak Baru</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #eee; }
        .header { background-color: #2c5282; color: white; padding: 10px; text-align: center; }
        .content { padding: 20px; }
        .detail { margin-bottom: 10px; }
        .label { font-weight: bold; color: #2c5282; }
    </style>
</head>
<body>
    <div class='container'>
        <div class='header'>
            <h2>Pesan Baru dari Website</h2>
        </div>
        <div class='content'>
            <div class='detail'><span class='label'>Nama:</span> $name</div>
            <div class='detail'><span class='label'>Email:</span> $email</div>
            <div class='detail'><span class='label'>Subjek:</span> $formSubject</div>
            <div class='detail'><span class='label'>Pesan:</span></div>
            <div style='background-color: #f9f9f9; padding: 15px; border-radius: 5px; margin-top: 10px;'>
                $message
            </div>
            <div style='margin-top: 20px; text-align: center; color: #888;'>
                Pesan ini dikirim melalui formulir kontak di website Geo.io
            </div>
        </div>
    </div>
</body>
</html>
";

// Headers untuk email HTML
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: $name <$email>" . "\r\n";
$headers .= "Reply-To: $email" . "\r\n";
$headers .= "X-Mailer: PHP/" . phpversion();

// Mengirim email
if (mail($to, $subject, $emailBody, $headers)) {
    echo 'success';
} else {
    http_response_code(500);
    echo 'Gagal mengirim pesan. Silakan coba lagi nanti.';
}
?>