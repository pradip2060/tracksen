// ページ読み込み時：ローディングオーバーレイを非表示に
window.addEventListener('DOMContentLoaded', function() {
    setTimeout(() => {
        const overlay = document.getElementById('loadingOverlay');
        overlay.style.opacity = '0';
        setTimeout(() => {
            overlay.style.display = 'none';
        }, 500);
    }, 1500);
});

// ページ遷移アニメーション（SNSログイン用）
function redirectWithAnimation(path) {
    const overlay = document.getElementById('loadingOverlay');
    overlay.style.display = 'flex';
    overlay.style.opacity = '1';
    setTimeout(() => {
        window.location.href = path;
    }, 1200);
}

// ダークモード切り替え
const themeToggle = document.getElementById('themeToggle');
function setTheme(theme) {
    document.documentElement.setAttribute('data-theme', theme);
    localStorage.setItem('theme', theme);
    themeToggle.textContent = theme === 'dark' ? '☀️ ライトモード' : '🌙 ダークモード';
}

themeToggle.onclick = () => {
    const current = document.documentElement.getAttribute('data-theme') || 'light';
    setTheme(current === 'dark' ? 'light' : 'dark');
};

// 保存されたテーマを読み込み
(function() {
    const saved = localStorage.getItem('theme');
    if (saved) setTheme(saved);
})();
