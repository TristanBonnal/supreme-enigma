const switchBtn = {
    init: function() {
        const switchButton = document.getElementById('switch');
        switchButton.addEventListener('click', switchBtn.switchTheme);
        const theme = localStorage.getItem('theme');
        if (theme == 'light') {
            switchBtn.addLight();
        }

    },
    switchTheme: function() {
        const theme = localStorage.getItem('theme');
        if (theme == 'light') {
            switchBtn.removeLight();
            localStorage.setItem('theme','dark')
        } else if (theme == 'dark') {
            switchBtn.addLight();
            localStorage.setItem('theme','light')
        }
    },

    addLight: function() {
        document.getElementById('switch').classList.add('light');
        document.querySelector(':root').classList.add('light');
        document.querySelector('.header').classList.add('light');
    },

    removeLight: function() {
        document.getElementById('switch').classList.remove('light');
        document.querySelector(':root').classList.remove('light');
        document.querySelector('.header').classList.remove('light');
    }
}

document.addEventListener("DOMContentLoaded", switchBtn.init);




