$(function() {
	var base_url='<?php echo base_url()?>';
	$('#date-format').bootstrapMaterialDatePicker({ format : 'YYYY-MM-DD HH:mm:ss' }); 
	$('#calendar').fullCalendar({
		header: {
            left: 'prev, next, today',
            center: 'title',
            right: 'month, agendaWeek, agendaDay'
        },
		events: {
			url: base_url+'api/agenda/agenda',
			
		},
		defaultView: 'month',
		slotDuration: '00:30:00',  
        minTime: '08:00:00',
        maxTime: '19:00:00',
		handleWindowResize: true,
		editable: true,
        droppable: true, // this allows things to be dropped onto the calendar !!!
        eventLimit: true, // allow "more" link when too many events
        selectable: true,
		selectHelper: true,
		longPressDelay: 100,
		select: function(start, end) {
                    $('#create_modal input[name=start]').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
                    $('#create_modal input[name=end]').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
                    $('#create_modal').modal('show');
                    save();
                    $('#calendar').fullCalendar('unselect');
                },
		/*eventClick: function(calEvent){
			$('#modalTitle').html(calEvent.title);
			$('#modalBody').html('<p>'+calEvent.description+'</p>'+'<p>Mulai:'+calEvent.moment(start).format('YYYY-MM-DD HH:mm:ss')+'</p>'+'<p>Selesai'+calEvent.moment(end).format('YYYY-MM-DD HH:mm:ss')+'</p>');
			$('#fullCalModal').modal();
		},
		eventRender: function (event, element){
        element.attr('href', 'javascript:void(0);');
        element.click(function() {
            $("#startTime").html(moment(event.start).format('MMM Do h:mm A'));
            $("#endTime").html(moment(event.end).format('MMM Do h:mm A'));
            $("#modalBody").html(event.description);
            $("#disposisi").attr('href', event.disposisi);
            $("#fullCalModal").dialog({ modal: true, title: event.title, width:350});
        });
    }*/
		eventRender: function(event, element) {
			element.click(function(){
			$("#modalTitle").html(event.title);
			$("#startTime").html(moment(event.start).format('MMM Do h:mm'));
            $("#endTime").html(moment(event.end).format('MMM Do h:mm'));
            $("#modalBody").html(event.description);
            $("#disposisi").html(event.disposisi);
			$('#fullCalModal').modal();
			});
		}
		


  });
			$(document).on('submit', '#form_create', function(){
            var element = $(this);
            var eventData;
            $.ajax({
                url     : base_url+'calendar/addEvent',
                type    : element.attr('method'),
                data    : element.serialize(),
                dataType: 'JSON',
                beforeSend: function()
                {
                    element.find('button[type=submit]').html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>');
                },
                success: function(data)
                {
                    if(data.status)
                    {   
                        eventData = {
                            id          : data.id,
                            title       : $('#create_modal input[name=title]').val(),
                            description : $('#create_modal textarea[name=description]').val(),
                            start       : moment($('#create_modal input[name=start]').val()).format('YYYY-MM-DD HH:mm:ss'),
                            end         : moment($('#create_modal input[name=end]').val()).format('YYYY-MM-DD HH:mm:ss'),
                            disposisi   : $('#create_modal select[name=disposisi]').val()
							keterangan   : $('#create_modal select[name=keterangan]').val()
                        };
                        $('#calendar').fullCalendar('renderEvent', eventData, true); // stick? = true
                        $('#create_modal').modal('hide');
                        element[0].reset();
                        $('.notification').removeClass('alert-danger').addClass('alert-primary').find('p').html(data.notif);
                    }
                    else
                    {
                        element.find('.alert').css('display', 'block');
                        element.find('.alert').html(data.notif);
                    }
                    element.find('button[type=submit]').html('Submit');
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    element.find('button[type=submit]').html('Submit');
                    element.find('.alert').css('display', 'block');
                    element.find('.alert').html('Wrong server, please save again');
                }         
            });
            return false;
        });
  /*
		$('#btn_save').on('click',function(){
            var title = $('#title').val();
            var description = $('#description').val();
			var penyelengara = $('#penyelengara').val();
			var start = $('#start').val();
			var end = $('#end').val();
            var disposisi = $('#disposisi').val();
			var keterangan = $('#keterangan').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('calendar/addEvent')?>",
                dataType : "JSON",
                data : {title:title, description:description, start:start, end:end, disposisi:disposisi, keterangan:keterangan},
                success: function(data){
                    $('[name="title"]').val("");
                    $('[name="description"]').val("");
                    $('[name="start"]').val("");
					$('[name="end"]').val("");
                    $('[name="disposisi"]').val("");
                    $('[name="keterangan"]').val("");
                    $('#Modal_Add').modal('hide');                   
                }
            });
            return false;
        });  */

});
/*
!function($) {
    "use strict";

    var CalendarApp = function() {
        this.$body = $("body")
        this.$calendar = $('#calendar'),
        this.$event = ('#calendar-events div.calendar-events'),
        this.$categoryForm = $('#add-new-event form'),
        this.$extEvents = $('#calendar-events'),
        this.$modal = $('#my-event'),
        this.$saveCategoryBtn = $('.save-category'),
        this.$calendarObj = null
    };


    /* on drop 
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
    /* on click on event 
    CalendarApp.prototype.onEventClick =  function (calEvent, jsEvent, view) {
        var $this = this;
            var form = $("<form></form>");
            form.append("<label>Sunting Kegiatan</label>");
            form.append("<div class='input-group'><input class='form-control' type=text value='" + calEvent.title + "' /><span class='input-group-btn'><button type='submit' class='btn btn-success waves-effect waves-light'><i class='fa fa-check'></i> Save</button></span></div>");
            $this.$modal.modal({
                backdrop: 'static'
            });
            $this.$modal.find('.delete-event').show().end().find('.save-event').hide().end().find('.modal-body').empty().prepend(form).end().find('.delete-event').unbind('click').click(function () {
                $this.$calendarObj.fullCalendar('removeEvents', function (ev) {
                    return (ev._id == calEvent._id);
                });
                $this.$modal.modal('hide');
            });
            $this.$modal.find('form').on('submit', function () {
                calEvent.title = form.find("input[type=text]").val();
                $this.$calendarObj.fullCalendar('updateEvent', calEvent);
                $this.$modal.modal('hide');
                return false;
            });
    },
    /* on select 
    CalendarApp.prototype.onSelect = function (start, end, allDay) {
        var $this = this;
            $this.$modal.modal({
                backdrop: 'static'
            });
            var form = $("<form></form>");
            form.append("<div class='form-group'></div>");
            form.find(".form-group")
                .append("<div class='form-group'><label class='control-label'>Event Name</label><input class='form-control' placeholder='Tambah Kegiatan' type='text' name='judul'/></div>")
                .append("<div class='form-group'><label class='control-label'>Event Name</label><input class='form-control' placeholder='awal' type='text' name='beginning'/></div>")
				.append("<div class='form-group'><label class='control-label'>Event Name</label><input class='form-control' placeholder='akhir' type='text' name='ending'/></div>")
				.append("<div class='form-group'><label class='control-label'>Category</label><select class='form-control' name='category'></select></div>")
				.find("select[name='category']")
                .append("<option value='bg-danger'>Danger</option>")
                .append("<option value='bg-success'>Success</option>")
                .append("<option value='bg-purple'>Purple</option>")
                .append("<option value='bg-primary'>Primary</option>")
                .append("<option value='bg-pink'>Pink</option>")
                .append("<option value='bg-info'>Info</option>")
                .append("<option value='bg-warning'>Warning</option></div></div>");
            $this.$modal.find('.delete-event').hide().end().find('.save-event').show().end().find('.modal-body').empty().prepend(form).end().find('.save-event').unbind('click').click(function () {
                form.submit();
            });
            $this.$modal.find('form').on('submit', function () {
                var title = form.find("input[name='judul']").val();
                var beginning = form.find("input[name='beginning']").val();
                var ending = form.find("input[name='ending']").val();
                var categoryClass = form.find("select[name='category'] option:checked").val();
                if (title !== null && title.length != 0) {
                    $this.$calendarObj.fullCalendar('renderEvent', {
                        title: title,
                        start:start,
                        end: end,
                        allDay: false,
                        className: categoryClass
                    }, true);  
                    $this.$modal.modal('hide');
                }
                else{
                    alert('You have to give a title to your event');
                }
                return false;
                
            });
            $this.$calendarObj.fullCalendar('unselect');
    },
    CalendarApp.prototype.enableDrag = function() {
        //init events
        $(this.$event).each(function () {
            // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
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
    /* Initializing 
    CalendarApp.prototype.init = function() {
        this.enableDrag();
        /*  Initialize the calendar  
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();
        var form = '';
        var today = new Date($.now());

        var defaultEvents =  [{
                title: 'Released Ample Admin!',
                start: '2018-12-01',
                className: 'bg-info'
            }, {
                title: 'This is today check date',
                start: today,
                end: today,
                className: 'bg-danger'
            }, {
                title: 'This is your birthday',
                start: new Date($.now() + 848000000),
                className: 'bg-info'
            },{
                title: 'your meeting with john',
                start: new Date($.now() - 1099000000),
                end:  new Date($.now() - 919000000),
                className: 'bg-warning'
            },{
                title: 'your meeting with john',
                start: new Date($.now() - 1199000000),
                end: new Date($.now() - 1199000000),
                className: 'bg-purple'
            },{
                title: 'your meeting with john',
                start: new Date($.now() - 399000000),
                end: new Date($.now() - 219000000),
                className: 'bg-info'
            },  
              {
                title: 'Hanns birthday',
                start: new Date($.now() + 868000000),
                className: 'bg-danger'
            },{
                title: 'Like it?',
                start: new Date($.now() + 348000000),
                className: 'bg-success'
            }];

        var $this = this;
        $this.$calendarObj = $this.$calendar.fullCalendar({
            slotDuration: '00:30:00', /* If we want to split day time each 15minutes 
            minTime: '08:00:00',
            maxTime: '19:00:00',  
            defaultView: 'month',  
            handleWindowResize: true,   
             
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            events: defaultEvents,
            editable: true,
            droppable: true, // this allows things to be dropped onto the calendar !!!
            eventLimit: true, // allow "more" link when too many events
            selectable: true,
            drop: function(date) { $this.onDrop($(this), date); },
            select: function (start, end, allDay) { $this.onSelect(start, end, allDay); },
            eventClick: function(calEvent, jsEvent, view) { $this.onEventClick(calEvent, jsEvent, view); }

        });

        //on new event
        this.$saveCategoryBtn.on('click', function(){
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
function($) {
    "use strict";
    $.CalendarApp.init()
}(window.jQuery);
*/