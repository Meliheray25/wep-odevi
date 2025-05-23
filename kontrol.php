<?php
// Sabit kullanıcı bilgileri (örnek)
$dogru_email = "b2412100001@sakarya.edu.tr";
$dogru_sifre = "b2412100001";

// Formdan gelen değerleri al
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$sifre = isset($_POST['password']) ? trim($_POST['password']) : '';

// Kontrol yap
if ($email === $dogru_email && $sifre === $dogru_sifre) {
    // E-posta adresinden öğrenci numarasını al (domain olmadan)
    $ogrenci_no = strstr($email, '@', true);

    echo "Hoşgeldiniz $ogrenci_no";
} else {
    // Giriş başarısız, login sayfasına geri yönlendir
    header("Location: login.html");
    exit;
}
?>
