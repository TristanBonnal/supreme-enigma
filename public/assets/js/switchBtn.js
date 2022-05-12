const switchBtn = {
    init: function() {
        console.log('hello');
        const switchButton = document.getElementById('switch');
        switchButton.addEventListener('click', switchBtn.switchLight)

    },

    switchLight: function() {
        console.log('clic');
        document.getElementById('switch').classList.toggle('light');
        document.querySelector(':root').classList.toggle('light');
        document.querySelector('.header').classList.toggle('light');
    }
}

document.addEventListener("DOMContentLoaded", switchBtn.init);




