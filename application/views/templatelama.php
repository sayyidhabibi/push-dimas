<!DOCTYPE html>

<html lang="en">
<head runat="server">
	<title><?=$title ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/x-icon" href=fav.ico" />


	<link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">

	<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/dataTables.bootstrap5.min.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/jquery.dataTables.min.css') ?>" />
	<link rel="stylesheet" href="<?php echo base_url('assets/css/responsive.dataTables.min.css') ?>" />

	<link href="<?php echo base_url('assets/css/bar.css') ?>" rel="stylesheet">

	<link rel="stylesheet" href="<?php echo base_url('assets/css/next-sidebar1.css') ?>" />

	<link rel="stylesheet" href="<?php echo base_url('assets/css/all.css') ?>" type="text/css">

	<!-- Custom Stylesheet -->
  <link href="<?= base_url("assets/") ?>css/style.css" rel="stylesheet">
  <link href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css" />
  <!-- Custom Calender -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
  <link href="<?= base_url("assets/") ?>asset/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet">
  <!-- Date picker asset/plugins css -->
  <link href="<?= base_url("assets/") ?>asset/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet">
  <!-- Daterange picker asset/plugins css -->
  <link href="<?= base_url("assets/") ?>asset/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">

  <link href="<?= base_url("assets/") ?>asset/plugins/fullcalendar/css/fullcalendar.min.css" rel="stylesheet">
  <link href="<?= base_url("assets/") ?>css/style.css" rel="stylesheet">
  <!-- <link href="<?= base_url("assets/") ?>css/styleFullCalendar.css" rel="stylesheet"> -->
  <link href="<?= base_url("assets/") ?>asset/plugins/sweetalert/css/sweetalert.css" rel="stylesheet">
  <link href="<?= base_url("assets/") ?>asset/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
  <link href="<?= base_url("assets/") ?>asset/plugins/tables/css/datatable/dataTables.bootstrap4.min.css" rel="stylesheet">

	<!-- Quicklab -->
	<!-- Favicon icon -->
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('assets/images/pigment.png') ?>">
	<!-- Pignose Calender -->
	<link href="<?php echo base_url('assets/asset/plugins/pg-calendar/css/pignose.calendar.min.css') ?>" rel="stylesheet">
	<!-- Chartist -->
	<link rel="stylesheet" href="<?php echo base_url('assets/asset/plugins/chartist/css/chartist.min.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/asset/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css') ?>">
	<!-- Custom Stylesheet -->
	<link href="<?php echo base_url('assets/asset/css/style1.css') ?>" rel="stylesheet">
	<!-- End Quicklab -->

	<!-- <link rel="stylesheet" href="<?php echo base_url('assets/asset/plugins/animate/animate.min.css') ?>"> -->

	<link rel="stylesheet" href="<?php echo base_url('assets/asset/fontawesome/css/all.css') ?>">

	<asp:ContentPlaceHolder id="head" runat="server">
</asp:ContentPlaceHolder>
</head>

<body class="app is-collapsed bg-white">


	<asp:SiteMapDataSource ID="SiteMapDataSource1" runat="server" ShowStartingNode="false" />

	<asp:Panel ID="PanelHide" runat="server" Visible="false">
	<asp:Label ID="lblUsersID" runat="server"></asp:Label>
</asp:Panel>

<div id="overlay"></div> 

<div id="preloader">
	<div class="loader">
		<svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
		</svg>
	</div>
</div>

