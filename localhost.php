<?php
// Підключення до бази даних MySQL
$servername = "localhost"; // Адреса сервера баз даних (зазвичай localhost)
$username = "root"; // Ім'я користувача
$password = ""; // Пароль (залиште порожнім, якщо пароль не встановлений)
$database = "kuchta"; // Назва вашої бази даних

// Підключення до бази даних
$conn = new mysqli($servername, $username, $password, $database);

// Перевірка підключення
if ($conn->connect_error) {
    die("Помилка підключення: " . $conn->connect_error);
}

// Ваші SQL-запити та обробка результатів

// Закриття підключення до бази даних
$conn->close();
?>
