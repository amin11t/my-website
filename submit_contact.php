<?php
// إعداد الاتصال بقاعدة البيانات
$host = "localhost";
$db = "mediava_db";
$user = "root"; // غيّرها حسب إعداداتك
$pass = "";     // غيّرها حسب إعداداتك

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
  die("فشل الاتصال: " . $conn->connect_error);
}

// استقبال البيانات من الفورم
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$phone = $_POST['phone'] ?? '';
$message = $_POST['message'] ?? '';

if ($name && $email && $message) {
  $stmt = $conn->prepare("INSERT INTO messages (name, email, phone, message) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ssss", $name, $email, $phone, $message);
  $stmt->execute();
  $stmt->close();

  // إعداد بيانات البريد
  $to = "ameenasaad31@gmail.com"; // ضع هنا بريدك الإلكتروني
  $subject = "رسالة جديدة من موقع Mediava";
  $body = "الاسم: $name\nالبريد: $email\nالتليفون: $phone\n\nالرسالة:\n$message";
  $headers = "From: noreply@yourdomain.com\r\n";
  $headers .= "Content-Type: text/plain; charset=utf-8\r\n";

  // إرسال البريد
  @mail($to, $subject, $body, $headers);

  echo "تم إرسال رسالتك بنجاح!";
} else {
  echo "يرجى ملء جميع الحقول المطلوبة.";
}
$conn->close();
?> 