<div id="sidebar">
	<div class="sidebar bg-dark">
		<div class="sidebar-inner">
			<div class="sidebar-logo">
				<div class="d-flex align-items-center flex-nowrap">
					<a class="sidebar-link text-decoration-none" href="<?php echo base_url('#') ?>">
						<div class="d-flex align-items-center flex-nowrap">
							<div class="logo-sm">
								<div class="logo d-flex align-items-center justify-content-center">

								</div>
							</div>
							<div class="logo-text d-flex align-items-center justify-content-center">

							</div>
						</div>
					</a>
					<div class="">
						<div class="mobile-toggle sidebar-toggle">
							<a href="<?php echo base_url('#') ?>" class="text-decoration-none">
								<i class="far fa-times-circle"></i>
							</a>
						</div>
					</div>
				</div>
			</div>

			<ul class="sidebar-menu scrollable position-relative pt-3">

				<li class="nav-item dropdown">
					<a id="test_link01" class="nav-link wave-effect" href="<?php echo base_url('web') ?>">
						<span class="icon-holder">
							<i class="fas fa-home"></i>
						</span>
						<span class="title" id="spatitle">Dashboard</span>
					</a>
				</li>
				<?php 
				$level = $user['id_rule'];
				if ($level == 1) { ?>
					<li class="nav-item dropdown">
						<a class="nav-link wave-effect dropdown-toggle">
							<span class="icon-holder">
								<i class="fas fa-users"></i>
							</span>
							<span class="title" id="spatitle">Menu Kepala Departemen</span>
							<span class="arrow">
								<i class="fas fa-angle-right"></i>
							</span>
						</a>
						<ul class="dropdown-menu">
							<li>
								<a class="sidebar-link" href="<?php echo base_url('permohonan/datakaryawancuti') ?>">Data Permohonan Karyawan</a>
								<a class="sidebar-link" href="<?php echo base_url('overtime/overtimeKaryawan') ?>">Data Karyawan Overtime</a>		
							</li>
						</ul>
					</li>
				<?php } else if($level == 2) { ?>
					<li class="nav-item dropdown">
						<a class="nav-link wave-effect dropdown-toggle">
							<span class="icon-holder">
								<i class="fas fa-users"></i>
							</span>
							<span class="title" id="spatitle">Data Karyawan</span>
							<span class="arrow">
								<i class="fas fa-angle-right"></i>
							</span>
						</a>
						<ul class="dropdown-menu">
							<li>
								<a class="sidebar-link" href="<?php echo base_url('permohonan/datakaryawancuti') ?>">Data Permohanan Tidak Masuk Kerja</a>
								<a class="sidebar-link" href="<?php echo base_url('overtime/overtimeKaryawan') ?>">Data Permohonan Overtime</a>
							</li>
						</ul>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link wave-effect dropdown-toggle">
							<span class="icon-holder">
								<i class="fas fa-user-clock"></i>
							</span>
							<span class="title" id="spatitle">Properti</span>
							<span class="arrow">
								<i class="fas fa-angle-right"></i>
							</span>
						</a>
						<ul class="dropdown-menu">
							<li>
								<a class="sidebar-link" href="<?php echo base_url('properti/jeniscuti/') ?>">Jenis Cuti Khusus</a>
								<a class="sidebar-link" href="<?php echo base_url('properti/jenispermohonan/') ?>">Jenis Permohonan Tidak Masuk Kerja</a>
								<a class="sidebar-link" href="<?php echo base_url('properti/jadwalkerja/') ?>">Jam Masuk Kerja</a>		
							</li>
						</ul>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link wave-effect dropdown-toggle">
							<span class="icon-holder">
								<i class="fas fa-calendar-alt"></i>
							</span>
							<span class="title" id="spatitle">Work Schedule</span>
							<span class="arrow">
								<i class="fas fa-angle-right"></i>
							</span>
						</a>
						<ul class="dropdown-menu">
							<li>
								<a class="sidebar-link" href="<?php echo base_url('workschedule/workScheduleGrup') ?>">Tambah Schedule Grup</a>
								<a class="sidebar-link" href="<?php echo base_url('workschedule/workschedule_addperson') ?>">Tambah Person</a>
								<a class="sidebar-link" href="<?php echo base_url('workschedule/workschedule_person') ?>">Ubah Schedule Kerja Person</a>
								<a class="sidebar-link" href="<?php echo base_url('workschedule/workschedule_personHistory') ?>">History Change Person</a>		
							</li>
						</ul>
					</li>
				<?php } else{ ?>
					<li class="nav-item dropdown">
						<a class="nav-link wave-effect dropdown-toggle">
							<span class="icon-holder">
								<i class="mdi mdi-file-document-box "></i>
							</span>
							<span class="title" id="spatitle">Formulir</span>
							<span class="arrow">
								<i class="fas fa-angle-right"></i>
							</span>
						</a>
						<ul class="dropdown-menu">
							<li>
								<a class="sidebar-link" href="<?php echo base_url('permohonan/form_cuti') ?>">Formulir Permohonan</a>
								<a class="sidebar-link" href="<?php echo base_url('overtime/form_overtime') ?>">Formulir Permohonan Lembur</a>
							</li>
						</ul>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link wave-effect dropdown-toggle">
							<span class="icon-holder">
								<i class="fas fa-address-book"></i>
							</span>
							<span class="title" id="spatitle">Data Pribadi</span>
							<span class="arrow">
								<i class="fas fa-angle-right"></i>
							</span>
						</a>
						<ul class="dropdown-menu">
							<li>
								<a class="sidebar-link" href="<?php echo base_url('permohonan/datapribadicuti') ?>">Data Permohonan Pribadi</a>
								<a class="sidebar-link" href="<?php echo base_url('overtime/overtimePribadi') ?>">Data Lembur Pribadi</a>
							</li>
						</ul>
					</li>
				<?php } ?>
			</ul>
		</div>
	</div>
