// start: DROPDOWN MENU
var arrow_list = document.getElementById('arrow_list');
var list_submenu = document.getElementById('list_submenu');
var list_group = document.getElementById('list_group');
var submenu_group = document.getElementById('submenu_group');
var option_profile = document.getElementById('more_option');

const modalBackdrop = document.getElementById('modalBackdrop');
const eventDetailsModal = document.getElementById('event-details-modal');

function showModal() {
    // modalBackdrop.classList.remove('hidden');
    eventDetailsModal.classList.remove('hidden');
    eventDetailsModal.classList.remove('opacity-0');
}
function hideModal() {
    // modalBackdrop.classList.add('hidden');
    eventDetailsModal.classList.add('hidden');
    eventDetailsModal.classList.add('opacity-0');
}

// const optionDetails = document.getElementById('event-detail');

// function showOptions() {
//     optionDetails.classList.remove('hidden');
//     optionDetails.classList.remove('opacity-0');
// }
// function hideOptions() {
//     optionDetails.classList.add('hidden');
//     optionDetails.classList.add('opacity-0');
// }



function dropdownMenu() {
    arrow_list.classList.toggle('rotate-0');
    list_submenu.classList.toggle('hidden');
}
dropdownMenu()

function dropdownGroup() {
    list_group.classList.toggle('rotate-0');
    submenu_group.classList.toggle('hidden');
}
dropdownGroup()

function optionProfile() {
    option_profile.classList.toggle('hidden');
}
optionProfile()
// end: DROPDOWN MENU


// start: FULL CALENDAR

// document.addEventListener('DOMContentLoaded', function() {
//     const calendarEl = document.getElementById('calendar')
//     const calendar = new FullCalendar.Calendar(calendarEl, {
//         initialView: 'timeGridWeek',
//         headerToolbar: {
//             left: 'prev,next today',
//             center: 'title',
//             right: 'dayGridMonth,dayGridWeek,list',
//         },
//     })
//     calendar.render()
// })

var calendar;
var Calendar = FullCalendar.Calendar;
var events = [];

$(function() {
    if (!!scheds) {
        Object.keys(scheds).map(k => {
            var row = scheds[k]
            events.push({ 
                id: row.id, 
                title: row.title, 
                start: row.start_datetime, 
                end: row.end_datetime,
                color: row.color
            });
        })
    }
    var date = new Date()
    var d = date.getDate(),
        m = date.getMonth(),
        y = date.getFullYear()

    calendar = new Calendar(document.getElementById('calendar'), {
        headerToolbar: {
            left: 'prev,next today',
            right: 'dayGridMonth,dayGridWeek,list',
            center: 'title',
        },
        selectable: true,
        // themeSystem: 'bootstrap',
        // initialView: 'timeGridWeek',
        //Random default events
        events: events,
        eventClick: function(info) {
            var _details = $('#event-details-modal')
            // var _eventDetail = $('#event-detail')
            var id = info.event.id
            
            if (!!scheds[id]) {
                _details.find('#title').text(scheds[id].title)
                _details.find('#description').text(scheds[id].description)
                _details.find('#start').text(scheds[id].sdate)
                _details.find('#end').text(scheds[id].edate)
                _details.find('#edit,#delete').attr('data-id', id)
                showModal()
                
                // _details.removeClass('hidden opacity-0').addClass('block opacity-100')

                // _details.on('click', function() {
                //     $('#event-details-modal').removeClass('block opacity-100').addClass('hidden opacity-0');
                //     // $('#event-detail').removeClass('invisible').addClass('visible')
                // })
                // _details.attr('for', 'form-side-modal')

            } else {
                alert("Event is undefined");
            }
        },
        eventDidMount: function(info) {
            // Do Something after events mounted
        },
        editable: true
    });

    calendar.render();

    // Form reset listener
    $('#schedule-form').on('reset', function() {
        $(this).find('input:hidden').val('')
        $(this).find('input:visible').first().focus()
    })

    // Edit Button
    $('#edit').click(function() {
        var id = $(this).attr('data-id')
        
        if (!!scheds[id]) {
            var _form = $('#schedule-form')
            console.log(String(scheds[id].start_datetime), String(scheds[id].start_datetime).replace(" ", "\\t"))

            // console.log(scheds[id].title)
            _form.find('[name="id"]').val(id)
            _form.find('[name="title"]').val(scheds[id].title)
            _form.find('[name="description"]').val(scheds[id].description)
            _form.find('[name="start_datetime"]').val(String(scheds[id].start_datetime).replace(" ", "T"))
            _form.find('[name="end_datetime"]').val(String(scheds[id].end_datetime).replace(" ", "T"))
            _form.find('[name="title"]').focus()
            
            // location.href = "./module/edit_schedule.php?id=" + id;

        } else {
            alert("Event is undefined");
        }
    })

    // Delete Button / Deleting an Event
    $('#delete').click(function() {
        var id = $(this).attr('data-id')

        if (!!scheds[id]) {
            var _conf = confirm("Are you sure to delete this scheduled event?");

            if (_conf === true) {
                location.href = "./module/delete_schedule.php?id=" + id;
            }

        } else {
            alert("Event is undefined");
        }
    })
})

// end: FULL CALENDAR