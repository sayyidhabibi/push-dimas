function ubahWarna() {
	document.querySelector('body.app').classList.toggle('bg-white');
	document.querySelector('body.app').classList.toggle('bg-fb2');
	document.querySelector('.sidebar').classList.toggle('bg-white');
	document.querySelector('.sidebar').classList.toggle('bg-fb1');
	document.querySelector('.fa-times-circle').classList.toggle('text-white');
	const headerColor = document.querySelector('header');
	headerColor.classList.toggle('bg-fb1');
	headerColor.classList.toggle('border-bottom');
	headerColor.classList.toggle('border-bottom-fb3');
	const footerColor = document.querySelector('footer');
	footerColor.classList.toggle('border-top');
	footerColor.classList.toggle('border-top-fb3');
	document.querySelector('.fa-home').classList.toggle('text-white');
	const cion = document.getElementsByClassName('icon-holder');
	for (let i = 0; i < cion.length; i++) {
		cion[i].classList.toggle('text-white');
	}
	const warnaColor = document.getElementsByClassName('text-dark');
	for (let i = 0; i < warnaColor.length; i++) {
		warnaColor[i].classList.toggle('text-white');
	}
	const title = document.getElementsByClassName('title');
	for (var i = 0; i < title.length; i++) {
		title[i].classList.toggle('text-white');
	}
	const sidebarLink = document.getElementsByClassName('sidebar-link');
	for (var i = 0; i < sidebarLink.length; i++) {
		sidebarLink[i].classList.toggle('text-white');
	}
	const navLink = document.getElementsByClassName('nav-link');
	for (var i = 0; i < navLink.length; i++) {
		navLink[i].classList.toggle('text-white');
	}
	document.getElementById('modeC').classList.toggle('fa-sun');
	document.getElementById('modeC').classList.toggle('fa-moon');
	document.getElementById('navbarNav').classList.toggle('bg-card');
	document.getElementById('navbarNav').classList.toggle('bg-fb1');
	document.getElementById('containerCard').classList.toggle('bg-card');
	document.getElementById('containerCard').classList.toggle('bg-fb1');
	const cB = document.querySelectorAll('.card');
	for (var i = 0; i < cB.length; i++) {
		cB[i].classList.toggle('bg-fb3');
	}
	const ctD = document.querySelectorAll('.ct-dashboard');
	for (var i = 0; i < ctD.length; i++) {
		ctD[i].classList.toggle('bg-fb3');
	}
	const idLingkaran = document.querySelector('#lingkaran');
	idLingkaran.classList.toggle('bg-dark');
	idLingkaran.classList.toggle('text-white');
	document.querySelector('.nama-user').classList.toggle('link-dark');
	document.querySelector('.header-right li ul li .dropdown-toggle').classList.toggle('link-dark');
	document.querySelector('.navbar-brand').classList.toggle('text-white');
	const dropdownMenu = document.getElementsByClassName('dropdown-menu');
	for (var i = 0; i < dropdownMenu.length; i++) {
		dropdownMenu[i].classList.toggle('bg-fb1');
	}
	const dropdownItem = document.querySelectorAll('.dropdown-item');
	for (var i = 0; i < dropdownItem.length; i++) {
		dropdownItem[i].classList.toggle('text-white');
		dropdownItem[i].classList.toggle('hover');
	}
	const mL = document.querySelectorAll('.mL');
	for (var i = 0; i < mL.length; i++) {
		mL[i].classList.toggle('text-white');
	}
	const set = document.querySelectorAll('.dropdown-content-body ul li');
	for (var i = 0; i < set.length; i++) {
		set[i].classList.toggle('bg-fb1');
	}
	set[2].classList.toggle('border-atas-hitam');
	set[2].classList.toggle('border-atas-putih');
	const setIcon = document.querySelectorAll('.dropdown-content-body ul li a i');
	for (var i = 0; i < setIcon.length; i++) {
		setIcon[i].classList.toggle('text-white');
	}
	const modeColorDark = document.querySelector('#btn-dark');
	modeColorDark.classList.toggle('MC-dark');
	const table = document.querySelectorAll('table');
	for (var i = 0; i < table.length; i++) {
		// table[i].classList.toggle('table-striped');
		table[i].classList.toggle('table-dark');
	}
	const tableLength = document.querySelectorAll('.dataTables_length');
	for (var i = 0; i < tableLength.length; i++) {
		tableLength[i].classList.toggle('text-white');
	}
	const tableFilter = document.querySelectorAll('.dataTables_filter');
	for (var i = 0; i < tableFilter.length; i++) {
		tableFilter[i].classList.toggle('text-white');
	}
	const tableInfo = document.querySelectorAll('.dataTables_info');
	for (var i = 0; i < tableInfo.length; i++) {
		tableInfo[i].classList.toggle('text-white');
	}
	const searchData = document.querySelectorAll('.dataTables_filter label input.form-control');
	for (var i = 0; i < searchData.length; i++) {
		searchData[i].classList.toggle('text-white');
	}
	const showEntris = document.querySelectorAll('.dataTables_length label select.form-control');
	for (var i = 0; i < showEntris.length; i++) {
		showEntris[i].classList.toggle('text-white');
	}
	const showEntri = document.querySelectorAll('.dataTables_length label select.form-control option');
	for (var i = 0; i < showEntri.length; i++) {
		showEntri[i].classList.toggle('bg-fb3');
	}
}

