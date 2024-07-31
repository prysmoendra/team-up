<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toast Ui: Calendar</title>

    <!-- custom css file link -->
    <link rel="stylesheet" href="../../public/css/style.css">

    <!-- time-picker css Toast Ui -->
    <link rel="stylesheet" href="https://uicdn.toast.com/tui.time-picker/latest/tui-time-picker.css">
    <!-- <script src="../../node_modules/tui-time-picker/dist/tui-time-picker.min.css"></script> -->
    
    <!-- date-picker css Toast Ui -->
    <link rel="stylesheet" href="https://uicdn.toast.com/tui.date-picker/latest/tui-date-picker.css"/>
    <!-- <script src="../../node_modules/tui-date-picker/dist/tui-date-picker.min.css"></script> -->
    
    <!-- Toast Ui cdn css link -->
    <link rel="stylesheet" href="https://uicdn.toast.com/calendar/latest/toastui-calendar.min.css"/>
    <!-- <script src="../../node_modules/@toast-ui/calendar/dist/toastui-calendar.min.css"></script> -->
    
</head>
<body class="">
    <!-- // get the calendar -->
    <div id="calendar" class="container mx-auto h-screen"></div>
    
    <!-- // get date-picker -->
    <!-- <div class="tui-datepicker-input tui-datetime-input tui-has-focus">
        <input type="text" id="tui-date-picker-target" aria-label="Date-Time" />
        <span class="tui-ico-date"></span>
    </div>
    <div id="tui-date-picker-container" style="margin-top: -1px;"></div> -->

    <!-- // get time-picker -->
    <!-- <div id="tui-time-picker-container"></div> -->


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.js"></script>
    <script src="https://uicdn.toast.com/tui.code-snippet/latest/tui-code-snippet.js"></script>
    
    <!-- time-picker javascript Toast Ui -->
    <script src="https://uicdn.toast.com/tui.time-picker/latest/tui-time-picker.js"></script>
    <!-- <script src="../../node_modules/tui-time-picker/dist/tui-time-picker.min.js"></script> -->
    
    <!-- date-picker javascript Toast Ui -->
    <script src="https://uicdn.toast.com/tui.date-picker/latest/tui-date-picker.js"></script>
    <!-- <script src="../../node_modules/tui-date-picker/dist/tui-date-picker.min.js"></script> -->
    
    <!-- Toast Ui cdn javascript link -->
    <script src="https://uicdn.toast.com/calendar/latest/toastui-calendar.ie11.min.js"></script>
    <!-- <script src="../../node_modules/@toast-ui/calendar/dist/toastui-calendar.min.js" type="module"></script> -->
    <!-- Import as es module -->
    <!-- <script type="module" src="https://uicdn.toast.com/calendar/latest/toastui-calendar.mjs"></script> -->

    <script>

        // get the calendar
        const Calendar = tui.Calendar;
        /* ES6 module in Node.js environment */
        // import Calendar from '../../node_modules/@toast-ui/calendar';
        /* CommonJS in Node.js environment */
        // const Calendar = require('../../node_modules/@toast-ui/calendar');

        // get date-picker
        const DatePicker = tui.DatePicker;

        // get time-picker
        const TimePicker = tui.TimePicker;


        const container = document.getElementById('calendar');
        const calendar = new Calendar(container, {
            week: {
                startDayOfWeek: 1,
                // dayNames: ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', "Jum'at", 'Sabtu'],
                dayNames: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', "Friday", 'Saturday'],
            },
            defaultView: 'month',
            useFormPopup: true,
            useDetailPopup: true,
            useCreationPopup: true,
            // isReadOnly: true,
            usageStatistics: false,
            timezone: {
                // zones: [
                //     {
                //         timezoneName: 'Asia/Seoul',
                //         displayLabel: 'Seoul',
                //     },{
                //         timezoneName: 'Europe/London',
                //         displayLabel: 'London',
                //     },
                // ],
            },
            calendars: [
                {
                    id: 1,
                    name: 'Personal',
                    backgroundColor: '#03BD9E',
                },
                {
                    id: 2,
                    name: 'Work',
                    backgroundColor: '#00A9FF',
                },
                {
                    id: 3,
                    name: 'Holiday',
                    backgroundColor: '#F6FB7A',
                },
            ],
            theme: {
                common: {
                    gridSelection: {
                    backgroundColor: 'rgba(81, 230, 92, 0.05)',
                    border: '1px dotted #515ce6',
                    },
                },
            },
        });

        calendar.createEvents([
        {
            id: 1,
            calendarId: 2,
            title: 'Tuber Manajemen Data',
            start: '2024-07-07T09:00:00',
            end: '2024-07-23T10:00:00',
        },
        {
            id: 2,
            calendarId: 1,
            title: 'Tuber Rekayasa Perangkat Lunak',
            start: '2024-07-20T12:00:00',
            end: '2024-07-28T13:00:00',
        },
        {
            id: 3,
            calendarId: 3,
            title: 'Tuber Kecerdasan Buatan',
            start: '2024-07-25',
            end: '2024-07-27',
            isAllday: true,
            category: 'allday',
        },
        ]);

        // Registering an event
        calendar.on('beforeCreateEvent', (data) => {
            // console.log(`from: ${data.title}, ${data.start.toDateString()} to ${data.end.toDateString()}`);
            console.log(`from idEvent: ${data.id}, idCalendar: ${data.calendarId}, withTitle: ${data.title}, timeStart: ${data.start} to timeEnd: ${data.end}, isAllday: ${data.isAllday}, andTheCategory: ${data.category}`);
        });

        // calendar.fire('beforeCreateEvent', {
        //     title: 'Tuber Rekayasa Perangkat Lunak',
        //     start: new Date('2022-05-31'),
        //     end: new Date('2022-06-01'),
        // });
        // output: 'from Tue May 31 2022 to Wed Jun 01 2022'

        
        // Creating an event through Popup
        // calendar.createEvents([
        //     {
        //         id: '1',
        //         calendarId: 'cal1',
        //         title: 'timed event',
        //         body: 'TOAST UI Calendar',
        //         start: '2024-06-01T10:00:00',
        //         end: '2024-07-30T11:00:00',
        //         location: 'Meeting Room A',
        //         attendees: ['A', 'B', 'C'],
        //         category: 'time',
        //         state: 'Free',
        //         // isReadOnly: true,
        //         color: '#fff',
        //         backgroundColor: '#ccc',
        //         customStyle: {
        //             fontStyle: 'italic',
        //             fontSize: '15px',
        //         },
        //     }, // EventObject
        // ]);

        const timedEvent = calendar.getEvent('1', 'cal1'); // EventObject
            calendar.on('clickEvent', ({ event }) => {
            console.log(event); // EventObject
        });

    </script>
</body>
</html>