</div>
<div class="container-wide">

	<!-- header original  -->
	<!-- Header -->
	<header class="p-2 py-2 border-bottom">
		<div class="header-content clearfix mb-lg-2">
			<div class="header-left">
				<img src="<?php echo base_url('assets/images/pigment.png') ?>"/>				
			</div>
			<div class="header-right">
				<li class="icons dropdown "> 
					<ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
						<li><a href="<?php echo base_url('#') ?>" class="nav-link px-2 link-dark nama-user"><?= $user['Name'] ?></a></li>
						<li>
							<a href="<?php echo base_url('#') ?>" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
								<img src="<?php echo base_url('assets/images/index.png') ?>" alt="mdo" width="32" height="32" class="rounded-circle">
							</a>
							<div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
								<div class="dropdown-content-body">
									<ul>
										<li>
											<a href="<?php echo base_url('app-profile.html') ?>"><i class="fas fa-user"></i> <span>Profile</span></a>
										</li>
										<li>
											<a href="<?php echo base_url('app-profile.html') ?>"><i class="fas fa-cog"></i> <span>Setting</span></a>
										</li>
										<hr class="my-2">
										<li><a href="<?php echo base_url('auth/logout') ?>"><i class="fas fa-sign-out-alt"></i> <span>Sign Out</span></a></li>
									</ul>
								</div>
							</div>
						</li>
					</ul>
				</li>
			</div>
		</div>
	</header>
	<!-- End Header -->

	<!-- side bar  -->
	<nav id="sidebar" class="active">
	</nav>

	<!-- Page Content  -->
	<div id="content" class="p-2 p-md-2">

		<!-- Navbar -->
		<nav class="navbar navbar-expand-lg navbar-light" style="margin-bottom:7px; background-color: #F3F3F9;">
			<div class="container-fluid">

				<!-- button togle  -->
				<button type="button" id="sidebar-toggle" class="sidebar-toggle btn btn-primary">
					<i class="fa fa-bars"></i>
					<span class="sr-only">Toggle Menu</span>
				</button>

				<!-- nav menu original  -->
				<a class="navbar-brand" style="margin-left:13px; color: black;">NPI</a>

				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav me-auto mb-2 mb-lg-0">
						<li class="nav-item">
							<a class="nav-link active" aria-current="page" href="<?php echo base_url('#') ?>">Dashboard</a>
						</li>
						<?php 
						$level = $user['id_rule'];
						if ($level == 1) { ?>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="<?php echo base_url('#') ?>" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
									Menu Kepala Departemen
								</a>
								<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
									<li><a class="dropdown-item" href="<?php echo base_url('permohonan/datakaryawancuti') ?>">Data Permohonan Karyawan</a></li>
									<li><a class="dropdown-item" href="<?php echo base_url('overtime/overtimeKaryawan') ?>">Data Karyawan Overtime</a></li>
								</ul>
							</li>
						<?php } else if($level == 2) { ?>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="<?php echo base_url('#') ?>" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
									Data Karyawan
								</a>
								<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
									<li><a class="dropdown-item" href="<?php echo base_url('permohonan/datakaryawancuti') ?>">Permohonan Tidak Masuk Kerja</a></li>
									<li><a class="dropdown-item" href="<?php echo base_url('overtime/overtimeKaryawan') ?>">Data Permohonan Overtime</a></li>
								</ul>
							</li>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="<?php echo base_url('#') ?>" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
									Properti
								</a>
								<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
									<li><a class="dropdown-item" href="<?php echo base_url('properti/jeniscuti/') ?>">Jenis Cuti Khusus</a></li>
									<li><a class="dropdown-item" href="<?php echo base_url('properti/jenispermohonan/') ?>">Jenis Permohonan Tidak Masuk Kerja</a></li>
									<li><a class="dropdown-item" href="<?php echo base_url('properti/jadwalkerja') ?>">Jam Masuk Kerja</a></li>
								</ul>
							</li>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="<?php echo base_url('#') ?>" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
									Work Schedule
								</a>
								<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
									<li><a class="dropdown-item" href="<?php echo base_url('workschedule/workScheduleGrup') ?>">Tambah Schedule Grup</a></li>
									<li><a class="dropdown-item" href="<?php echo base_url('workschedule/workschedule_addperson') ?>">Tambah Person</a></li>
									<li><a class="dropdown-item" href="<?php echo base_url('workschedule/workschedule_person') ?>">Ubah Schedule Kerja Person</a></li>
									<li><a class="dropdown-item" href="<?php echo base_url('workschedule/workschedule_personHistory') ?>">History Change Person</a></li>
								</ul>
							</li>
						<?php } else{ ?>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="<?php echo base_url('#') ?>" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
									Formulir
								</a>
								<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
									<li><a class="dropdown-item" href="<?php echo base_url('permohonan/form_cuti') ?>">Formulir Permohonan</a></li>
									<li><a class="dropdown-item" href="<?php echo base_url('overtime/form_overtime') ?>">Formulir Permohonan Lembur</a></li>
								</ul>
							</li>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="<?php echo base_url('#') ?>" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
									Data Pribadi
								</a>
								<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
									<li><a class="dropdown-item" href="<?php echo base_url('permohonan/datapribadicuti') ?>">Data Permohonan Pribadi</a></li>
									<li><a class="dropdown-item" href="<?php echo base_url('overtime/overtimePribadi') ?>">Data Lembur Pribadi</a></li>
								</ul>
							</li>
						<?php } ?>
					</ul>
				</div>
			</div>
		</nav>

		<!-- End Navbar -->

		<!-- kontainer di place holder  -->
		<div class="border rounded-3 table-responsive" style="width:100%;padding:13px;box-shadow:2px 2px 2px rgba(216, 217, 219, 0.5); background-color: #F3F3F9;">
			<asp:ContentPlaceHolder id="ContentPlaceHolder1" runat="server">
			<?= $contents ?>
		</asp:ContentPlaceHolder>
	</div>

	<!-- footer original  -->
	<footer class=" flex-wrap justify-content-between align-items-center py-3 border-top" style="padding:9px;">
		<p class="text-center">&copy; Copyright - 2021 Nippisun Indonesia</p>
		<ul class="nav col-md-4 justify-content-end">
			<li class="nav-item">
				<asp:SiteMapPath ID="SiteMapPath2" runat="server" class="nav-link px-2 text-muted"></asp:SiteMapPath>
			</li>
		</ul>
	</footer>
