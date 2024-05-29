<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food-Store</title>
    <button onclick="window.location.href = 'addproduct.php';">Додати новий продукт</button>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }

        h1 {
            color: #3774ff;
            margin: 0;
        }

        .cards {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }

        .card {
            width: 250px;
            height: auto;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: 0.3s;
        }

        .card:hover {
            box-shadow: 0 0 20px rgba(255, 102, 51, 0.5);
        }

        .card__image {
            width: 100%;
            height: 200px;
            overflow: hidden;
        }

        .card__image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease-in-out;
        }

        .card:hover .card__image img {
            transform: scale(1.1);
        }

        .card__content {
            padding: 15px;
        }

        .card__title {
            font-size: 20px;
            margin-bottom: 10px;
            color: #414141;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .card__label {
            background-color: #ff6633;
            color: #fff;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .card__price {
            font-size: 18px;
            color: #606060;
        }

        .card__description {
            font-size: 14px;
            color: #707070;
            margin-top: auto;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
        }

        .card__button {
            margin-top: 10px;
            padding: 5px 10px;
            background-color: #3774ff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .card__button:hover {
            background-color: #2554a5;
        }
        .add-product-button {
            margin-bottom: 20px;
            padding: 10px 20px;
            background-color: #3774ff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .add-product-button:hover {
            background-color: #2554a5;
        }
    </style>

</head>
<body>
<div class="container">
    <h1></h1>
    
    <div class="wrapper" id="resultContainer"></div>

    <?php
    require_once 'conect.php'; // Підключення до бази даних

    if (isset($_GET['action']) && $_GET['action'] === 'products') {
        // Виведення списку продуктів
        $result = mysqli_query($conn, "SELECT * FROM products");
        if (mysqli_num_rows($result) > 0) {
            echo "<div class='cards'>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='card'>";
echo "<div class='card__top'>";
$img_src = $row["img"];
echo "<div class='card__image'><img src='" . $img_src . "' alt='" . $row["title"] . "'></div>"; // Тут змінено
echo "<div class='card__label'>" . $row["category"] . "</div>";
echo "</div>";
echo "<div class='card__bottom'>";
echo "<div class='card__prices'>";
echo "<div class='card__price card__price--discount'>" . $row["price"] . "</div>";
echo "</div>";
echo "<div class='card__title'>" . $row["title"] . "</div>";
echo "<p class='card__description'>" . $row["descr"] . "</p>";
echo "<p>Термін придатності: " . $row["expiry_date"] . "</p>";
echo "<p>Виробник: " . $row["manufacturer"] . "</p>";
echo "<p>Склад: " . $row["composition"] . "</p>";
echo "<button class='card__button' onclick='window.location.href=\"update.php?id=" . $row["id"] . "\"'>Редагувати</button>";
echo "</div>";
echo "</div>";

            }
            
            echo "</div>";
        } else {
            echo "<p>Немає продуктів для відображення</p>";
        }
    }
    




    ?>
</div>
<!-- JavaScript-код -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        sendRequest("sait.php?action=products");
    });

    // Функція для відправки запиту на сервер і отримання даних
    function sendRequest(url) {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    var resultContainer = document.getElementById("resultContainer");
                    resultContainer.innerHTML = xhr.responseText;
                    // Додатковий код для відображення повідомлень у консолі
                    console.log(xhr.responseText);
                } else {
                    console.error(xhr.statusText);
                }
            }
        };
        xhr.open("GET", url, true);
        xhr.send();
    }
</script>
</body>
</html>
