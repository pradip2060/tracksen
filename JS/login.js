// Show overlay on page load, hide after 1.5s
window.addEventListener('DOMContentLoaded', function() {
    setTimeout(() => {
        document.getElementById('loadingOverlay').style.opacity = '0';
        setTimeout(() => {
            document.getElementById('loadingOverlay').style.display = 'none';
        }, 500);
    }, 1500);
});

document.getElementById('loginForm').addEventListener('submit', function(e) {
  e.preventDefault();
  const email = document.getElementById('email').value;
  const password = document.getElementById('password').value;

  fetch('../php/login.php', {
    method: 'POST',
    headers: {'Content-Type': 'application/x-www-form-urlencoded'},
    body: `email=${encodeURIComponent(email)}&password=${encodeURIComponent(password)}`
  })
  .then(response => response.json())
  .then(data => {
    if (data.success) {
      window.location.href = "index.html";
    } else {
      document.getElementById('errorMsg').textContent = data.error || "ログインに失敗しました";
    }
  });
});
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