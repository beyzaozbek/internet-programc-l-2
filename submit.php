<?php
// Formdan gelen verileri al
$name = $_POST['name'];
$name = $_POST['username'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

// Veritabanı bağlantısı
$servername = "localhost";
$username = "kullanici_adi"; // Veritabanı kullanıcı adı
$password = "sifre"; // Veritabanı şifresi
$dbname = "veritabani_adi"; // Veritabanı adı

// Veritabanı bağlantısını oluştur
$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantıyı kontrol et
if ($conn->connect_error) {
    die("Veritabanına bağlanılamadı: " . $conn->connect_error);
}

// Verileri veritabanına ekle
$sql = "INSERT INTO iletisim_formu (name, email, phone, message)
VALUES ('$name' 'username', '$email', '$phone', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "Mesajınız başarıyla gönderildi!";
} else {
    echo "Hata: " . $sql . "<br>" . $conn->error;
}

// Bağlantıyı kapat
$conn->close();
?>
