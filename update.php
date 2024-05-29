<?php
// Assuming you have a database connection file
require_once 'conect.php';

$product_id = isset($_GET['id']) ? $_GET['id'] : null;
$product = null;

if ($product_id) {
    // Fetch product details from the database
    $query = "SELECT * FROM products WHERE id = '$product_id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $product = mysqli_fetch_assoc($result);
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update products</title>
</head>
<body>
    <h3>Update products</h3>
    <form action="updated.php" method="post">
    
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($product_id); ?>">
        <p>Назва</p>
        <input type="text" name="title" value="<?php echo htmlspecialchars($product['title']); ?>">
        <p>Ціна</p>
        <input type="number" name="price" value="<?php echo htmlspecialchars($product['price']); ?>">
        <p>Знижка</p>
        <input type="number" name="discount" value="<?php echo htmlspecialchars($product['discount']); ?>">
        <p>URL зображення</p>
        <input type="text" name="img_url" value="<?php echo htmlspecialchars($product['img_url']); ?>">
        <p>Опис</p>
        <textarea name="descr"><?php echo htmlspecialchars($product['descr']); ?></textarea>
        <p>Категорія</p>
        <input type="text" name="category" value="<?php echo htmlspecialchars($product['category']); ?>">
        <p>Термін придатності</p>
        <input type="text" name="expiry_date" value="<?php echo htmlspecialchars($product['expiry_date']); ?>">
        <p>Виробник</p>
        <input type="text" name="manufacturer" value="<?php echo htmlspecialchars($product['manufacturer']); ?>">
        <p>Склад</p>
        <input type="text" name="composition" value="<?php echo htmlspecialchars($product['composition']); ?>">
        <button type="submit">Update Product</button>
    </form>
</body>
</html>
