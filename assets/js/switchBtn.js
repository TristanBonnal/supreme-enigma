// Light and dark mode, initial theme is applied by an inline script in base.html.twig to avoid flickering
const switchBtn = {
    init: function() {
        document.getElementById('switch').addEventListener('click', switchBtn.switchTheme);
    },

    switchTheme: function() {
        const isLight = document.documentElement.classList.toggle('light');
        localStorage.setItem('theme', isLight ? 'light' : 'dark');
    }
}

document.addEventListener("DOMContentLoaded", switchBtn.init);
