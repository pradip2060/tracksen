<?php
session_start();
if (isset($_SESSION['user'])) {
    // すでにログインしている場合はリダイレクト
    header("Location: ../HTML/");
    exit();
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ログインページ</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f6f6f6;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
            width: 300px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            width: 100%;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .error {
            color: red;
            text-align: center;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h2>ログイン</h2>

    <?php

    if (isset($_GET['error'])) {
        echo '<div class="error">' . htmlspecialchars($_GET['error']) . '</div>';
    }
    ?>

    <form action="auth.php" method="POST">
        <label for="email">メールアドレス:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">パスワード:</label>
        <input type="password" id="password" name="password" required>

        <input type="submit" value="ログイン">
    </form>
</div>

</body>
</html>
