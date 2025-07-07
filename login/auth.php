<?php
session_start();

// DB接続情報
$host = 'localhost';
$dbname = 'expenses'; // データベース名
$user = 'root';
$pass = '';

try {
    // PDOを使ってDB接続
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("DB接続失敗: " . $e->getMessage());
}

// フォーム入力取得
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

// ユーザー検索
$sql = "SELECT * FROM users WHERE email = :email";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':email', $email);
$stmt->execute();

$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user && password_verify($password, $user['password'])) {
    // 認証成功
    $_SESSION['user'] = $user['email'];
    header("Location: ../HTML/");
    exit();
} else {
    header("Location: ./");
}
