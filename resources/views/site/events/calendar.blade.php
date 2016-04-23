@extends('site.master')
@section('content')
    <div id="calendar"></div>
    @stop

@section('scripts')



    <link rel="stylesheet" href="{{asset('admin/plugins/fullcalendar/fullcalendar.min.css')}}">
    <script src="{{asset('admin/plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('admin/plugins/fullcalendar/fullcalendar.min.js')}}"></script>
    <script>
        $(document).ready(function() {

            // page is now ready, initialize the calendar...

            $('#calendar').fullCalendar({
                // put your options and callbacks here
                events: '/events/calendar/ajax'
            })

        });
    </script>
    @stop

@section('sidebar')
    <h2>Calendar Events</h2>
    @stop