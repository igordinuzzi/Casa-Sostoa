document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.querySelector('.calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        plugins: ['dayGrid'],
        events: [
            // Add your event data here
            { title: 'Event 1', start: '2024-03-01' },
            { title: 'Event 2', start: '2024-03-02' }
        ]
    });
    calendar.render();
});
