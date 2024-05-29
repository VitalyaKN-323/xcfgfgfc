<?php
// Підключення до бази даних
require_once 'conect.php';

// Перевірка, чи були передані дані з форми
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Отримання даних з форми
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $position = $_POST['position'];

    // Вставка нового викладача в базу даних
    $sql = "INSERT INTO Teachers (first_name, last_name, email, subject, position) 
            VALUES ('$first_name', '$last_name', '$email', '$subject', '$position')";

    if (mysqli_query($conn, $sql)) {
        echo "Новий викладач успішно доданий";
    } else {
        echo "Помилка: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Закриття підключення до бази даних
    mysqli_close($conn);
}
?>
