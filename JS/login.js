// Show overlay on page load, hide after 1.5s
window.addEventListener('DOMContentLoaded', function() {
    setTimeout(() => {
        document.getElementById('loadingOverlay').style.opacity = '0';
        setTimeout(() => {
            document.getElementById('loadingOverlay').style.display = 'none';
        }, 500);
    }, 1500);
});

document.getElementById('loginForm').onsubmit = function(e) {
    e.preventDefault();
    const login = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const errorMsg = document.getElementById('errorMsg');
    const allowedUsers = ['userP', 'userA', 'userS', '1111'];
    if (allowedUsers.includes(login) && password === '1111') {
        // Show overlay before redirect
        const overlay = document.getElementById('loadingOverlay');
        overlay.style.display = 'flex';
        overlay.style.opacity = '1';
        setTimeout(() => {
            window.location.href = 'index.html'; // Redirect to index.html after login
        }, 1200);
    } else {
        errorMsg.textContent = 'ログインIDまたはパスワードが間違っています。';
    }
};
function redirectWithAnimation(path) {
    const overlay = document.getElementById('loadingOverlay');
    overlay.style.display = 'flex';
    overlay.style.opacity = '1';
    setTimeout(() => {
        window.location.href = path;
    }, 1200);
}
// Theme toggle
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
// Load saved theme
(function() {
    const saved = localStorage.getItem('theme');
    if (saved) setTheme(saved);
})();