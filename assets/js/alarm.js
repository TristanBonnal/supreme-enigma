const alarm = {
    init() {
        console.log("Alarm is ready");

        const alarmButton = document.querySelector('.alarm__button');
        alarmButton.addEventListener('click', this.handleAlarmButton);
    },

    handleAlarmButton() {
        fetch('/alarm-trigger').
        then(response => response.json()).
        then(data => {
            console.log(data);
        });
    }
}

alarm.init();