function dark() {
	document.querySelector('body.app').classList.remove('bg-white');
	document.querySelector('body.app').classList.add('bg-fb2');
	document.querySelector('.sidebar').classList.remove('bg-white');
	document.querySelector('.sidebar').classList.add('bg-fb1');
	document.querySelector('.fa-times-circle').classList.add('text-white');
	const headerColor = document.querySelector('header');
	headerColor.classList.add('bg-fb1');
	headerColor.classList.remove('border-bottom');
	headerColor.classList.add('border-bottom-fb3');
	const footerColor = document.querySelector('footer');
	footerColor.classList.remove('border-top');
	footerColor.classList.add('border-top-fb3');
	document.querySelector('.fa-home').classList.add('text-white');
	const cion = document.getElementsByClassName('icon-holder');
	for (let i = 0; i < cion.length; i++) {
		cion[i].classList.add('text-white');
	}
	const warnaColor = document.getElementsByClassName('text-dark');
	for (let i = 0; i < warnaColor.length; i++) {
		warnaColor[i].classList.add('text-white');
	}
	const title = document.getElementsByClassName('title');
	for (var i = 0; i < title.length; i++) {
		title[i].classList.add('text-white');
	}
	const sidebarLink = document.getElementsByClassName('sidebar-link');
	for (var i = 0; i < sidebarLink.length; i++) {
		sidebarLink[i].classList.add('text-white');
	}
	const navLink = document.getElementsByClassName('nav-link');
	for (var i = 0; i < navLink.length; i++) {
		navLink[i].classList.add('text-white');
	}
	document.getElementById('modeC').classList.remove('fa-sun');
	document.getElementById('modeC').classList.add('fa-moon');
	document.getElementById('navbarNav').classList.remove('bg-card');
	document.getElementById('navbarNav').classList.add('bg-fb1');
	document.getElementById('containerCard').classList.remove('bg-card');
	document.getElementById('containerCard').classList.add('bg-fb1');
	const cB = document.querySelectorAll('.card');
	for (var i = 0; i < cB.length; i++) {
		cB[i].classList.add('bg-fb3');
	}
	const ctD = document.querySelectorAll('.ct-dashboard');
	for (var i = 0; i < ctD.length; i++) {
		ctD[i].classList.remove('bg-fb3');
	}
	const idLingkaran = document.querySelector('#lingkaran');
	idLingkaran.classList.add('bg-dark');
	idLingkaran.classList.add('text-white');
	document.querySelector('.nama-user').classList.remove('link-dark');
	document.querySelector('.navbar-brand').classList.add('text-white');
	const dropdownMenu = document.getElementsByClassName('dropdown-menu');
	for (var i = 0; i < dropdownMenu.length; i++) {
		dropdownMenu[i].classList.add('bg-fb1');
	}
	const dropdownItem = document.querySelectorAll('.dropdown-item');
	for (var i = 0; i < dropdownItem.length; i++) {
		dropdownItem[i].classList.add('text-white');
		dropdownItem[i].classList.add('hover');
	}
	const mL = document.querySelectorAll('.mL');
	for (var i = 0; i < mL.length; i++) {
		mL[i].classList.add('text-white');
	}
	const set = document.querySelectorAll('.dropdown-content-body ul li');
	for (var i = 0; i < set.length; i++) {
		set[i].classList.add('bg-fb1');
	}
	set[2].classList.remove('border-atas-hitam');
	set[2].classList.add('border-atas-putih');
	const setIcon = document.querySelectorAll('.dropdown-content-body ul li a i');
	for (var i = 0; i < setIcon.length; i++) {
		setIcon[i].classList.add('text-white');
	}
	const modeColorDark = document.querySelector('#btn-dark');
	modeColorDark.classList.add('MC-dark');
	const table = document.querySelectorAll('table');
	for (var i = 0; i < table.length; i++) {
		// table[i].classList.remove('table-striped');
		table[i].classList.add('table-dark');
	}
	const tableLength = document.querySelectorAll('.dataTables_length');
	for (var i = 0; i < tableLength.length; i++) {
		tableLength[i].classList.add('text-white');
	}
	const tableFilter = document.querySelectorAll('.dataTables_filter');
	for (var i = 0; i < tableFilter.length; i++) {
		tableFilter[i].classList.add('text-white');
	}
	const tableInfo = document.querySelectorAll('.dataTables_info');
	for (var i = 0; i < tableInfo.length; i++) {
		tableInfo[i].classList.add('text-white');
	}
	const searchData = document.querySelectorAll('.dataTables_filter label input.form-control');
	for (var i = 0; i < searchData.length; i++) {
		searchData[i].classList.add('text-white');
	}
	const showEntris = document.querySelectorAll('.dataTables_length label select.form-control');
	for (var i = 0; i < showEntris.length; i++) {
		showEntris[i].classList.add('text-white');
	}
	const showEntri = document.querySelectorAll('.dataTables_length label select.form-control option');
	for (var i = 0; i < showEntri.length; i++) {
		showEntri[i].classList.add('bg-fb3');
	}
}

