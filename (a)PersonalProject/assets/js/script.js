
document.addEventListener('DOMContentLoaded', function () {

    const checkIn = document.getElementById('check_in');
    const checkOut = document.getElementById('check_out');

    if (checkIn && checkOut) {

        const today = new Date();
        const localToday = new Date(
            today.getTime() - today.getTimezoneOffset() * 60000
        ).toISOString().split('T')[0];

        checkIn.min = localToday;
        checkOut.min = localToday;

        checkIn.addEventListener('change', function () {

            checkOut.min = checkIn.value || localToday;

            if (
                checkOut.value &&
                checkOut.value <= checkIn.value
            ) {
                checkOut.value = '';
            }

        });

    }

});
