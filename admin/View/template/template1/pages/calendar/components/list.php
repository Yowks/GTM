<link href="https://fullcalendar.io/releases/core/4.0.1/main.min.css" rel="stylesheet" />
<link href="https://fullcalendar.io/releases/daygrid/4.0.1/main.min.css" rel="stylesheet" />
<link href="https://fullcalendar.io/releases/timegrid/4.0.1/main.min.css" rel="stylesheet" />
<link href="https://fullcalendar.io/releases/list/4.0.1/main.min.css" rel="stylesheet" />

<script src="https://fullcalendar.io/releases/core/4.0.1/main.min.js"></script>

<script src="https://fullcalendar.io/releases/interaction/4.0.1/main.js"></script>
<script src="https://fullcalendar.io/releases/daygrid/4.0.1/main.js"></script>
<script src="https://fullcalendar.io/releases/timegrid/4.0.1/main.js"></script>
<script src="https://fullcalendar.io/releases/list/4.0.1/main.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
        plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list'],
        locale: 'Fr',
        navLinks: true,
      businessHours: true, // display business hours
      editable: true,
        buttonText: {
            today:    'aujourd\'hui',
            month:    'mois',
            week:     'semaine',
            day:      'jour',
            list:     'liste'
        },
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
        },
        events: [
            <?php
                foreach($booking -> getBookings() as $bk){
                    ?>
                        {
                            title: '<?=  '['.$bk['id_order'].'] '. $users -> getUser($bk['id_user'], 'first_name') .' '. $users -> getUser($bk['id_user'], 'name') .' a réservé '. $booking -> getProduct($bk['id_equipment'], 'name') ;?>',
                            start: '<?= $bk['start_date'] ;?>',
                            end: '<?= $bk['end_date'] ;?>',
                            rendering: 'color',
                            color: '#<?= substr(md5(rand()), 0, 6); ?>',
                            url: 'booking/view/<?= $bk['id_order'] ;?>',
                        },
                    <?php
                }
            ?>
        ],
        eventLimit: true,
        eventLimitText: ' caché(s)',
        });

        calendar.render();
    });
</script>