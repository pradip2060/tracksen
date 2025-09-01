<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register - TRACK せん！</title>
  <link rel="stylesheet" href="../CSS/login.css"> <!-- Reuse shared styles -->
  <style>
    .register-container {
      max-width: 420px;
      width: 100%;
      padding: 2.5rem 2rem;
      background: var(--card-bg);
      border-radius: 16px;
      box-shadow: 0 2px 16px 0 rgba(0,0,0,0.06);
      display: flex;
      flex-direction: column;
      gap: 1.2rem;
      align-items: center;
    }

    .register-container h2 {
      margin-bottom: 0.8rem;
      color: var(--primary-main);
      font-size: 1.8rem;
      font-weight: bold;
    }

    .register-container form {
      width: 100%;
    }

    .form-group {
      margin-bottom: 1rem;
    }

    .form-group label {
      display: block;
      margin-bottom: 0.35rem;
      font-weight: 500;
      color: var(--text-primary);
    }

    .form-group input {
      width: 100%;
      padding: 10px;
      font-size: 1rem;
      border-radius: 7px;
      border: 1.5px solid var(--input-border);
      background: var(--input-bg);
      color: var(--text-color);
    }

    .form-group input:focus {
      outline: none;
      border-color: var(--primary-main);
    }

    .register-btn {
      width: 100%;
      padding: 12px;
      background: var(--button-bg);
      color: white;
      border: none;
      border-radius: 7px;
      font-size: 1rem;
      font-weight: 600;
      cursor: pointer;
      transition: background 0.2s;
    }

    .register-btn:hover {
      background: var(--button-hover-bg);
    }

    .login-link {
      margin-top: 1rem;
      font-size: 0.95rem;
      color: var(--text-secondary);
      text-align: center;
    }

    .login-link a {
      color: var(--primary-main);
      text-decoration: none;
      font-weight: 500;
    }

    .login-link a:hover {
      text-decoration: underline;
    }

    body {
      background: var(--bg-color);
      color: var(--text-color);
      font-family: 'Segoe UI', sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      padding: 2rem;
    }
  </style>
</head>
<body>

  <div class="register-container">
    <h2>Register</h2>
    <form action="add.php" method="POST" autocomplete="off">
      <div class="form-group">
        <label for="name">名前:</label>
        <input type="text" id="name" name="name" required>
      </div>

      <div class="form-group">
        <label for="email">メールアドレス:</label>
        <input type="email" id="email" name="email" required>
      </div>

      <div class="form-group">
        <label for="password">パスワード:</label>
        <input type="password" id="password" name="password" required>
      </div>

      <button type="submit" class="register-btn">登録</button>

      <div class="login-link">
        すでにアカウントをお持ちですか？ <a href="../login/index.php">ログインはこちら</a>
      </div>
    </form>
  </div>

</body>
</html>
