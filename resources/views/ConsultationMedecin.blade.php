@extends('layouts.DashboardLayout')
@section('content')

    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
    <script>
        let events = {{Js::from($events)}}
        console.log(events)
      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
          headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridDay'
          },
          events:events,
          height: 600,
        });
        calendar.render();
      });

    </script>
  <body>
    <div id='calendar' style="margin-top: 15px;padding:2rem ;background-color:rgb(255, 255, 255);border-radius:6px" ></div>
  </body>

@endsection