</div>
<!-- sidebar js  -->
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/popper.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/main.js') ?>"></script>

<!-- data table js  -->
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-3.5.1.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.dataTables.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/dataTables.responsive.min.js') ?>"></script>

<!-- original bootsrap js  -->
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>

<!-- loader js  -->
<script type="text/javascript" src="<?php echo base_url('assets/js/custom.min.js') ?>"></script>

<!-- sidebar js  -->
<script type="text/javascript" src="<?php echo base_url('assets/js/next-sidebar2.js') ?>"></script>

<!-- Quicklab -->
<script src="<?php echo base_url('assets/asset/plugins/common/common.min.js') ?>"></script>
<script src="<?php echo base_url('assets/asset/js/custom.min.js') ?>"></script>
<script src="<?php echo base_url('assets/asset/js/settings.js') ?>"></script>
<script src="<?php echo base_url('assets/asset/js/gleek.js') ?>"></script>
<script src="<?php echo base_url('assets/asset/js/styleSwitcher.js') ?>"></script>

<!-- Chartjs -->
<script src="<?php echo base_url('assets/asset/plugins/chart.js/Chart.bundle.min.js') ?>"></script>
<!-- Circle progress -->
<script src="<?php echo base_url('assets/asset/plugins/circle-progress/circle-progress.min.js') ?>"></script>
<!-- Datamap -->
<script src="<?php echo base_url('assets/asset/plugins/d3v3/index.js') ?>"></script>
<script src="<?php echo base_url('assets/asset/plugins/topojson/topojson.min.js') ?>"></script>
<script src="<?php echo base_url('assets/asset/plugins/datamaps/datamaps.world.min.js') ?>"></script>
<!-- Morrisjs -->
<script src="<?php echo base_url('assets/asset/plugins/raphael/raphael.min.js') ?>"></script>
<script src="<?php echo base_url('assets/asset/plugins/morris/morris.min.js') ?>"></script>
<!-- Pignose Calender -->
<script src="<?php echo base_url('assets/asset/plugins/moment/moment.min.js') ?>"></script>
<script src="<?php echo base_url('assets/asset/plugins/pg-calendar/js/pignose.calendar.min.js') ?>"></script>
<!-- ChartistJS -->
<script src="<?php echo base_url('assets/asset/plugins/chartist/js/chartist.min.js') ?>"></script>
<script src="<?php echo base_url('assets/asset/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js') ?>"></script>

