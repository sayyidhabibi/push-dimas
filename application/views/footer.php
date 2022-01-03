         <!--**********************************
            Footer start
            ***********************************-->
         <div class="footer">
           <div class="copyright">
             <p>Nippisun Indonesia</p>
           </div>
         </div>
         <!--**********************************
            Footer end
            ***********************************-->
         </div>
         <!--***********************
        Main wrapper end
        ***********************************-->

         <!--**********************************
        Scripts
        ***********************************-->
         <script src="<?= base_url("assets/") ?>plugins/common/common.min.js"></script>
         <script src="<?= base_url("assets/") ?>js/styleformsubmission.js"></script>
         <script src="<?= base_url("assets/") ?>js/styleovertime.js"></script>
         <script src="<?= base_url("assets/") ?>js/workschedule.js"></script>
         <script src="<?= base_url("assets/") ?>js/custom.min.js"></script>
         <script src="<?= base_url("assets/") ?>js/settings.js"></script>
         <script src="<?= base_url("assets/") ?>js/gleek.js"></script>
         <script src="<?= base_url("assets/") ?>js/styleSwitcher.js"></script>
         <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>

         <!-- Circle progress -->
         <script src="<?= base_url("assets/") ?>./plugins/circle-progress/circle-progress.min.js"></script>
         <!-- Datamap -->
         <script src="<?= base_url("assets/") ?>./plugins/d3v3/index.js"></script>
         <script src="<?= base_url("assets/") ?>./plugins/topojson/topojson.min.js"></script>
         <script src="<?= base_url("assets/") ?>./plugins/datamaps/datamaps.world.min.js"></script>
         <!-- Morrisjs -->
         <script src="<?= base_url("assets/") ?>./plugins/raphael/raphael.min.js"></script>
         <script src="<?= base_url("assets/") ?>./plugins/morris/morris.min.js"></script>

         <!-- ChartistJS -->
         <script src="<?= base_url("assets/") ?>./plugins/chartist/js/chartist.min.js"></script>
         <script src="<?= base_url("assets/") ?>./plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>
         <script src="<?= base_url("assets/") ?>./js/dashboard/dashboard-1.js"></script>
         <!-- Date Picker -->
         <script src="<?= base_url("assets/") ?>./plugins/moment/moment.js"></script>
         <script src="<?= base_url("assets/") ?>./plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
         <!-- Clock Plugin JavaScript -->
         <!--  -->
         <script src="<?= base_url("assets/") ?>./plugins/jquery-asColorPicker-master/libs/jquery-asColor.js"></script>
         <script src="<?= base_url("assets/") ?>./plugins/jquery-asColorPicker-master/libs/jquery-asGradient.js"></script>
         <script src="<?= base_url("assets/") ?>./plugins/jquery-asColorPicker-master/dist/jquery-asColorPicker.min.js"></script>
         <!-- Date Picker Plugin JavaScript -->

         <!-- Date range Plugin JavaScript -->
         <script src="<?= base_url("assets/") ?>./plugins/tables/js/jquery.dataTables.min.js"></script>
         <script src="<?= base_url("assets/") ?>./plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
         <script src="<?= base_url("assets/") ?>./plugins/tables/js/datatable-init/datatable-basic.min.js"></script>
         <!-- Calender -->

         <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
         <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
         <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
         <script src="<?= base_url("assets/") ?>js/sweetcustom.js"></script>
         <script>
           $(document).ready(function() {

             // Initializ e Date picker 

             $('.datepicker-workschedule').datepicker({
               showAnim: "clip",
               changeMonth: true,
               changeYear: true,
               dateFormat: "DD, dd MM yy",
               autoClose: true,
               language: "id"
             });

           });
         </script>
         <!-- Script calendar custom -->
         <script>
           var editEvent;

           $(document).ready(function() {
             $('#calendargrup').fullCalendar({
               header: {
                 left: 'prev,next today',
                 center: 'title',
                 right: 'month'
               },
               height: 'auto',
               eventSources: [{
                 allDay: true,
                 events: function(start, end, timezone, callback) {
                   $.ajax({
                     url: '<?= base_url("web/getevent_grup")  ?>',
                     dataType: 'json',
                     data: {
                       end: end.unix()
                     },
                     success: function(msg) {
                       var events = msg.events;
                       console.log(events)
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
               eventRender: function(event, element, view) {
                 view.eventLimit = false;
                 if (event.jadwal == "Non-Shift") {
                   element.css('background-color', '#f4516c');
                 }
                 var showTypes = true,
                   showSearchTerms = true;
                 var valueselect = $('#selectgrupname').val();
                 console.log("length", valueselect.length);
                 console.log('valueselect', valueselect);
                 if (valueselect && valueselect.length > 0) {
                   showSearchTerms = event.title.indexOf(valueselect) >= 0;
                 } else {
                   showTypes = true;
                 }
                 return showSearchTerms && showTypes;
               },
               eventClick: function(event, jsEvent, view) {
                 editEvent(event);
                 $("#deleteEvent").click(function(e) {
                   e.preventDefault();
                   var link = $(this).attr('href') + event.id;
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
                       setTimeout(function() {
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
               select: function(startDate, endDate, jsEvent, view) {
                 var today = moment();
                 var startDate;
                 var endDate;
                 var namegrup = $('.selectgrup').val();
                 console.log("namegrup", namegrup);
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
                   $('#addModalNameGrup').val(namegrup);
                   $('#addjadwal').val("");
                   $('#addStartDate').val(startDate);
                   $('#addEndDate').val(endDate);
                   $('#modaladdgrup').modal('show');
                   $(this.target).find('input').autocomplete("option", "appendTo", "#modaladdgrup")
                 }
               }
             });

             editEvent = function(event, element, view) {
               var id = event.id;
               var title = event.title;
               var start = event.start.format('ddd DD MMM YYYY');
               var end = event.end.format('ddd DD MMM YYYY');
               var agenda = event.jadwal;
               var select = document.getElementById("editjadwal");
               for (i = 0; i < select.length; i++) {
                 if (select.options[i].text === agenda) {
                   select.selectedIndex = [i];
                 }
               }

               //$(".dropdown").hide().css("visibility", "hidden");
               $('#editidmodalworkschedule').val(id);
               $('#editTitle').val(title);
               $('#editStartDate').val(start);
               $('#editEndDate').val(end);

               $('.eventName').text(event.title);
               $('#editEventModal').modal('show');
             }

           });
         </script>
         <script>
           // JsUpdate



           $(document).ready(function() {
             //search grup name
             //    $(document).on('keydown', '.gruppersonsearch', function() {
             //      var id = this.id;
             //      var t = $('#karyawantable').DataTable();
             //      t.clear().draw();
             //      console.log(id);
             //      $('#' + id).autocomplete({
             //        source: function(request, response) {
             //          $.ajax({
             //            url: "<?= base_url('web/getsearchgrupperson/') ?>",
             //            type: 'post',
             //            dataType: "json",
             //            data: {
             //              search: request.term,
             //              request: 1
             //            },
             //            success: function(data) {
             //              response(data);
             //            }
             //          });
             //        },
             //        select: function(event, ui) {
             //          $(this).val(ui.item.label);
             //          var userid = ui.item.value;
             //          console.log("nama_group", userid);
             //          $.ajax({
             //            url: "<?= base_url('web/getsearchgrupperson/') ?>",
             //            type: 'post',
             //            dataType: "json",
             //            data: {
             //              userid: userid,
             //              request: 2
             //            },
             //            success: function(response) {
             //              var len = response.length;
             //              console.log(response);
             //              if (len > 0) {
             //                for (var i = 0; i < response.length; i++) {

             //                  var NIK = response[i]['NIK'];
             //                  var nama = response[i]['nama'];
             //                  var id_departemen = response[i]['id_departemen'];
             //                  var html = "<a href='#' data-toggle='tooltip' data-placement='top' title='Close'><i class='fa fa-close color-danger'></i> Hapus</a>";
             //                  t.row.add([nama, NIK, html]).draw(false);

             //                  //SET VALUE

             //                }
             //              }


             //            },
             //          });
             //          return false;
             //        }
             //      });
             //    });
             //  });


             //search person name
             $(document).on('keydown', '.namesearch', function() {
               var id = this.id;
               $('#nik').val("");
               $('#bagian').val("");
               $('#' + id).autocomplete({
                 source: function(request, response) {
                   $.ajax({
                     url: "<?= base_url('web/getsearchperson/') ?>",
                     type: 'post',
                     dataType: "json",
                     data: {
                       search: request.term,
                       request: 1
                     },
                     success: function(data) {
                       response(data);
                     }
                   });
                 },
                 select: function(event, ui) {
                   $(this).val(ui.item.label);
                   var userid = ui.item.value;
                   console.log(userid);
                   $.ajax({
                     url: "<?= base_url('web/getsearchperson/') ?>",
                     type: 'post',
                     dataType: "json",
                     data: {
                       userid: userid,
                       request: 2
                     },
                     success: function(response) {
                       var len = response.length;
                       if (len > 0) {
                         var NIK = response[0]['NIK'];
                         var nama = response[0]['nama'];
                         var id_departemen = response[0]['id_departemen'];
                         //SET VALUE
                         document.getElementById('Name').value = nama;
                         document.getElementById('nik').value = NIK;
                         document.getElementById('bagian').value = id_departemen;
                       }
                     }
                   });
                   return false;
                 }
               });
             });
           });
         </script>
         <script type="text/javascript">
           //search namegrup
           $(document).ready(function() {
             var t = $('#karyawantable').DataTable();
             $(".selectgrup").autocomplete({

               source: function(request, response) {
                 $.ajax({
                   url: "<?php echo site_url("web/getsearchgrupperson/?"); ?>",
                   dataType: "json",
                   data: {
                     term: request.term
                   },
                   success: function(data) {
                     response(data);
                   }
                 });
               },
               minLength: 2,
               select: function(event, ui) {
                 $("#calendargrup").fullCalendar("rerenderEvents");

                 $(this).val(ui.item.label);
                 var namagrup = ui.item.value;
                 console.log("nama_group", namagrup);
                 $.ajax({
                   url: "<?= base_url('web/Getdatapersonbygrup/') ?>",
                   dataType: "json",
                   data: {
                     namagrup: namagrup,
                     request: 1
                   },
                   success: function(users_arr) {
                     var linkdel = "<?= base_url("web/personschedule_delete/") ?>";
                     if (t.data().count() > 0) {
                       t.rows().remove().draw();
                     }
                     if (users_arr.length > 0) {
                       for (var i = 0; i < users_arr.length; i++) {
                         var id_work = users_arr[i]['id_work'];
                         var NIK = users_arr[i]['NIK'];
                         var nama = users_arr[i]['nama'];
                         var id_departemen = users_arr[i]['id_departemen'];
                         var html = "<a class='delete_person' data-toggle='tooltip' data-placement='top' title='Close'><i class='fa fa-close color-danger '></i> Hapus</a>";
                         var linkdelete = linkdel + users_arr[i]['id_work'];
                         t.row.add([nama, NIK, html]).draw();
                         console.log("looping", users_arr[i]);
                         var a = document.getElementsByClassName("delete_person")[i];
                         a.setAttribute("href", linkdelete);
                       }
                     }

                   }
                 });
                 return false;

               }

             });

           });
         </script>
         <script>
           //   var editEvent;
           //  var t
           //  $(document).ready(function() {

           //    $('#calendar-karyawan').fullCalendar({
           //      header: {
           //        left: 'prev,next today',
           //        center: 'title',
           //        right: 'month'
           //      },
           //      height: 'auto',
           //      eventSources: [{
           //        allDay: false,
           //        events: function(start, end, timezone, callback) {
           //          $.ajax({
           //            url: '<?= base_url("web/getevent_karyawan")  ?>',
           //            dataType: 'json',
           //            data: {
           //              end: end.unix()
           //            },
           //            success: function(msg) {
           //              var events = msg.events;
           //              console.log("events", events);
           //              console.log("time", msg);
           //              callback(events);
           //            }
           //          });
           //        },
           //        color: 'yellow', // an option!
           //        textColor: 'black',

           //      }],
           //      views: {
           //        month: {
           //          columnFormat: 'dd'
           //        }
           //      }
           //  });
           // });
         </script>
         <script>
           var editEvent;
           $(document).ready(function() {
             $('#calendarperson').fullCalendar({
               header: {
                 left: 'prev,next today',
                 center: 'title',
                 right: 'month'
               },
               height: 'auto',
               eventSources: [{
                 allDay: true,
                 events: function(start, end, timezone, callback) {
                   $.ajax({
                     url: '<?= base_url("web/getschedule_person")  ?>',
                     dataType: 'json',
                     data: {
                       end: end.unix()
                     },
                     success: function(msg) {
                       var events = msg.events;
                       console.log("event", events)
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
               //  eventRender: function(event, element, view) {
               //   view.eventLimit = false;
               //    if (event.jadwal == "Non-Shift") {
               //      element.css('background-color', '#f4516c');
               //    }
               //    var showTypes = true,
               //      showSearchTerms = true;
               //    var valueselect = $('#selectgrupname').val();
               //    console.log("length", valueselect.length);
               //    console.log('valueselect', valueselect);
               //    if (valueselect && valueselect.length > 0) {
               //      showSearchTerms = event.title.indexOf(valueselect) >= 0;
               //    } else {
               //      showTypes = true;
               //    }
               //    return showSearchTerms && showTypes;
               //  },
               //  eventClick: function(event, jsEvent, view) {
               //    editEvent(event);
               //    $("#deleteEvent").click(function(e) {
               //      e.preventDefault();
               //      var link = $(this).attr('href') + event.id;
               //      console.log(link);
               //      Swal.fire({
               //        title: 'Apakah anda yakin?',
               //        text: "Data  akan dihapus!",
               //        icon: 'warning',
               //        showCancelButton: true,
               //        confirmButtonColor: '#00a65a',
               //        cancelButtonColor: '#d33',
               //        confirmButtonText: 'Ya,hapus!',
               //        showClass: {
               //          popup: 'animate__animated animate__zoomIn'
               //        },
               //        hideClass: {
               //          popup: 'animate__animated animate__zoomOut'
               //        }
               //      }).then((result) => {
               //        if (result.isConfirmed) {
               //          Swal.fire("Terhapus!", "Data Berhasil Dihapus.", "success");
               //          setTimeout(function() {
               //            window.location = link;
               //          }, 1000);
               //        } else {
               //          Swal.fire("Cancelled", "Dibatalkan", "error");
               //        }
               //      });
               //    });
               //  },
               //  eventLimit: true,
               //  selectable: true,
               //  select: function(startDate, endDate, jsEvent, view) {
               //    var today = moment();
               //    var startDate;
               //    var endDate;
               //    var namegrup = $('.selectgrup').val();
               //    console.log("namegrup", namegrup);
               //    startDate.set({
               //      hours: today.hours(),
               //      minute: today.minutes()
               //    });
               //    startDate = moment(startDate).format('ddd DD MMM YYYY');
               //    endDate = moment(endDate).subtract('days', 1);
               //    endDate.set({
               //      hours: today.hours() + 1,
               //      minute: today.minutes()
               //    });
               //    endDate = moment(endDate).format('ddd DD MMM YYYY');
               //    console.log(startDate);
               //    if (namegrup === "") {
               //      Swal.fire({
               //        icon: 'error',
               //        title: 'Oops...',
               //        text: 'Nama Grup Tidak Boleh Kosong!',
               //      });
               //    } else {
               //      $('#addModalNameGrup').val(namegrup);
               //      $('#addjadwal').val("");
               //      $('#addStartDate').val(startDate);
               //      $('#addEndDate').val(endDate);
               //      $('#modaladdgrup').modal('show');
               //      $(this.target).find('input').autocomplete("option", "appendTo", "#modaladdgrup")
               //    }
               //  }
             });

             editEvent = function(event, element, view) {
               var id = event.id;
               var title = event.title;
               var start = event.start.format('ddd DD MMM YYYY');
               var end = event.end.format('ddd DD MMM YYYY');
               var agenda = event.jadwal;
               var select = document.getElementById("editjadwal");
               for (i = 0; i < select.length; i++) {
                 if (select.options[i].text === agenda) {
                   select.selectedIndex = [i];
                 }
               }

               //$(".dropdown").hide().css("visibility", "hidden");
               $('#editidmodalworkschedule').val(id);
               $('#editTitle').val(title);
               $('#editStartDate').val(start);
               $('#editEndDate').val(end);

               $('.eventName').text(event.title);
               $('#editEventModal').modal('show');
             }

           });
         </script>
         <script>
           $(document).ready(function() {

             $("#btn-update").on('click', function() {
               let s = $('.jeniscuti').find(":selected").val();
               let e = document.getElementsByClassName("jeniscuti")[0].value;;
               if (e == "Permohonan Cuti"|| s =="Permohonan Cuti" ) {
                
                 $('.keterangan').prop('required', false);
                 $('.uploadimage').prop('required', false);
                 $('.keperluan').prop('required', true);
                 $(".tujuantrip").prop('required', false);
                 $('.keterangan').val("");
                 $('.uploadimage').val("");
               } else if (e == "Permohonan Cuti Mendadak"|| s =="Permohonan Cuti Mendadak") {
                 $(".keterangan").prop('required', true);
                 $(".tujuantrip").prop('required', false);
                 $(".keperluan").prop('required', false);
                 $('.tujuantrip').val("");
                 $('.keperluan').val("");
                 $(".keperluan").find(':selected').removeAttr('data-id');

               } else if (e == "Permohonan Tidak Masuk Kerja" || s =="Permohonan Cuti") {
                 $(".keterangan").prop('required', true);
                 $(".keperluan").prop('required', false);
                 $(".tujuantrip").prop('required', false);
                 $(".keperluan").find(':selected').removeAttr('data-id');
                 $('.keperluan').val("");
                 $('.tujuantrip').val("");
               } else if (e == "Permohonan Business Trip" || s =="Permohonan Cuti") {
                 $(".keterangan").prop('required', false);
                 $(".tujuantrip").prop('required', true);
                 $(".uploadimage").prop('required', false);
                 $(".keperluan").prop('required', false);
                 $(".keperluan").find(':selected').removeAttr('data-id');
                 $('.keterangan').val("");
                 $('.uploadimage').val("");
                 $('.keperluan').val("");
               }
             })
           })
         </script>
         </body>

         </html>