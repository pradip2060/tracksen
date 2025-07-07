<?php
// データベース接続情報
$host = 'localhost';
$dbname = 'expenses'; // データベース名
$username = 'root';
$password = '';

// 入力データを取得
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$plainPassword = $_POST['password'] ?? '';

// バリデーション（最低限）
if (empty($name) || empty($email) || empty($plainPassword)) {
    die("すべての項目を入力してください。");
}

try {
    // DB接続
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // すでにメールアドレスが登録されているか確認
    $checkStmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE email = :email");
    $checkStmt->execute([':email' => $email]);
    if ($checkStmt->fetchColumn() > 0) {
        die("このメールアドレスはすでに登録されています。");
    }

    // パスワードをハッシュ化
    $hashedPassword = password_hash($plainPassword, PASSWORD_DEFAULT);

    // 登録処理
    $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
    $stmt->execute([
        ':name' => $name,
        ':email' => $email,
        ':password' => $hashedPassword
    ]);

    echo "登録が完了しました！";
    // header("Location: login.html"); // ログイン画面にリダイレクトする場合
} catch (PDOException $e) {
    die("データベースエラー: " . $e->getMessage());
}