function light() {
	document.querySelector('body.app').classList.remove('bg-fb2');
	document.querySelector('body.app').classList.add('bg-white');
	document.querySelector('.sidebar').classList.remove('bg-fb1');
	document.querySelector('.sidebar').classList.add('bg-white');
	document.querySelector('.fa-times-circle').classList.remove('text-white');
	const headerColor = document.querySelector('header');
	headerColor.classList.remove('bg-fb1');
	headerColor.classList.add('border-bottom');
	headerColor.classList.remove('border-bottom-fb3');
	const footerColor = document.querySelector('footer');
	footerColor.classList.remove('border-top-fb3');
	footerColor.classList.add('border-top');
	document.querySelector('.fa-home').classList.remove('text-white');
	const cion = document.getElementsByClassName('icon-holder');
	for (let i = 0; i < cion.length; i++) {
		cion[i].classList.remove('text-white');
	}
	const warnaColor = document.getElementsByClassName('text-dark');
	for (let i = 0; i < warnaColor.length; i++) {
		warnaColor[i].classList.remove('text-white');
	}
	const title = document.getElementsByClassName('title');
	for (var i = 0; i < title.length; i++) {
		title[i].classList.remove('text-white');
	}
	const sidebarLink = document.getElementsByClassName('sidebar-link');
	for (var i = 0; i < sidebarLink.length; i++) {
		sidebarLink[i].classList.remove('text-white');
	}
	const navLink = document.getElementsByClassName('nav-link');
	for (var i = 0; i < navLink.length; i++) {
		navLink[i].classList.remove('text-white');
	}
	document.getElementById('modeC').classList.remove('fa-moon');
	document.getElementById('modeC').classList.add('fa-sun');
	document.getElementById('navbarNav').classList.remove('bg-fb1');
	document.getElementById('navbarNav').classList.add('bg-card');
	document.getElementById('containerCard').classList.remove('bg-fb1');
	document.getElementById('containerCard').classList.add('bg-card');
	const cB = document.querySelectorAll('.card');
	for (var i = 0; i < cB.length; i++) {
		cB[i].classList.remove('bg-fb3');
	}
	const idLingkaran = document.querySelector('#lingkaran');
	idLingkaran.classList.remove('bg-dark');
	idLingkaran.classList.remove('text-white');
	document.querySelector('.nama-user').classList.add('link-dark');
	document.querySelector('.navbar-brand').classList.remove('text-white');
	const dropdownMenu = document.getElementsByClassName('dropdown-menu');
	for (var i = 0; i < dropdownMenu.length; i++) {
		dropdownMenu[i].classList.remove('bg-fb1');
	}
	const dropdownItem = document.querySelectorAll('.dropdown-item');
	for (var i = 0; i < dropdownItem.length; i++) {
		dropdownItem[i].classList.remove('text-white');
		dropdownItem[i].classList.remove('hover');
	}
	const mL = document.querySelectorAll('.mL');
	for (var i = 0; i < mL.length; i++) {
		mL[i].classList.remove('text-white');
	}
	const set = document.querySelectorAll('.dropdown-content-body ul li');
	for (var i = 0; i < set.length; i++) {
		set[i].classList.remove('bg-fb1');
	}
	set[2].classList.remove('border-atas-putih');
	set[2].classList.add('border-atas-hitam');
	const setIcon = document.querySelectorAll('.dropdown-content-body ul li a i');
	for (var i = 0; i < setIcon.length; i++) {
		setIcon[i].classList.remove('text-white');
	}
	const modeColorDark = document.querySelector('#btn-dark');
	modeColorDark.classList.remove('MC-dark');
	// const table = document.querySelectorAll('table:not(#calendargrup)');
	// for (var i = 0; i < table.length; i++) {
	// 	table[i].classList.remove('table-dark');
	// 	table[i].classList.add('table-striped');
	// }
	// const calendergrup = document.querySelectorAll('#calendargrup table');
	// for (var i = 0; i < calendergrup.length; i++) {
	// 	calendergrup[i].classList.remove('table-striped');
	// }
	// const tbody = document.querySelectorAll('#calendargrup table tbody table');
	// for (var i = 0; i < tbody.length; i++) {
	// 	tbody[i].classList.remove('table-striped');
	// }
	const tableLength = document.querySelectorAll('.dataTables_length');
	for (var i = 0; i < tableLength.length; i++) {
		tableLength[i].classList.remove('text-white');
	}
	const tableFilter = document.querySelectorAll('.dataTables_filter');
	for (var i = 0; i < tableFilter.length; i++) {
		tableFilter[i].classList.remove('text-white');
	}
	const tableInfo = document.querySelectorAll('.dataTables_info');
	for (var i = 0; i < tableInfo.length; i++) {
		tableInfo[i].classList.remove('text-white');
	}
	const searchData = document.querySelectorAll('.dataTables_filter label input.form-control');
	for (var i = 0; i < searchData.length; i++) {
		searchData[i].classList.remove('text-white');
	}
	const showEntris = document.querySelectorAll('.dataTables_length label select.form-control');
	for (var i = 0; i < showEntris.length; i++) {
		showEntris[i].classList.remove('text-white');
	}
	const showEntri = document.querySelectorAll('.dataTables_length label select.form-control option');
	for (var i = 0; i < showEntri.length; i++) {
		showEntri[i].classList.remove('bg-fb3');
	}
}

function auto() {
	var waktu = new Date().getHours();
	if (waktu <= 5) {
		dark();
	}
	else if (waktu >= 18) {
		dark();
	} else {
		light();
	}
}

function ubahLingkaran() {
	document.getElementById('UpDown').classList.toggle('fa-caret-down');
	document.getElementById('UpDown').classList.toggle('fa-caret-up');
}

const ubahModeWarna = document.getElementById('btn-dark');
ubahModeWarna.onclick = ubahWarna;

const ubahAutoWarna = document.getElementById('btn-auto');
ubahAutoWarna.onclick = auto;

const ubahModeLingkaran = document.getElementById('lingkaran');
ubahModeLingkaran.onclick = ubahLingkaran;


$(document).ready(function () {
	$('#btn-dark').click(function () {

		let id;

		if (document.querySelector('.MC-dark') == null) {
			id = 'light';
		} else {
			id = 'dark';
		}

		let base_url = window.location.origin;

		$.ajax({
			url: base_url + '/NippisunIndonesiacopy' + '/' + 'Profile' + '/' + 'modeColor/' + id,
			dataType: 'json',
			contentType: "application/json",
			success: function (mode) {
				console.info("result", mode);
			}
		})
	})
})