<script src="<?php echo base_url('assets/js/dashboard/dashboard-1.js') ?>"></script>
<!-- End Quicklab -->

<script src="<?= base_url("assets/") ?>asset/plugins/common/common.min.js"></script>
<script src="<?= base_url("assets/") ?>js/styleformsubmission.js"></script>
<script src="<?= base_url("assets/") ?>js/styleovertime.js"></script>
<script src="<?= base_url("assets/") ?>js/workschedule.js"></script>
<script src="<?= base_url("assets/") ?>js/custom.min.js"></script>
<script src="<?= base_url("assets/") ?>js/settings.js"></script>
<script src="<?= base_url("assets/") ?>js/gleek.js"></script>
<script src="<?= base_url("assets/") ?>js/styleSwitcher.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.4.0/perfect-scrollbar.min.js"></script>
<!-- Circle progress -->
<script src="<?= base_url("assets/") ?>asset/plugins/circle-progress/circle-progress.min.js"></script>

<!-- ChartistJS -->
<script src="<?= base_url("assets/") ?>asset/plugins/chartist/js/chartist.min.js"></script>
<script src="<?= base_url("assets/") ?>asset/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>
<script src="<?= base_url("assets/") ?>js/dashboard/dashboard-1.js"></script>
<!-- Date Picker -->
<script src="<?= base_url("assets/") ?>asset/plugins/moment/moment.js"></script>
<script src="<?= base_url("assets/") ?>asset/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
<script src="<?= base_url("assets/") ?>asset/plugins/jquery-asColorPicker-master/libs/jquery-asColor.js"></script>
<script src="<?= base_url("assets/") ?>asset/plugins/jquery-asColorPicker-master/libs/jquery-asGradient.js"></script>
<script src="<?= base_url("assets/") ?>asset/plugins/jquery-asColorPicker-master/dist/jquery-asColorPicker.min.js"></script>
<!-- Date Picker Plugin JavaScript -->
<!-- Date range Plugin JavaScript -->
<script src="<?= base_url("assets/") ?>asset/plugins/tables/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url("assets/") ?>asset/plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url("assets/") ?>asset/plugins/tables/js/datatable-init/datatable-basic.min.js"></script>
<!-- Calender -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="<?= base_url("assets/") ?>js/sweetcustom.js"></script>
<script src="<?= base_url("assets/") ?>js/workschedule.js"></script>
<script src="<?= base_url("assets/") ?>asset/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
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
		if ($(window).width() < 992) {

		} else{
			$('.img-fluid').css({"width":"100px","height":"100px"});
		}
	})
</script>
<script>
	// $(function(){
	// 	$('#mdate').datepicker({
	// 		format: "dd, MM yyyy",
	// 		multidate: true,
	// 		startDate: 'today',	
	// 		changeMounth: true,
	// 		changeYear: true
	// 	});
	// });
</script>

<!-- Date range Plugin JavaScript -->

<script src="<?= base_url("assets/") ?>asset/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
</body>
</html>