<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ad = $_POST['ad'] ?? '';
    $soyad = $_POST['soyad'] ?? '';
    $telefon = $_POST['telefon'] ?? '';
    $email = $_POST['email'] ?? '';
    $cinsiyet = $_POST['cinsiyet'] ?? '';
    $dogum = $_POST['dogumtarihi'] ?? '';
    $sehir = $_POST['sehir'] ?? '';
    $meslek = $_POST['meslek'] ?? '';
    $hobiler = $_POST['hobiler'] ?? [];
    $renk = $_POST['renk'] ?? '';
    $mesaj = $_POST['mesaj'] ?? '';
    $memnuniyet = $_POST['memnuniyet'] ?? '';

    echo "<h2>Gönderilen Bilgiler:</h2>";
    echo "Ad: " . htmlspecialchars($ad) . "<br>";
    echo "Soyad: " . htmlspecialchars($soyad) . "<br>";
    echo "Telefon: " . htmlspecialchars($telefon) . "<br>";
    echo "Email: " . htmlspecialchars($email) . "<br>";
    echo "Cinsiyet: " . htmlspecialchars($cinsiyet) . "<br>";
    echo "Doğum Tarihi: " . htmlspecialchars($dogum) . "<br>";
    echo "Şehir: " . htmlspecialchars($sehir) . "<br>";
    echo "Meslek: " . htmlspecialchars($meslek) . "<br>";

    echo "Hobiler: ";
    if (!empty($hobiler)) {
        echo implode(", ", array_map('htmlspecialchars', $hobiler));
    } else {
        echo "Yok";
    }
    echo "<br>";

    echo "Favori Renk: " . htmlspecialchars($renk) . "<br>";
    echo "Mesaj: " . nl2br(htmlspecialchars($mesaj)) . "<br>";
    echo "Memnuniyet Düzeyi: " . htmlspecialchars($memnuniyet) . "<br>";
} else {
    echo "Form gönderilmedi.";
}
?>
