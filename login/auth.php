<?php
session_start();

// DB接続情報
$host = 'localhost';
$dbname = 'expenses';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("DB接続失敗: " . $e->getMessage());
}

// フォーム入力取得
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if($_SESSION['user']) {
    // すでにログインしている場合はセッションをクリア
    unset($_SESSION['user']);
}

// ユーザー検索（メールアドレスで検索）
$sql = "SELECT * FROM users WHERE email = :email";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':email', $email);
$stmt->execute();

$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user && password_verify($password, $user['password'])) {
    // 認証成功
    $_SESSION['user'] = $user['email'];
    header("Location: ../HTML/index.html");
    exit();
} else {
    // 認証失敗
    $_SESSION['error'] = "メールアドレスまたはパスワードが間違っています";
    header("Location: ./index.php");
    exit();
}

