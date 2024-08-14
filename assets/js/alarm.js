const alarm = {
    init() {
        console.log("Alarm is ready");

        const alarmButtons = document.querySelectorAll('.alarm__button');
        alarmButtons.forEach(button => {
            button.addEventListener('click', this.handleAlarmButton);
        });
    },

    handleAlarmButton(e) {
        console.log(e.target.dataset.file)
        fetch('/alarm-trigger' + window.location.search + '&file=' + e.target.dataset.file)
            .then(response => response.json())
            .then(data => {
            console.log(data);
        });
    }
}

alarm.init();