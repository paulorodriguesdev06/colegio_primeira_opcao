
document.addEventListener('DOMContentLoaded', function () {
    let calendarEl = document.getElementById('calendario');

    let calendar = new FullCalendar.Calendar(calendarEl, {
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        responsive: true,
        locale: 'pt-br',
        navLinks: true, // can click day/week names to navigate views
        selectable: true,
        selectMirror: true,
        editable: true,
        dayMaxEvents: true, // allow "more" link when too many events
        events: ''
    });

    calendar.render();
});