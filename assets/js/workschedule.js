
$(document).ready(function () {
  let editEventPerson;
  let base_url = window.location.origin;
  $('#calendarPerson').fullCalendar({
    header: {
      left: 'prev,next today',
      center: 'title',
      right: 'month',
      textColor: 'white'
    },
    height: 'auto',
    eventSources: [{
      allDay: true,
      events: function (start, end, timezone, callback) {
        $.ajax({
          url: base_url + '/NippisunIndonesiacopy' + '/workschedule/getSchedulePerson',
          dataType: 'json',
          success: function (msg) {
            let events = msg.events;
            console.info("events", events);
            callback(events);
          }
        });
      },
      textColor: 'white'
    }],
    views: {
      month: {
        columnFormat: 'dd'
      }
    },
    displayEventTime: false,
    eventRender: function (event, element, view) {
      view.eventLimit = false;
      if (event.title == "Non-Shift") {
        element.css('background-color', '#f4516c');
      }
      
      let showTypes = true,
        showSearchTerms = true;
      let valueselect = $('#selectperson').val();
      if (valueselect && valueselect.length > 0) {
        showSearchTerms = event.namaKaryawan.indexOf(valueselect) >= 0;
        
      } else {
        showTypes = true;
      }
      return showSearchTerms && showTypes;
    },
    eventClick: function (event, jsEvent, view) {
      
      editEventPerson(event);
      $("#deleteEvent").click(function (e) {
        e.preventDefault();
        let checkBox = $('.modal #customCheck1').val();
        let link = $(this).attr('href') + event.id + "/" + checkBox;
        console.log(link);
        Swal.fire({
          title: 'Apakah anda yakin?',
          text: "Data  akan dihapus!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#00a65a',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya,hapus!',
          showClass: {
            popup: 'animate__animated animate__zoomIn'
          },
          hideClass: {
            popup: 'animate__animated animate__zoomOut'
          }
        }).then((result) => {
          if (result.isConfirmed) {
            Swal.fire("Terhapus!", "Data Berhasil Dihapus.", "success");
            setTimeout(function () {
              window.location = link;
            }, 1000);
          } else {
            Swal.fire("Cancelled", "Dibatalkan", "error");
          }
        });
      });
    },
    eventLimit: true,
    selectable: false,
    longPressDelay: 0
  });
  editEventPerson = function (event, element, view) {
    let id = event.id;
    let nama_grup = event.grup;
    let idScheduleGrup = event.id_schedule;
    console.info("Nama Grup", nama_grup);
    let start = event.start.format('ddd, DD MMM YYYY');
    let end = event.end.format('ddd, DD MMM YYYY');
    let agenda = event.title;
    let nameEmployee = event.namaKaryawan;
    let select = document.getElementById("editjadwal");
    for (i = 0; i < select.length; i++) {
      if (select.options[i].text === agenda) {
        select.selectedIndex = [i];
      }
    }
    //$(".dropdown").hide().css("visibility", "hidden");
    $('#editidModalSchedulePerson').val(id);
    $('#editidModalScheduleGrup').val(idScheduleGrup);
    $('#editTitle').val(nama_grup);
    if (nama_grup == "") {
      $('#editNamaGrup').val("-");
    } else {
      $('#editNamaGrup').val(nama_grup);
    }
    $('#editStartDate').val(start);
    $('#editEndDate').val(end);
    $('#editNamaKaryawan').val(nameEmployee);
    $('#editEventPersonmodal').modal('show');

  }
});
$(document).ready(function () {
  (function ($) {
    $.widget("custom.combobox", {
      _create: function () {
        this.wrapper = $("<span>")
          .addClass("custom-combobox")
          .insertAfter(this.element);

        this.element.hide();
        this._createAutocomplete();
        this._createShowAllButton();
      },

      _createAutocomplete: function () {
        let selected = this.element.children(":selected"),
          value = selected.val() ? selected.text() : "";

        this.input = $("<input>")
          .appendTo(this.wrapper)
          .val(value)
          .attr("name", "namaGrup")
          .addClass("custom-combobox-input ui-widget ui-widget-content ui-corner-left form-control input-rounded")
          .autocomplete({
            delay: 0,
            minLength: 0,
            source: $.proxy(this, "_source")
          })
          .tooltip({
            tooltipClass: "ui-state-highlight"
          });

        this._on(this.input, {
          autocompleteselect: function (event, ui) {
            ui.item.option.selected = true;
            this._trigger("select", event, {
              item: ui.item.option
            });
          },
          autocompletechange: "_removeIfInvalid"
        });
      },

      _createShowAllButton: function () {
        let input = this.input,
          wasOpen = false;
        $("<a>")
          .appendTo(this.wrapper)
          .button({
            icons: {
              primary: "ui-icon-triangle-1-s"
            },
            text: false
          })
          .removeClass("ui-corner-all")
          .addClass("custom-combobox-toggle ui-corner-right")
          .mousedown(function () {
            wasOpen = input.autocomplete("widget").is(":visible");
          })
          .click(function () {
            input.focus();

            // Close if already visible
            if (wasOpen) {
              return;
            }

            // Pass empty string as value to search for, displaying all results
            input.autocomplete("search", "");
          });
      },

      _source: function (request, response) {
        let matcher = new RegExp($.ui.autocomplete.escapeRegex(request.term), "i");
        response(this.element.children("option").map(function () {
          let text = $(this).text();
          if (this.value && (!request.term || matcher.test(text)))
            return {
              label: text,
              value: text,
              option: this
            };
        }));
      },

      _removeIfInvalid: function (event, ui) {

        // Selected an item, nothing to do

        if (ui.item) {

          return;
        }

        // Search for a match (case-insensitive)
        let value = this.input.val(),
          valueLowerCase = value.toLowerCase(),
          valid = false;
        this.element.children("option").each(function () {
          if ($(this).text().toLowerCase() === valueLowerCase) {
            this.selected = valid = true;

            return false;
          }
        });

        // Found a match, nothing to do
        if (valid) {
          return;
        }

        // Remove invalid value
        // this.input
        //   .val("")
        //   .attr("title", value + " didn't match any item")
        //   .tooltip("open");
        // this.element.val("");
        // this._delay(function() {
        //   this.input.tooltip("close").attr("title", "");
        // }, 2500);
        this.input.autocomplete("instance").term = "";
      },

      _destroy: function () {
        this.wrapper.remove();
        this.element.show();
      }
    });
  })(jQuery);

  $(function () {
    $("#selectgrupname").combobox({
      select: function (event, ui) {
        $("#calendargrup").fullCalendar("rerenderEvents");
      }
    });

    $("#toggle").click(function () {
      $("#combobox").toggle();
    });
  });
  $(function () {
    $("#selectgrupnameAddPerson").combobox({
      select: function (event, ui) {
        
        getPersonByGrup(ui.item.label);
        
      }
    });

    $("#toggle").click(function () {
      $("#combobox").toggle();
    });
  });
  $(function () {

    $("#selectperson").combobox({

      select: function (event, ui) {
        $("#calendarPerson").fullCalendar("rerenderEvents");
        
      }
    });

    $("#toggle").click(function () {
      $("#combobox").toggle();
    });
  })


});
$(document).ready(function () {
 let editEvent;
  let base_url = window.location.origin;
  console.info("base_url", base_url);
  $('#calendargrup').fullCalendar({
    header: {
      left: 'prev,next today',
      center: 'title',
      right: 'month'
    },
    height: 'auto',
    eventSources: [{
      allDay: false,
      events: function (start, end, timezone, callback) {
        $.ajax({
          url: base_url + '/NippisunIndonesiacopy' + '/workschedule/getevent_grup',
          dataType: 'json',
          success: function (msg) {
            let events = msg.events;
            console.info("events", events);
            callback(events);
          }
        });
      },
      textColor: 'white'
    }],
    views: {
      month: {
        columnFormat: 'dd'
      }
    },
    displayEventTime: false,
    eventRender: function (event, element, view) {
      view.eventLimit = false;
      if (event.title == "Non-Shift") {
        element.css('background-color', '#f4516c');
      }
      let showTypes = true,
        showSearchTerms = true;
      let valueselect = $('#selectgrupname').val();
      console.log("length", valueselect.length);
      console.log('valueselect', valueselect);

      if (valueselect && valueselect.length > 0) {

        showSearchTerms = event.grup.indexOf(valueselect) >= 0;
      } else {
        showTypes = true;
      }
      return showSearchTerms && showTypes;
    },
    eventClick: function (event, jsEvent, view) {
      editEvent(event);
      $("#deleteEvent").click(function (e) {
        e.preventDefault();
        let checkBox = $('.modal #customCheck1').val();
        let link = $(this).attr('href') + event.id + "/" + checkBox;
        console.log(link);
        Swal.fire({
          title: 'Apakah anda yakin?',
          text: "Data  akan dihapus!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#00a65a',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya,hapus!',
          showClass: {
            popup: 'animate__animated animate__zoomIn'
          },
          hideClass: {
            popup: 'animate__animated animate__zoomOut'
          }
        }).then((result) => {
          if (result.isConfirmed) {
            Swal.fire("Terhapus!", "Data Berhasil Dihapus.", "success");
            setTimeout(function () {
              window.location = link;
            }, 1000);
          } else {
            Swal.fire("Cancelled", "Dibatalkan", "error");
          }
        });
      });
    },
    eventLimit: true,
    selectable: true,
    longPressDelay: 0,
    select: function (startDate, endDate, jsEvent, view) {
      let today = moment();
      // const startDate;
      // const endDate;
      let namegrup = $('#selectgrupname').val();

      startDate.set({
        hours: today.hours(),
        minute: today.minutes()
      });
      startDate = moment(startDate).format('ddd DD MMM YYYY');
      endDate = moment(endDate).subtract('days', 1);
      endDate.set({
        hours: today.hours() + 1,
        minute: today.minutes()
      });
      endDate = moment(endDate).format('ddd DD MMM YYYY');
      console.log(startDate);
      if (namegrup === "") {
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Nama Grup Tidak Boleh Kosong!',
        });
      } else {
        console.info("name grup", namegrup);
        $('#addModalNameGrup').val(namegrup);
        $('#addjadwal').val("");
        $('#addStartDate').val(startDate);
        $('#addEndDate').val(endDate);
        $('#modaladdgrup').modal('show');
        $(this.target).find('input').autocomplete("option", "appendTo", "#modaladdgrup");

      }
    }
  });
  editEvent = function (event, element, view) {
    let id = event.id;
    let nama_grup = event.grup;
    console.info("Nama Grup", nama_grup);
    let start = event.start.format('ddd, DD MMM YYYY');
    let end = event.end.format('ddd, DD MMM YYYY');
    let agenda = event.title;
    console.info("Jadwal", agenda)
    console.info("end Date", end)
    let select = document.getElementById("editjadwal");
    for (i = 0; i < select.length; i++) {
      if (select.options[i].text === agenda) {
        select.selectedIndex = [i];
      }
    }
    //$(".dropdown").hide().css("visibility", "hidden");
    $('#editidmodalworkschedule').val(id);
    $('#editTitle').val(nama_grup);
    if (nama_grup == "") {
      $('#editNamaGrup').val("-");
    } else {
      $('#editNamaGrup').val(nama_grup);
    }
    $('#editStartDate').val(start);
    $('#editEndDate').val(end);
    $('#editEventModal').modal('show');

  }
});
$(document).ready(function () {
  $(".datepicker-workschedule").datepicker({
    format: "DD,dd MM yyyy",
    autoclose: true
  });
  $('#tabelAddPerson').hide();
  $("#addPerson").on('click', function () {
    $('#tabelAddPerson').show();
    let namaGrup = $("#selectgrupnameAddPerson").val();
    
    $(".nameGrupAddPerson").val(namaGrup);
  });
});
function getPersonByGrup(namaGrup) {
  let t = $('#karyawantable').DataTable();
  console.info("Nama Grup",namaGrup);
  let base_url = window.location.origin;
  $.ajax({
    url: base_url + "/NippisunIndonesiacopy/" + "workschedule/callPersonByGrup",
    data: {
      namaGrup: namaGrup
    },
    dataType: "json",
    success: function (users_arr) {
     
      let linkdel = base_url + "/NippisunIndonesiacopy/" + "workschedule/deletePersonFromGrup/";
      if (t.data().count() >= 0) {
        t.rows().remove().draw();
      }
      let i = 0;


      if (users_arr.length > i) {
        
        do {
          // let id_work = users_arr[i]['id_work'];
          let NIK = users_arr[i]['NIK'];
          let nama = users_arr[i]['nama'];
          let enkripsi = users_arr[i]['Enskripsi'];
          let departemenName = users_arr[i]['DepartemenName'];
          if(departemenName == null){
            departemenName = "-"
          }
          let linkdelete = linkdel + enkripsi;
          
          let html = "<a href ='"+ linkdelete +"' class='delete_person btn-hapus-permohonan' data-toggle='tooltip' data-placement='top' title='Close'><i class='fa fa-close color-danger '></i> Hapus</a>";
          
          t.row.add([nama, NIK,departemenName, html]).draw();
          i++;
        }
        while (users_arr.length > i);
      }
    }
  });
  return false;
}
