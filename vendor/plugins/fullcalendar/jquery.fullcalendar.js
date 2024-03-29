
!function ($) {
    "use strict";

    var CalendarApp = function () {
        this.$body = $("body")
        this.$calendar = $('#calendar'),
            this.$event = ('#calendar-events div.calendar-events'),
            this.$categoryForm = $('#add_new_event form'),
            this.$extEvents = $('#calendar-events'),
            this.$modal = $('#my_event'),
            this.$saveCategoryBtn = $('.save-category'),
            this.$calendarObj = null
    };


    /* on drop */
    CalendarApp.prototype.onDrop = function (eventObj, date) {
        var $this = this;
        // retrieve the dropped element's stored Event Object
        var originalEventObject = eventObj.data('eventObject');
        var $categoryClass = eventObj.attr('data-class');
        // we need to copy it, so that multiple events don't have a reference to the same object
        var copiedEventObject = $.extend({}, originalEventObject);
        // assign it the date that was reported
        copiedEventObject.start = date;
        if ($categoryClass)
            copiedEventObject['className'] = [$categoryClass];
        // render the event on the calendar
        $this.$calendar.fullCalendar('renderEvent', copiedEventObject, true);
        // is the "remove after drop" checkbox checked?
        if ($('#drop-remove').is(':checked')) {
            // if so, remove the element from the "Draggable Events" list
            eventObj.remove();
        }
    },
        /* on click on event */
        CalendarApp.prototype.onEventClick = function (calEvent, jsEvent, view) {
            var $this = this;

            // Call date of time
            let start = calEvent.start;
            let end = calEvent.end;

            var eventStart = new Date(start._i);
            var eventEnd = new Date(end._i);

            var hourStart = eventStart.getHours();
            var minuteStart = eventStart.getMinutes();
            var secondStart = eventStart.getSeconds();

            var hourEnd = eventEnd.getHours();
            var minuteEnd = eventEnd.getMinutes();
            var secondEnd = eventEnd.getSeconds();

            // Add leading zeros if necessary
            var formattedTimeStart = [
                hourStart.toString().padStart(2, "0"),
                minuteStart.toString().padStart(2, "0"),
                secondStart.toString().padStart(2, "0")
            ].join(":");

            var formattedTimeEnd = [
                hourEnd.toString().padStart(2, "0"),
                minuteEnd.toString().padStart(2, "0"),
                secondEnd.toString().padStart(2, "0")
            ].join(":");

            // Form
            var form = $("<form></form>");
            form.append("<label>Change event name</label>");
            form.append("<div class='input-group'><input class='form-control' type=text value='" + calEvent.title + "' /><span class='input-group-append'><button type='submit' class='btn btn-success'><i class='fa fa-check'></i> Save</button></span></div>");
            form.append("<label>Time event start</label>");
            form.append("<div  class='input-group'><input id='eventStart' class='form-control' type=text value=" + formattedTimeStart + "></div>");
            form.append("<label>Time event end</label>");
            form.append("<div  class='input-group'><input id='eventEnd' class='form-control' type=text value=" + formattedTimeEnd + "></div>");
            $this.$modal.modal({
                backdrop: 'static'
            });

            $this.$modal.find('.delete-event').show().end().find('.save-event').hide().end().find('.modal-body').empty().prepend(form).end().find('.delete-event').unbind('click').click(function () {
                $('#confirm-modal').modal('show');
                $('#confirm').click(() => {
                    $this.$calendarObj.fullCalendar('removeEvents', function (ev) {
                        // catch event id 
                        var event_id = calEvent._id;
                        console.log(event_id);
                        // Call to delete event in database
                        $(document).ready(function () {
                            $.post('controllers/calendars/delete.event.controller.php',
                                {
                                    event_id: event_id,
                                });
                        });
                        return (ev._id == calEvent._id);
                    });
                    $this.$modal.modal('hide');
                    $('#confirm-modal').modal('hide');
                })
                // Concel btn
                $('#cancel').click(() => {
                    $('#confirm-modal').modal('hide');
                })
                $('#cancel-icon').click(() => {
                    $('#confirm-modal').modal('hide');
                })

            });

            // Update form of event
            $this.$modal.find('form').on('submit', function () {
                calEvent.title = form.find("input[type=text]").val();
                $this.$calendarObj.fullCalendar('updateEvent', calEvent);
                // catch event id 
                var event_id = calEvent._id;

                let dayStart = calEvent.start;
                let dayEnd = calEvent.end;

                dayStart = start._i;
                dayEnd = end._i;

                dayStart = dayStart.substr(0, 10);
                dayEnd = dayEnd.substr(0, 10);

                // Time update format
                var timeStart = $('#eventStart').val();
                var timeEnd = $('#eventEnd').val();
                console.log(timeStart);

                var dateStart = `${dayStart} ${timeStart}`;
                var dateEnd = `${dayEnd} ${timeEnd}`;



                // Call to edit event in database
                $(document).ready(function () {
                    $.post('controllers/calendars/edit.event.controller.php',
                        {
                            event_id: event_id,
                            calEvent: calEvent.title,
                            start: dateStart,
                            end: dateEnd
                        });
                });
                $this.$modal.modal('hide');
                return false;
            });
        },
        /* on select */
        CalendarApp.prototype.onSelect = function (start, end, allDay) {
            var $this = this;
            $this.$modal.modal({
                backdrop: 'static'
            });
            var form = $("<form></form>");
            form.append("<div class='event-inputs'></div>");
            form.find(".event-inputs")
                .append("<div class='form-group'><label class='control-label'>Event Name</label><input class='form-control' placeholder='Insert Event Name' type='text' name='title'/></div>")
                .append("<div class='form-group'><label class='control-label'>Category</label><select class='form-control' name='category'></select></div>")
                .find("select[name='category']")
                .append("<option value='bg-danger'>Danger</option>")
                .append("<option value='bg-success'>Success</option>")
                .append("<option value='bg-purple'>Purple</option>")
                .append("<option value='bg-primary'>Primary</option>")
                .append("<option value='bg-info'>Info</option>")
                .append("<option value='bg-warning'>Warning</option></div></div>");
            $this.$modal.find('.delete-event').hide().end().find('.save-event').show().end().find('.modal-body').empty().prepend(form).end().find('.save-event').unbind('click').click(function () {
                form.submit();
            });


            $this.$modal.find('form').on('submit', function () {
                var title = form.find("input[name='title']").val();
                var categoryClass = form.find("select[name='category'] option:checked").val();
                if (title !== null && title.length != 0) {
                    console.log(1);

                    // Set date and time for calendar
                    var startDateTime = start.format('YYYY-MM-DD HH:mm:ss');
                    var endDateTime = end.format('YYYY-MM-DD HH:mm:ss');

                    // post data into SQL
                    $(document).ready(function () {
                        $.post('controllers/calendars/create.event.controller.php',
                            {
                                title: title,
                                start: startDateTime,
                                end: endDateTime,
                                category: categoryClass,
                            });
                        $.ajax({
                            url: 'controllers/calendars/getId.controller.php',
                            method: 'GET',
                            async: true,
                            success: function (response) {
                                // Create mock up
                                var id = JSON.parse(response).event_id;
                                $this.$calendarObj.fullCalendar('renderEvent', {
                                    id: id,
                                    title: title,
                                    start: start,
                                    end: end,
                                    allDay: false,
                                    className: categoryClass
                                }, true);
                            }
                        });
                        $this.$modal.modal('hide');
                    });
                    return false;
                } else {
                    alert('You have to give a title to your event');
                }
            });
            $this.$calendarObj.fullCalendar('unselect');
        },
        CalendarApp.prototype.enableDrag = function () {
            //init events
            $(this.$event).each(function () {
                // it doesn't need to have a start or end
                var eventObject = {
                    title: $.trim($(this).text()) // use the element's text as the event title
                };
                // store the Event Object in the DOM element so we can get to it later
                $(this).data('eventObject', eventObject);
                // make the event draggable using jQuery UI
                $(this).draggable({
                    zIndex: 999,
                    revert: true,      // will cause the event to go back to its
                    revertDuration: 0  //  original position after the drag
                });
            });
        }
    /* Initializing */
    CalendarApp.prototype.init = function () {
        this.enableDrag();
        /*  Initialize the calendar  */

        // Call data
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();
        var form = '';
        var today = new Date($.now());
        var allEvent = [];
        // Fetch the event data from your data source
        $.ajax({
            url: 'controllers/calendars/show.controller.php',
            method: 'GET',
            async: true,
            success: function (response) {
                // Parse the JSON response
                var events = JSON.parse(response);

                // Iterate through the events and populate the allEvent array
                events.forEach(function (event) {
                    allEvent.push({
                        id: event.event_id,
                        title: event.event_name,
                        start: event.event_start_date,
                        end: event.event_end_date,
                        className: event.category
                    });
                });

                // Initialize the calendar with the updated events
                $this.$calendarObj.fullCalendar('addEventSource', allEvent);
            },
            error: function () {
                console.log('Error retrieving event data');
            }
        });

        var $this = this;
        $this.$calendarObj = $this.$calendar.fullCalendar({
            slotDuration: '00:15:00', /* If we want to split day time each 15minutes */
            minTime: '08:00:00',
            maxTime: '19:00:00',
            defaultView: 'month',
            handleWindowResize: true,

            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            events: allEvent,
            editable: true,
            droppable: true, // this allows things to be dropped onto the calendar !!!
            eventLimit: true, // allow "more" link when too many events
            selectable: true,
            drop: function (date) { $this.onDrop($(this), date); },
            select: function (start, end, allDay) { $this.onSelect(start, end, allDay); },
            eventClick: function (calEvent, jsEvent, view) { $this.onEventClick(calEvent, jsEvent, view); }

        });

        //on new event
        this.$saveCategoryBtn.on('click', function () {
            var categoryName = $this.$categoryForm.find("input[name='category-name']").val();
            var categoryColor = $this.$categoryForm.find("select[name='category-color']").val();
            if (categoryName !== null && categoryName.length != 0) {
                $this.$extEvents.append('<div class="calendar-events" data-class="bg-' + categoryColor + '" style="position: relative;"><i class="fa fa-circle text-' + categoryColor + '"></i>' + categoryName + '</div>')
                $this.enableDrag();
            }

        });
    },

        //init CalendarApp
        $.CalendarApp = new CalendarApp, $.CalendarApp.Constructor = CalendarApp

}(window.jQuery),
    //initializing CalendarApp
    function ($) {
        "use strict";
        $.CalendarApp.init()
    }(window.jQuery);