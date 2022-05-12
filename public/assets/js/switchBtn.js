// Light and dark mode
const switchBtn = {
    init: function() {
        // Click on switch 
        const switchButton = document.getElementById('switch');
        switchButton.addEventListener('click', switchBtn.switchTheme);

        // Load previously set light mode on refresh
        const theme = localStorage.getItem('theme');
        if (theme == 'light') {
            for (element of switchBtn.themeElements) {
                element.classList.add('light');
            }
        }

    },

    //DOM elements we need to add a class to change css
    themeElements: [
        document.getElementById('switch'),
        document.querySelector(':root'),
        document.querySelector('.header')
    ],

    // Changing theme after verifying if light mode have been enable previously and then stocked in local storage
    switchTheme: function() {
        const theme = localStorage.getItem('theme');
        if (theme == 'light') {
            for (element of switchBtn.themeElements) {
                element.classList.remove('light');
            }
            localStorage.setItem('theme','dark')
        } else {
            for (element of switchBtn.themeElements) {
                element.classList.add('light');
            }
            localStorage.setItem('theme','light')
        }
    }
}

document.addEventListener("DOMContentLoaded", switchBtn.init);