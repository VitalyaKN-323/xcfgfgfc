
<?php
require_once 'conect.php'
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизація</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .login-container h2 {
            margin-bottom: 20px;
        }
        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid rgb(163, 230, 125);
            border-radius: 5px;
            box-sizing: border-box;
        }
        .login-container button {
            width: 100%;
            padding: 10px;
            background-color: #3ce4d6;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .login-container button:hover {
            background-color: #52dac3;
        }
        .error-message {
            color: red;
            margin-top: 10px;
        }
        /* Ваші стилі */
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Авторизація</h2>
        <form id="login-form">
            <input type="text" id="username" placeholder="Логін" required>
            <input type="password" id="password" placeholder="Пароль" required>
            <button type="submit">Увійти</button>
        </form>
        <p class="error-message" id="error-message"></p>
    </div>

    <script>
        document.getElementById("login-form").addEventListener("submit", function(event) {
            event.preventDefault(); // Заборона автоматичного відправлення форми

            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;

            if (username === "root" && password === "root") {
                // Якщо авторизація успішна, перенаправляємо на іншу сторінку
                window.location.href = "sait.php";
            } else {
                // Виводимо повідомлення про помилку
                document.getElementById("error-message").innerText = "Неправильний логін або пароль";
            }
        });
    </script>
</body>
</html>
