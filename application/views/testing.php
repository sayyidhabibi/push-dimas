<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title><?php echo "$title"; ?></title>
  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="20x20" href="<?= base_url("assets/images/FaviconLogo.png") ?>">
  <link rel="icon" type="image/png" sizes="20x20" href="<?= base_url("assets/images/FaviconLogo.png") ?>">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/fontawesome.min.css">

  <!-- Custom Stylesheet -->
  <link href="<?= base_url("assets/") ?>css/style.css" rel="stylesheet">
  <link href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css" />
  <!-- Custom Calender -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
  <link href="<?= base_url("assets/") ?>plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet">
  <!-- Date picker plugins css -->
  <link href="<?= base_url("assets/") ?>plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet">
  <!-- Daterange picker plugins css -->
  <link href="<?= base_url("assets/") ?>plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">

  <link href="<?= base_url("assets/") ?>plugins/fullcalendar/css/fullcalendar.min.css" rel="stylesheet">
  <link href="<?= base_url("assets/") ?>css/style.css" rel="stylesheet">
  <link href="<?= base_url("assets/") ?>css/styleFullCalendar.css" rel="stylesheet">
  <link href="<?= base_url("assets/") ?>plugins/sweetalert/css/sweetalert.css" rel="stylesheet">
  <link href="<?= base_url("assets/") ?>plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
  <link href="<?= base_url("assets/") ?>plugins/tables/css/datatable/dataTables.bootstrap4.min.css" rel="stylesheet">
  


</head>

