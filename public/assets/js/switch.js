console.log('hello');
const switchButton = document.getElementById('switch');
switchButton.onclick = function() {
    switchButton.classList.toggle('light');
    document.querySelector(':root').classList.toggle('light');
    document.querySelector('.header').classList.toggle('light');
}


