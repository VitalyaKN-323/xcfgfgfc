<?php
require_once 'conect.php';

$id = $_POST['id'];
$title = $_POST['title'];
$price = $_POST['price'];
$discount = $_POST['discount'];
$descr = $_POST['descr'];
$category = $_POST['category'];
$expiry_date = $_POST['expiry_date'];
$manufacturer = $_POST['manufacturer'];
$composition = $_POST['composition'];
$img = isset($_POST['img_url']) ? $_POST['img_url'] : null; // Отримуємо URL-адресу зображення

// Оновлення інших даних продукту в базі даних
$query = "UPDATE `products` SET 
    `title` = ?, 
    `price` = ?, 
    `discount` = ?, 
    `descr` = ?, 
    `category` = ?, 
    `expiry_date` = ?, 
    `manufacturer` = ?, 
    `composition` = ?, 
    `img` = ?
    WHERE `id` = ?";

$stmt = $conn->prepare($query);
$stmt->bind_param('sdissssssi', $title, $price, $discount, $descr, $category, $expiry_date, $manufacturer, $composition, $img, $id);

if ($stmt->execute()) {
    header('Location: sait.php');
    exit();
} else {
    die('Помилка оновлення запису: ' . $stmt->error);
}
?>