<body>

  <!--*******************
        Preloader start
        ********************-->
  <div id="preloader">
    <div class="loader">
      <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
      </svg>
    </div>
  </div>
  <!--*******************
        Preloader end
        ********************-->


  <!--**********************************
        Main wrapper start
        ***********************************-->
  <div id="main-wrapper">

    <!--**********************************
            Nav header start
            ***********************************-->
    <div class="nav-header">
      <div class="brand-logo">
        <a href="<?php base_url("web"); ?>">
          <b class="logo-abbr"><img src="<?= base_url("assets/") ?>images/ni.png" alt=""> </b>
          <span class="logo-compact"><img src="<?= base_url("assets/") ?>images/logo_nippisun.png" alt=""></span>
          <span class="brand-title">
            <img src="<?= base_url("assets/") ?>images/NI_TEXT.png" alt="">
          </span>
        </a>
      </div>
    </div>
    <!--**********************************
            Nav header end
            ***********************************-->

    <!--**********************************
            Header start
            ***********************************-->
    <div class="header">
      <div class="header-content clearfix">

        <div class="nav-control">
          <div class="hamburger">
            <span class="toggle-icon"><i class="icon-menu"></i></span>
          </div>
        </div>
        <!--  <div class="header-left">
                        <div class="input-group icons">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1"><i class="mdi mdi-magnify"></i></span>
                            </div>
                            <input type="search" class="form-control" placeholder="Search Dashboard" aria-label="Search Dashboard">
                            <div class="drop-down animated flipInX d-md-none">
                                <form action="#">
                                    <input type="text" class="form-control" placeholder="Search">
                                </form>
                            </div>
                        </div>
                    </div> -->
        <div class="header-right">
          <li class="icons dropdown ">
            <h6 class="d-none d-md-flex"><?= $user['Name'] ?></h6>
          </li>
          <li class="icons dropdown">
            <div class="user-img c-pointer position-relative" data-toggle="dropdown">
              <span class="activity active"></span>
              <img src="<?= base_url("assets/") ?>images/user/1.png" height="40" width="40" alt="">
            </div>
            <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
              <div class="dropdown-content-body">
                <ul>
                  <li><a href="<?= base_url("auth/logout") ?>"><i class=" mdi mdi-logout"></i> <span>Logout</span></a></li>
                </ul>
              </div>
            </div>
          </li>
          </ul>
        </div>
      </div>
    </div>
    <!--**********************************
            Header end ti-comment-alt
            ***********************************-->
    <!--**********************************
            Sidebar start
            ***********************************-->
    <?php
    $level =  $user['id_rule'];
    if ($level == 2) {
    ?>
      <div class="nk-sidebar gradient-4">
        <div class="nk-nav-scroll">
          <ul class="metismenu" id="menu">
            <li class="nav-label"><b><?php

                                      if ($user['TitleValue'] == null) {
                                        echo "-";
                                      } else {
                                        echo $user['TitleValue'];
                                      }
                                      // $idrule = $this->session->userdata('id_rule');
                                      // $sql = $this->db->query("SELECT * FROM tbl_level_user where id_rule ='$idrule'");
                                      // foreach ($sql->result() as $key => $value) {
                                      //   echo $value->jabatan;
                                      // }


                                      ?></b></li>

            <li>
              <a href="<?= base_url("web") ?>">
                <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
              </a>
            </li>
            <li class="mega-menu mega-menu-sm">
              <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                <i class="mdi mdi-contacts"></i><span class="nav-text">Data Karyawan</span>
              </a>
              <ul aria-expanded="false">
                <li><a href="<?= base_url("permohonan/datakaryawancuti")  ?>">Data Permohonan Tidak Masuk Kerja</a></li>
                <li><a href="<?= base_url("overtime/overtimeKaryawan")  ?>">Data Permohonan Overtime </a></li>
              </ul>
            </li>
            <li class="mega-menu mega-menu-sm">
              <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                <i class="icon-briefcase"></i><span class="nav-text">Properti</span>
              </a>
              <ul aria-expanded="false">
                <li><a href="<?= base_url("jeniscuti/")  ?>">Jenis Cuti Khusus</a></li>
                <li><a href="<?= base_url("jenispermohonan/")  ?>">Jenis Permohonan Tidak Masuk Kerja</a></li>
                <li><a href="<?= base_url("Jadwalkerja")  ?>">Jam Masuk Kerja</a></li>
              </ul>
            </li>
            <li class="mega-menu mega-menu-sm">
              <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                <i class="mdi mdi-calendar-clock gradient-9-text"></i><span class="nav-text">Work Schedule</span>
              </a>
              <ul aria-expanded="false">
                <li><a href="<?= base_url("workschedule/workScheduleGrup")  ?>">Tambah Schedule Grup</a></li>
                <li><a href="<?= base_url("workschedule/workschedule_addperson")  ?>">Tambah Person</a></li>
                <li><a href="<?= base_url("workschedule/workschedule_person")  ?>">Ubah Schedule Kerja Person</a></li>
                <li><a href="<?= base_url("workschedule/workschedule_DataPersonGrup")  ?>">Data Person Grup</a></li>
                <li><a href="<?= base_url("workschedule/workschedule_DataPersonGrup")  ?>">History Change Person</a></li>
                
              </ul>
            </li>
          </ul>
        </div>
      </div>
    <?php
    } else if ($level == 1) {
    ?>
      <div class="nk-sidebar gradient-4">
        <div class="nk-nav-scroll">
          <ul class="metismenu" id="menu">
            <li class="nav-label"><b><?php
                                      $idrule = $this->session->userdata('id_rule');
                                      $sql = $this->db->query("SELECT * FROM tbl_level_user where id_rule ='$idrule'");
                                      foreach ($sql->result() as $key => $value) {
                                        echo $value->jabatan;
                                      }
                                      ?></b></li>
            <li>
              <a href="<?= base_url("web") ?>">
                <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
              </a>
            </li>
            <li class="mega-menu mega-menu-sm">
              <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                <i class="icon-grid menu-icon"></i><span class="nav-text">Menu Kepala Departemen</span>
              </a>
              <ul aria-expanded="false">
                <li><a href="<?= base_url("permohonan/datakaryawancuti")  ?>">Data Permohonan Karyawan</a></li>
                <li><a href="<?= base_url("overtime/overtimeKaryawan") ?>">Data karyawan Overtime </a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    <?php } elseif ($level == 3) { ?>
      <div class="nk-sidebar gradient-4">
        <div class="nk-nav-scroll">
          <ul class="metismenu" id="menu">
            <li class="nav-label"><b><?php
                                      $idrule = $this->session->userdata('id_rule');
                                      $sql = $this->db->query("SELECT * FROM tbl_level_user where id_rule ='$idrule'");
                                      foreach ($sql->result() as $key => $value) {
                                        echo $value->jabatan;
                                      }
                                      ?></b></li>
            <li class="mega-menu mega-menu-sm">
              <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                <i class="mdi mdi-file-document-box "></i> <span class="nav-text">Formulir</span>
              </a>
              <ul aria-expanded="false">
                <li><a href="<?= base_url("permohonan/form_cuti") ?>">Formulir Permohonan</a></li>
                <li><a href="<?= base_url("overtime/form_overtime") ?>">Formulir Permohonan Lembur</a></li>
              </ul>
            </li>
            <li class="mega-menu mega-menu-sm">
              <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                <i class="mdi mdi-account-box"></i><span class="nav-text">Data Pribadi</span>
              </a>
              <ul aria-expanded="false">
                <li><a href="<?= base_url("permohonan/datapribadicuti")  ?>">Data Permohonan Pribadi</a></li>
                <li><a href="<?= base_url("overtime/overtimePribadi")  ?>">Data Lembur Pribadi</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    <?php } ?>
    <?= $contents ?>
    <div class="footer">
      <div class="copyright">
        <p>Nippisun Indonesia
        </p>
      </div>
    </div>
  </div>
  <script src="<?= base_url("assets/") ?>plugins/common/common.min.js"></script>
  <script src="<?= base_url("assets/") ?>js/styleformsubmission.js"></script>
  <script src="<?= base_url("assets/") ?>js/styleovertime.js"></script>
  <script src="<?= base_url("assets/") ?>js/workschedule.js"></script>
  <script src="<?= base_url("assets/") ?>js/custom.min.js"></script>
  <script src="<?= base_url("assets/") ?>js/settings.js"></script>
  <script src="<?= base_url("assets/") ?>js/gleek.js"></script>
  <script src="<?= base_url("assets/") ?>js/styleSwitcher.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
  <!-- Chart -->
  <script src="<?= base_url("assets/") ?>plugins/chart.js/Chart.bundle.min.js"></script>
  <!-- Circle progress -->
  <script src="<?= base_url("assets/") ?>plugins/circle-progress/circle-progress.min.js"></script>
  <!-- Datamap
  <script src="<?= base_url("assets/") ?>plugins/d3v3/index.js"></script>
  <script src="<?= base_url("assets/") ?>plugins/topojson/topojson.min.js"></script>
  <script src="<?= base_url("assets/") ?>plugins/datamaps/datamaps.world.min.js"></script> -->
  <!-- Morrisjs -->
  <!-- <script src="<?= base_url("assets/") ?>plugins/raphael/raphael.min.js"></script>
  <script src="<?= base_url("assets/") ?>plugins/morris/morris.min.js"></script> -->

  <!-- ChartistJS -->
  <script src="<?= base_url("assets/") ?>plugins/chartist/js/chartist.min.js"></script>
  <script src="<?= base_url("assets/") ?>plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>
  <script src="<?= base_url("assets/") ?>js/dashboard/dashboard-1.js"></script>
  <!-- Date Picker -->
  <script src="<?= base_url("assets/") ?>plugins/moment/moment.js"></script>
  <script src="<?= base_url("assets/") ?>plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
  <script src="<?= base_url("assets/") ?>plugins/jquery-asColorPicker-master/libs/jquery-asColor.js"></script>
  <script src="<?= base_url("assets/") ?>plugins/jquery-asColorPicker-master/libs/jquery-asGradient.js"></script>
  <script src="<?= base_url("assets/") ?>plugins/jquery-asColorPicker-master/dist/jquery-asColorPicker.min.js"></script>
  <!-- Date Picker Plugin JavaScript -->
  <!-- Date range Plugin JavaScript -->
  <script src="<?= base_url("assets/") ?>plugins/tables/js/jquery.dataTables.min.js"></script>
  <script src="<?= base_url("assets/") ?>plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url("assets/") ?>plugins/tables/js/datatable-init/datatable-basic.min.js"></script>
  <!-- Calender -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="<?= base_url("assets/") ?>js/sweetcustom.js"></script>
  <script src="<?= base_url("assets/") ?>js/workschedule.js"></script>
  <script src="<?= base_url("assets/") ?>plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
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
  <!-- Script custom -->
  <script>
    // let editEvent;
    
    // $(document).ready(function() {
    //   $('#calendargrup').fullCalendar({
    //     header: {
    //       left: 'prev,next today',
    //       center: 'title',
    //       right: 'month'
    //     },
    //     height: 'auto',
    //     eventSources: [{
    //       allDay: true,
    //       events: function(start, end, timezone, callback) {
    //         $.ajax({
    //           url: '<?= base_url("web/getevent_grup")  ?>',
    //           dataType: 'json',
    //           data: {
    //             end: end.unix()
    //           },
    //           success: function(msg) {
    //             let events = msg.events;
    //             console.info("events", events);
    //             callback(events);
    //           }
    //         });
    //       },
    //       textColor: 'white'
    //     }],
    //     views: {
    //       month: {
    //         columnFormat: 'dd'
    //       }
    //     },
        
    //     eventRender: function(event, element, view) {
    //       view.eventLimit = false;
    //       if (event.jadwal == "Non-Shift") {
    //         element.css('background-color', '#f4516c');
    //       }
    //       let showTypes = true,
    //         showSearchTerms = true;
    //       let valueselect = $('#selectgrupname').val();
    //       console.log("length", valueselect.length);
    //       console.log('valueselect', valueselect);
    //       if (valueselect && valueselect.length > 0) {
    //         showSearchTerms = event.title.indexOf(valueselect) >= 0;
    //       } else {
    //         showTypes = true;
    //       }
    //       return showSearchTerms && showTypes;
    //     },
    //     eventClick: function(event, jsEvent, view) {
    //       editEvent(event);
    //       $("#deleteEvent").click(function(e) {
    //         e.preventDefault();
    //         let checkBox = $('.modal #customCheck1').val();
    //         let link = $(this).attr('href') + event.id + "/" + checkBox;
    //         console.log(link);
    //         Swal.fire({
    //           title: 'Apakah anda yakin?',
    //           text: "Data  akan dihapus!",
    //           icon: 'warning',
    //           showCancelButton: true,
    //           confirmButtonColor: '#00a65a',
    //           cancelButtonColor: '#d33',
    //           confirmButtonText: 'Ya,hapus!',
    //           showClass: {
    //             popup: 'animate__animated animate__zoomIn'
    //           },
    //           hideClass: {
    //             popup: 'animate__animated animate__zoomOut'
    //           }
    //         }).then((result) => {
    //           if (result.isConfirmed) {
    //             Swal.fire("Terhapus!", "Data Berhasil Dihapus.", "success");
    //             setTimeout(function() {
    //               window.location = link;
    //             }, 1000);
    //           } else {
    //             Swal.fire("Cancelled", "Dibatalkan", "error");
    //           }
    //         });
    //       });
    //     },
    //     eventLimit: true,
    //     selectable: true,
    //     longPressDelay:0,
    //     select: function(startDate, endDate, jsEvent, view) {
    //       let today = moment();
    //       // const startDate;
    //       // const endDate;
    //       let namegrup = $('#selectgrupname').val();

    //       startDate.set({
    //         hours: today.hours(),
    //         minute: today.minutes()
    //       });
    //       startDate = moment(startDate).format('ddd DD MMM YYYY');
    //       endDate = moment(endDate).subtract('days', 1);
    //       endDate.set({
    //         hours: today.hours() + 1,
    //         minute: today.minutes()
    //       });
    //       endDate = moment(endDate).format('ddd DD MMM YYYY');
    //       console.log(startDate);
    //       if (namegrup === "") {
    //         Swal.fire({
    //           icon: 'error',
    //           title: 'Oops...',
    //           text: 'Nama Grup Tidak Boleh Kosong!',
    //         });
    //       } else {
    //         console.info("name grup",namegrup);
    //         $('#addModalNameGrup').val(namegrup);
    //         $('#addjadwal').val("");
    //         $('#addStartDate').val(startDate);
    //         $('#addEndDate').val(endDate);
    //         $('#modaladdgrup').modal('show');
    //         $(this.target).find('input').autocomplete("option", "appendTo", "#modaladdgrup");

    //       }
    //     }
    //   });
    //   editEvent = function(event, element, view) {
    //     let id = event.id;
    //     let title = event.title;
    //     let nama_grup = event.nama_grup;
    //     let start = event.start.format('ddd DD MMM YYYY');
    //     let end = event.end.format('ddd DD MMM YYYY');
    //     let agenda = event.jadwal;
    //     let select = document.getElementById("editjadwal");
    //     for (i = 0; i < select.length; i++) {
    //       if (select.options[i].text === agenda) {
    //         select.selectedIndex = [i];
    //       }
    //     }
    //     //$(".dropdown").hide().css("visibility", "hidden");
    //     $('#editidmodalworkschedule').val(id);
    //     $('#editTitle').val(title);
    //     if (nama_grup == "") {
    //       $('#editNamaGrup').val("-");
    //     } else {
    //       $('#editNamaGrup').val(nama_grup);
    //     }
    //     $('#editStartDate').val(start);
    //     $('#editEndDate').val(end);
    //     $('#editEventModal').modal('show');

    //   }
    // });
  </script>
  <script>
    // JsUpdate
    $(document).ready(function() {
      let s = $("#Name").autocomplete({
        source: function(request, response) {
          $.ajax({
            url: "<?= base_url("web/getsearchperson") ?>",
            dataType: "json",
            data: {
              term: request.term
            },
            success: function(data) {
              response(data);
            }
          })
        },
        minLength: 2,
        select: function(event, ui) {
          $(this).val(ui.item.label);
          let nama = ui.item.label;
          $.ajax({
            url: "<?= base_url('web/getsearchperson/') ?>",
            dataType: "json",
            data: {
              nama: nama,
              request: 2
            },
            success: function(response) {
              console.info(response);
              let len = response.length;
              if (len > 0) {
                let NIK = response[0]['NIK'];
                let nama = response[0]['nama'];
                let id_departemen = response[0]['id_departemen'];
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
  </script>
  <script type="text/javascript">
    //search namegrup
    $(document).ready(function() {
      let t = $('#karyawantable').DataTable();
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
          $(this).val(ui.item.label);
          $("#calendargrup").fullCalendar("rerenderEvents");
          let namagrup = ui.item.label;
          console.log("nama_group", namagrup);
          $.ajax({
            url: "<?= base_url('web/getDataPersonByGrup/') ?>",
            dataType: "json",
            data: {
              namagrup: namagrup,
              request: 2
            },
            success: function(users_arr) {
              console.info("response", users_arr);
              let linkdel = "<?= base_url("web/personschedule_delete/") ?>";
              if (t.data().count() > 0) {
                t.rows().remove().draw();
              }
              let i = 0;
              if (users_arr.length > 0) {
                do {
                  let id_work = users_arr[i]['id_work'];
                  console.info("id_work", id_work);
                  let NIK = users_arr[i]['NIK'];
                  let nama = users_arr[i]['nama'];
                  let id_departemen = users_arr[i]['id_departemen'];
                  let html = "<a class='delete_person' data-toggle='tooltip' data-placement='top' title='Close'><i class='fa fa-close color-danger '></i> Hapus</a>";
                  let linkdelete = linkdel + NIK;
                  t.row.add([nama, NIK, html]).draw();
                  let a = document.getElementsByClassName("delete_person")[i];
                  a.setAttribute("href", linkdelete);
                  i++;
                }
                while (users_arr.length > i);
              }
            }
          });
          return false;
        }
      });
    });
  </script>
  <script>
    let editEventPerson;
    $(document).ready(function() {
      $('#calendarPerson').fullCalendar({
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
                let events = msg.events;
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
          let showTypes = true,
            showSearchTerms = true;
          let valueselect = $('#inputSearchKaryawan').val();
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
          editEventPerson(event);

          $("#deleteEvent").click(function(e) {
            e.preventDefault();
            let link = $(this).attr('href') + event.id;
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
          let today = moment();
          // const startDate;
          // const endDate;
          let nameperson = $('.selectperson').val();
          console.log("nameperson", nameperson);
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
          if (nameperson === "") {
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'Nama Karyawan Tidak Boleh Kosong!',
            });
          } else {
            $('#addModalNamePerson').val(nameperson);
            $('#addjadwalPerson').val("");
            $('#addStartDatePerson').val(startDate);
            $('#addEndDatePerson').val(endDate);
            $('#modaladdperson').modal('show');
            $(this.target).find('input').autocomplete("option", "appendTo", "#modaladdgrup");

          }
        }
      });
      editEventPerson = function(event, element, view) {
        let id = event.id;
        let title = event.title;
        let namagrup = event.nama_grup;
        let start = event.start.format('ddd DD MMM YYYY');
        let end = event.end.format('ddd DD MMM YYYY');
        let agenda = event.jadwal;
        let idSchedule = event.id_schedule;
        let select = document.getElementById("editjadwal");
        for (i = 0; i < select.length; i++) {
          if (select.options[i].text === agenda) {
            select.selectedIndex = [i];
          }
        }
        //$(".dropdown").hide().css("visibility", "hidden");
        $('#editidmodalworkschedule').val(id);
        $('#editTitle').val(title);
        $('#editNamaGrup').val(namagrup);
        $('#editStartDate').val(start);
        $('#editEndDate').val(end);
        $('.eventName').text(title);
        $('#editSchedulePerson').val(idSchedule);
        $('#editEventModal').modal('show');

      }
    });
  </script>
  <script>
    $(document).ready(function() {
      $("#btn-update").on('click', function() {
        let s = $('.jeniscuti').find(":selected").val();
        let e = document.getElementsByClassName("jeniscuti")[0].value;;
        if (e == "Permohonan Cuti" || s == "Permohonan Cuti") {
          $('.keterangan').prop('required', false);
          $('.uploadimage').prop('required', false);
          $('.keperluan').prop('required', true);
          $(".tujuantrip").prop('required', false);
          $('.keterangan').val("");
          $('.uploadimage').val("");
        } else if (e == "Permohonan Cuti Mendadak" || s == "Permohonan Cuti Mendadak") {
          $(".keterangan").prop('required', true);
          $(".tujuantrip").prop('required', false);
          $(".keperluan").prop('required', false);
          $('.tujuantrip').val("");
          $('.keperluan').val("");
          $(".keperluan").find(':selected').removeAttr('data-id');

        } else if (e == "Permohonan Tidak Masuk Kerja" || s == "Permohonan Cuti") {
          $(".keterangan").prop('required', true);
          $(".keperluan").prop('required', false);
          $(".tujuantrip").prop('required', false);
          $(".keperluan").find(':selected').removeAttr('data-id');
          $('.keperluan').val("");
          $('.tujuantrip').val("");
        } else if (e == "Permohonan Business Trip" || s == "Permohonan Cuti") {
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
    });
  </script>
  <script>
    $(document).ready(function() {
      $("#inputSearchKaryawan").autocomplete({
        source: function(request, response) {
          $.ajax({
            url: "<?php echo site_url("web/getsearchperson/"); ?>",
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
          $(this).val(ui.item.label);
          $("#calendarPerson").fullCalendar("rerenderEvents")
        }
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      $('.modal #customCheck2').on('click', function() {
        if ($('#customCheck2').is(':checked')) {
          let e = $('#customCheck2').val();
          console.info(e);
          $('#editTitle').prop('disabled', true);
          $('editNamaGrup').prop('disabled', true);
          $('#editStartDate').prop('disabled', true);
          $('#editEndDate').prop('disabled', true);
          $('#editjadwal').prop('disabled', true);
        } else {
          $('#editTitle').prop('disabled', false);
          $('editNamaGrup').prop('disabled', false);
          $('#editStartDate').prop('disabled', false);
          $('#editEndDate').prop('disabled', false);
          $('#editjadwal').prop('disabled', false);
        }
      });
    });
  </script>
  <script>
    $(document).ready(function() {


      // get file and preview image
      $("#ChooseFile").change(function(e) {


        var fileName = e.target.files[0].name;
        $('.custom-file-label').html(fileName);
      })

    })
  </script>
  <script>
    $(document).ready(function(){
      let v = null;
      $(".setDay").focus(function(){
        v = $(this).val()
        console.info("value",v);
      });
      
    })
  </script>

  <!-- Date range Plugin JavaScript -->

  <script src="<?= base_url("assets/") ?>plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>


</body>

</html>