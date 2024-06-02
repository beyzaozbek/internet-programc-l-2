<?php
// Formdan gelen verileri al
$name = $_POST['name'];
$name = $_POST['username'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

// Veritabanı bağlantısı

$servername = "localhost";
$username = "kullanici_adi"; // MySQL kullanıcı adı
$password = "sifre"; // MySQL şifre
$dbname = "my_database"; // Oluşturduğunuz veritabanı adı

// MySQL veritabanına bağlanma
$conn = new mysqli($servername, $username, $password, $dbname);
;

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

// Veritabanından verileri al
$sql = "SELECT * FROM iletisim_formu";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Verileri tablo olarak görüntüle
    echo "<table><tr><th>ID</th><th>İsim</th><th>Email</th><th>Telefon</th><th>Mesaj</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["name"]. "</td><td>" . $row["email"]. "</td><td>" . $row["phone"]. "</td><td>" . $row["message"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "Veritabanında kaydedilmiş iletişim formu girdisi bulunmamaktadır.";
}
  
  // Bağlantıyı kapat
$conn->close();
?>
