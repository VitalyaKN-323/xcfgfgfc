<?php
$servername = "localhost"; // Ім'я сервера бази даних (зазвичай localhost)
$username = "root"; // Ім'я користувача бази даних
$password = ""; // Пароль користувача бази даних (якщо немає пароля, залиште порожнім)
$database = "kuchta"; // Назва бази даних

// Підключення до бази даних
$conn = new mysqli($servername, $username, $password, $database);

// Перевірка підключення
if ($conn->connect_error) {
    die("Помилка підключення до бази даних: " . $conn->connect_error);
}

// Функція для отримання списку продуктів з бази даних
function getProductsList() {
    global $conn;
    $products = array();

    // Запит до бази даних для вибору усіх записів з таблиці products
    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);

    // Перевірка результату запиту
    if ($result->num_rows > 0) {
        // Виведення даних кожного рядка
        while($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
    }

    return $products;
}

// Закриття з'єднання з базою даних
//$conn->close(); // Не закриваємо з'єднання, оскільки ми можемо використовувати його у інших частинах програми
?>
