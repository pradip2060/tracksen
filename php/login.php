<?php
header("Content-Type: application/json");

// DB接続情報
$host = 'localhost';
$dbname = 'expenses';
$username = 'root';
$password = '';

// POSTデータを受け取る
$email = $_POST['email'] ?? '';
$passwordInput = $_POST['password'] ?? '';

// DB接続
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // ユーザーを探す
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindValue(':email', $email);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($passwordInput, $user['password'])) {
        // 認証成功
        echo json_encode(['success' => true]);
    } else {
        // 認証失敗
        echo json_encode(['success' => false, 'error' => 'メールアドレスまたはパスワードが間違っています']);
    }

} catch (PDOException $e) {
    echo json_encode(['success' => false, 'error' => 'データベース接続エラー: ' . $e->getMessage()]);
}
?>
