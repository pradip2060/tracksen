<?php
session_start();
if (isset($_SESSION['user'])) {
    // すでにログインしている場合はリダイレクト
    header("Location: ../HTML/");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRACK せん！ Login</title>
    <link rel="stylesheet" href="../CSS/login.css">
</head>
<body>
    <button id="themeToggle" style="
        position: fixed;
        top: 1rem;
        right: 1rem;
        z-index: 10000;
        padding: 0.5rem 1rem;
        border-radius: 6px;
        border: none;
        background: var(--button-bg);
        color: #fff;
        cursor: pointer;
        font-weight: bold;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    ">🌙 ダークモード</button>
    <div id="loadingOverlay" style="
        position: fixed;
        top: 0; left: 0; width: 100vw; height: 100vh;
        background: rgba(255,255,255,0.9);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 9999;
        font-size: 2rem;
        color: #3498db;
        transition: opacity 0.5s;
    ">
        <div>
            <span class="loader" style="
                display: inline-block;
                width: 48px; height: 48px;
                border: 6px solid #3498db;
                border-top: 6px solid #fff;
                border-radius: 50%;
                animation: spin 1s linear infinite;
                margin-bottom: 1rem;
            "></span>
            <div>読み込み中...</div>
        </div>
    </div>
    <div id="main-content">
        <div class="image-container">
            <img src="../PHOTOS/logo.png" 
                alt="Logo" 
                style="width:100%;height:auto;object-fit:cover;border-radius:12px;">
        </div>
            <div class="login-container">
            <div class="logo">
                <h1>TRACK せん！</h1>
                <p>Team : HELLO WORLD</p>
            </div>
            <?php if (isset($_GET['error'])): ?>
    <div class="error-message" style="color:red; text-align:center;">
        <?php echo htmlspecialchars($_GET['error']); ?>
    </div>
<?php endif; ?>
            <form id="loginForm" autocomplete="off" action="auth.php" method="POST">
                <div class="error-message" id="errorMsg"></div>
                <div class="form-group">
                    <label for="email">メールアドレス</label>
                    <input type="email" id="email" name="email" placeholder="メールアドレスを入力" required>
                </div>
                <div class="form-group">
                    <label for="password">パスワード</label>
                    <input type="password" id="password" name="password" placeholder="パスワードを入力" required>
                </div>
                <div class="remember-me">
                    <input type="checkbox" id="remember">
                    <label for="remember">ログイン状態を保持する</label>
                </div>
                <button type="submit" class="login-button">ログイン</button>
            </form>
            <div class="social-login">
                <button type="button" class="social-btn google" onclick="redirectWithAnimation('google-auth.html')">
                    <img src="../PHOTOS/google.png" alt="Google">
                    Googleでログイン
                </button>
                <button type="button" class="social-btn phone" onclick="redirectWithAnimation('phone-auth.html')">
                    <img src="../PHOTOS/phone.png" alt="Phone">
                    電話番号でログイン
                </button>
                <button type="button" class="social-btn line" onclick="redirectWithAnimation('line-auth.html')">
                    <img src="../PHOTOS/LINE_Icon.png" alt="LINE">
                    LINEでログイン
                </button>
            </div>
        </div>
    </div>
    <footer class="custom-footer">
      @HELLO WORLD
    </footer>
    <style>
    .custom-footer {
      width: 100%;
      text-align: center;
      padding: 18px 0;
      background: linear-gradient(90deg, #4f8cff 0%, #6ee7b7 100%);
      color: #fff;
      font-family: 'Inter', 'Segoe UI', Arial, sans-serif;
      font-size: 1.1rem;
      letter-spacing: 2px;
      font-weight: 600;
      position: fixed;
      left: 0;
      bottom: 0;
      z-index: 1000;
      opacity: 0.96;
      box-shadow: 0 -2px 12px 0 rgba(79,140,255,0.08);
      transition: background 0.6s cubic-bezier(.4,0,.2,1), color 0.6s cubic-bezier(.4,0,.2,1), opacity 0.4s;
      user-select: none;
    }
    .custom-footer:hover {
      opacity: 1;
      background: linear-gradient(90deg, #6ee7b7 0%, #4f8cff 100%);
      color: #222;
    }
    </style>
    <script src="../JS/login.js"></script>
    <script>
  document.getElementById('loginForm').addEventListener('submit', function(e) {
    e.preventDefault();
    // ...your login AJAX or validation logic...
    // On success:
    window.location.href = "../HTML/index.html";
  });
</script>
</body>
</html>
