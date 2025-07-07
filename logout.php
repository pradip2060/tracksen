<?php
session_start();              // セッション開始（必須）
session_unset();              // セッション変数をすべて解除
session_destroy();            // セッション自体を破棄

// ログインページなどにリダイレクト
header("Location: login/");
exit;
