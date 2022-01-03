// function callDiff(){

//   let start = $('.setMin').datepicker('getDate');
//     let end = $('.setMax').datepicker('getDate');
//     if (!start || !end) return;
//     var days = parseInt((end - start) / (1000 * 60 * 60 * 24));
//       let tday = days + 1;


//     console.info("days",tday)
//     $('.setDay').val(tday);


// }
// function dateLembur() {
//   let minDate = $(".setMin").val();
//   let select = parseInt($(".alasan").find(':selected').attr('data-id'));
//   console.log('select',select);
//   let date = new Date(minDate);
//   let newdate = new Date(minDate);
//   newdate.setDate(newdate.getDate()+select-1);
//   let month = newdate.getMonth()+1;
//   let day = newdate.getDate();
//   let output = newdate.getFullYear() + '/' + (month<10 ? '0' : '') + month + '/' + (day<10 ? '0' : '') + day;

//   console.log(output);

//   // Destroy 
//   $('.setMax').datepicker('destroy');

//   // Initialize
//   $('.setMax').datepicker({
//    dateFormat: "dd-M-yy",
//    maxDate:'+1m +10d',
//    minDate: -10,
//    onSelect:callDiff
//  });

//   // Set minDate and maxDate
//   if(minDate != ''){
//    $('.setMax').datepicker('option', 'minDate', new Date(minDate));
//    $('.setMax').datepicker('setDate',new Date(output));
//  }

//  if(output != ''){
//    $('.setMax').datepicker('option', 'maxDate', new Date(output));
//  }

//  callDiff();
// }
// Add Permohonan
$(document).ready(function () {
	//add permohonan
	$('.alasan').hide();
	$(".keterangan_leave").hide();
	$(".uploadbukti").hide();
	$('.tujuan_trip').hide();
	$('.cutiTahunan').hide();
	$('#tDay').hide();
	$('#dayGo').hide();
	$(".jeniscuti").change(function () {
		let v = $(this).val();
		$('#mdate').val("");
		console.info("value", v);
		if (v == "Permohonan Cuti Khusus") {
			$('.alasan').change(function () {
				$('#mdate').val("");
				$(".setDay").prop('readonly', true);
				let s = parseInt($(".alasan").find(':selected').attr('data-id'));
				console.info("value select", s);
				$('.setDay').val(s);
				console.info()
				$('#mdate').datepicker('destroy').datepicker({
					// format: "dd M yyyy",
					// multidate: s,
					// changeMounth: true,
					// changeYear: true,
					// highlight: true
					format: "dd, MM yyyy",
					multidate: true,
					changeMounth: false,
					changeYear: true,
					minDate: new Date("2018", "05", "28"),
					startDate: today,
					daysOfWeekDisabled: [0, 6]
				});
			});
		} else {
			let v2 = document.getElementsByClassName("setDay");
			v2[0].addEventListener('input', updateValue);
		}

		// $('.setMin').datepicker('setDate', '');
		// $('.setMax').datepicker('setDate', '');
		// $('.setDay').val("");
		let selected = $(this).find(":selected").val();

		if (selected == "Permohonan Cuti Khusus") {
			$('#tDay').show();
			$('#dayGo').show();
			$('.alasan').show();
			$(".keterangan_leave").hide();
			$(".uploadbukti").show();
			$(".tujuan_trip").hide();
			$('.cutiTahunan').hide();
			$(".setDay").prop('readonly', true);
			$('.keterangancuti').prop('required', false);
			$('.keterangan').prop('required', false);
			$('.uploadimage').prop('required', true);
			$('.keperluan').prop('required', true);
			$(".tujuantrip").prop('required', false);

		} else if (selected == "Permohonan Tidak Masuk Kerja") {
			$('#tDay').show();
			$('#dayGo').show();
			$('.alasan').hide();
			$(".keterangan_leave").show();
			$(".uploadbukti").show();
			$('.tujuan_trip').hide();
			$('.cutiTahunan').hide();
			$(".setDay").prop('readonly', false);
			$('.keterangancuti').prop('required', false);
			$(".keperluan").find(':selected').removeAttr('data-id');
			$(".keterangan").prop('required', true);
			$(".keperluan").prop('required', false);
			$(".tujuantrip").prop('required', false);
		}
		else if (selected == "Permohonan Cuti Mendadak") {
			$('#tDay').show();
			$('#dayGo').show();
			$('.alasan').hide();
			$(".keterangan_leave").show();
			$(".uploadbukti").show();
			$('.tujuan_trip').hide();
			$('.cutiTahunan').hide();
			$(".setDay").prop('readonly', false);
			$('.keterangancuti').prop('required', false);
			$(".keperluan").find(':selected').removeAttr('data-id');
			$(".keterangan").prop('required', true);
			$(".keperluan").prop('required', false);
			$(".tujuantrip").prop('required', false);
		} else if (selected == "Permohonan Business Trip") {
			$('#tDay').show();
			$('#dayGo').show();
			$('.alasan').hide();
			$(".keterangan_leave").hide();
			$(".uploadbukti").show();
			$('.cutiTahunan').hide();
			$(".setDay").prop('readonly', false);
			$('.keterangancuti').prop('required', false);
			$(".keperluan").find(':selected').removeAttr('data-id');
			$(".keterangan").prop('required', false);
			$(".tujuantrip").prop('required', true);
			$(".uploadimage").prop('required', true);
			$(".keperluan").prop('required', false);
		}
		else if (selected == "Permohonan Cuti Tahunan") {
			$('#tDay').show();
			$('#dayGo').show();
			$('.cutiTahunan').show();
			$('.alasan').hide();
			$(".keterangan_leave").hide();
			$(".uploadbukti").hide();
			$('.tujuan_trip').hide();
			$(".setDay").prop('readonly', false);
			$('.keterangancuti').prop('required', true);
			$('.keterangan').prop('required', false);
			$(".keperluan").find(':selected').removeAttr('data-id');
			$('.uploadimage').prop('required', false);
			$('.keperluan').prop('required', false);
			$(".tujuantrip").prop('required', false);
		}
		else {
			$('.alasan').hide();
			$(".keterangan_leave").hide();
			$(".uploadbukti").hide();
			$('.tujuan_trip').hide();
			$('.cutiTahunan').hide();
			$('#tDay').hide();
			$('#dayGo').hide();
		}
	});

	$('#tanggalLembur').datepicker({
		format: "dd MM yyyy",
		changeMounth: true,
		changeYear: true
	});

	var date = new Date();
	var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());

	let base_url = window.location.origin;
	let url = base_url + '/NippisunIndonesiacopy' + '/' + 'Permohonan' + '/' + 'jadwalKerjaNonShift';

	$.ajax({ 
		url: url,
		dataType: 'json',
		contentType: "application/json",
		success: function (mode) {
			$('#mdate').datepicker({
				format: "dd, MM yyyy",
				multidate: true,
				changeMounth: false,
				changeYear: true,
				minDate: new Date("2018", "05", "28"),
				startDate: today,
				datesDisabled: mode
			});
		}
	});

	// $('')
	// mul_dp();
	$('#mdate').on('changeDate', function (evt) {
	});

});

// update Permohonan 
$(document).ready(function () {
	let e = document.getElementsByClassName("jeniscuti")[0].value;
	var v4 = document.getElementsByClassName("Utday")[0].value;
	$('.mdate').datepicker({
		format: "dd M yyyy",
		multidate: v4,
		changeMounth: true,
		changeYear: true,
		highlight: true
	});
	$(".Utday").on('focus', function () {
		v4 = document.getElementsByClassName("Utday");
		v4[0].addEventListener('input', updateValue);
	});



	if (e == "Permohonan Cuti Khusus") {
		setDate();
		$('#U-alasan').show();
		$(".U-keterangan_leave").hide();
		$(".U-uploadbukti").show();
		$('.U-tujuan_trip').hide();
		$(".setDay").prop('readonly', true);

	} else if (e == "Permohonan Cuti Mendadak") {
		$('#U-alasan').hide();
		$(".U-keterangan_leave").show();
		$(".U-uploadbukti").show();
		$('.U-tujuan_trip').hide();
	} else if (e == "Permohonan Tidak Masuk Kerja") {
		$('#U-alasan').hide();
		$(".U-keterangan_leave").show();
		$(".U-uploadbukti").show();
		$('.U-tujuan_trip').hide();

	} else if (e == "Permohonan Business Trip") {
		$('#U-alasan').hide();
		$(".U-keterangan_leave").hide();
		$(".U-uploadbukti").show();
		$('.U-tujuan_trip').hide();


	} else {
		$('#U-alasan').hide();
		$(".U-keterangan_leave").hide();
		$(".U-uploadbukti").hide();
		$('.U-tujuan_trip').hide();

	}

});
$(document).ready(function () {
	$("#btn-update").on('click', function () {

		let e = document.getElementsByClassName("jeniscuti")[0].value;;
		if (e == "Permohonan Cuti Khusus") {
			$('.keterangan').prop('required', false);
			$('.uploadimage').prop('required', false);
			$('.keperluan').prop('required', true);
			$(".tujuantrip").prop('required', false);
		} else if (e == "Permohonan Cuti Mendadak") {
			$(".keterangan").prop('required', true);
			$(".tujuantrip").prop('required', false);
			$(".keperluan").prop('required', false);
			$(".keperluan").find(':selected').removeAttr('data-id');
		} else if (e == "Permohonan Tidak Masuk Kerja") {
			$(".keterangan").prop('required', true);
			$(".keperluan").prop('required', false);
			$(".tujuantrip").prop('required', false);
			$(".keperluan").find(':selected').removeAttr('data-id');
		} else if (e == "Permohonan Business Trip") {
			$(".keterangan").prop('required', false);
			$(".tujuantrip").prop('required', true);
			$(".uploadimage").prop('required', false);
			$(".keperluan").prop('required', false);
			$(".keperluan").find(':selected').removeAttr('data-id');
		}
		else {
			$(".keterangan").prop('required', false);
			$(".tujuantrip").prop('required', false);
			$(".uploadimage").prop('required', false);
			$(".keperluan").prop('required', false);
			$(".keperluan").find(':selected').removeAttr('data-id');
		}
	})
});
// let e = document.getElementsByClassName("jeniscuti")[0].value;
// let v3 = $('.setDay').val();
// if (v3 != null) {
//   $('#mdate').datepicker('destroy').datepicker({
//     format: "dd M yyyy",
//     multidate: v3,
//     changeMounth: true,
//     changeYear: true,
//     highlight: true
//   });
// }

// if (e == "Permohonan Cuti Khusus") {
//   $('.alasan').show();
//   $(".keterangan_leave").hide();
//   $(".uploadbukti").show();
//   $('.tujuan_trip').hide();
//   $('.cutiTahunan').hide();

// } else if (e == "Permohonan Cuti Mendadak") {
//   $('.alasan').hide();
//   $(".keterangan_leave").show();
//   $(".uploadbukti").show();
//   $('.tujuan_trip').hide();
//   $('.cutiTahunan').hide();

// } else if (e == "Permohonan Tidak Masuk Kerja") {
//   $('.alasan').hide();
//   $(".keterangan_leave").show();
//   $(".uploadbukti").show();
//   $('.tujuan_trip').hide();
//   $('.cutiTahunan').hide();

// } else if (e == "Permohonan Business Trip") {
//   $('.alasan').hide();
//   $(".keterangan_leave").hide();
//   $(".uploadbukti").show();
//   $('.cutiTahunan').hide();

// } else if (e == "Permohonan Cuti Tahunan") {
//   $('.cutiTahunan').show();
//   $('.alasan').hide();
//   $(".keterangan_leave").hide();
//   $(".uploadbukti").hide();
//   $('.tujuan_trip').hide();

// } else {
//   $('.alasan').hide();
//   $(".keterangan_leave").hide();
//   $(".uploadbukti").hide();
//   $(".tujuan_trip").hide();
//   $('.cutiTahunan').hide();
// }

// $(".jeniscuti").change(function () {
//   $('.setMin').datepicker('setDate', '');
//   $('.setMax').datepicker('setDate', '');
//   $('.setDay').val("");
//   let selected = $('.jeniscuti').find(":selected").val();

//   if (selected == "Permohonan Cuti Khusus") {
//     $('.alasan').show();
//     $(".keterangan_leave").hide();
//     $(".uploadbukti").show();
//     $(".tujuan_trip").hide();
//     $('.cutiTahunan').hide();
//     $(".setDay").prop('readonly', true);
//     $('.keterangancuti').prop('required', false);
//     $('.keterangan').prop('required', false);
//     $('.uploadimage').prop('required', true);
//     $('.keperluan').prop('required', true);
//     $(".tujuantrip").prop('required', false);

//   } else if (selected == "Permohonan Tidak Masuk Kerja") {
//     $('.alasan').hide();
//     $(".keterangan_leave").show();
//     $(".uploadbukti").show();
//     $('.tujuan_trip').hide();
//     $('.cutiTahunan').hide();
//     $(".setDay").prop('readonly', false);
//     $('.keterangancuti').prop('required', false);
//     $(".keperluan").find(':selected').removeAttr('data-id');
//     $(".keterangan").prop('required', true);
//     $(".keperluan").prop('required', false);
//     $(".tujuantrip").prop('required', false);
//   }
//   else if (selected == "Permohonan Cuti Mendadak") {
//     $('.alasan').hide();
//     $(".keterangan_leave").show();
//     $(".uploadbukti").show();
//     $('.tujuan_trip').hide();
//     $('.cutiTahunan').hide();
//     $(".setDay").prop('readonly', false);
//     $('.keterangancuti').prop('required', false);
//     $(".keperluan").find(':selected').removeAttr('data-id');
//     $(".keterangan").prop('required', true);
//     $(".keperluan").prop('required', false);
//     $(".tujuantrip").prop('required', false);
//   } else if (selected == "Permohonan Business Trip") {
//     $('.alasan').hide();
//     $(".keterangan_leave").hide();
//     $(".uploadbukti").show();
//     $('.cutiTahunan').hide();
//     $(".setDay").prop('readonly', false);
//     $('.keterangancuti').prop('required', false);
//     $(".keperluan").find(':selected').removeAttr('data-id');
//     $(".keterangan").prop('required', false);
//     $(".tujuantrip").prop('required', true);
//     $(".uploadimage").prop('required', true);
//     $(".keperluan").prop('required', false);
//   }
//   else if (selected == "Permohonan Cuti Tahunan") {
//     $('.cutiTahunan').show();
//     $('.alasan').hide();
//     $(".keterangan_leave").hide();
//     $(".uploadbukti").hide();
//     $('.tujuan_trip').hide();
//     $(".setDay").prop('readonly', false);
//     $('.keterangancuti').prop('required', true);
//     $('.keterangan').prop('required', false);
//     $(".keperluan").find(':selected').removeAttr('data-id');
//     $('.uploadimage').prop('required', false);
//     $('.keperluan').prop('required', false);
//     $(".tujuantrip").prop('required', false);

//   }
// });
// $('.keperluan').change(function () {
//   $('.setMin').datepicker('setDate', '');
//   $('.setMax').datepicker('setDate', '');
//   $('.setDay').val("");
// })



//  $(document).ready(function(){

//  // Initializ e Date picker 
//  $('#mdate').datepicker({
//   multidate:true,
//   dateFormat: "dd-M-YY",
//   changeMonth: true,
//   changeYear: true

// });
// });
// Changing date range
//  $('.setMin').change(function(){
// Get value
//   let minDate = $(".setMin").val();
//   let select = parseInt($(".alasan").find(':selected').attr('data-id'));
//   console.log('select',select);
//   let date = new Date(minDate);
//   let newdate = new Date(minDate);
//   newdate.setDate(newdate.getDate()+select-1);
//   let month = newdate.getMonth()+1;
//   let day = newdate.getDate();
//   let output = newdate.getFullYear() + '/' + (month<10 ? '0' : '') + month + '/' + (day<10 ? '0' : '') + day;

//   console.log(output);

//   // Destroy 
//   $('.setMax').datepicker('destroy');

//   // Initialize
//   $('.setMax').datepicker({
//    dateFormat: "dd-M-yy",
//    maxDate:'+1m +10d',
//    minDate: -10,
//    onSelect:callDiff
//  });

//   // Set minDate and maxDate
//   if(minDate != ''){
//    $('.setMax').datepicker('option', 'minDate', new Date(minDate));
//    $('.setMax').datepicker('setDate',new Date(output));
//  }

//  if(output != ''){
//    $('.setMax').datepicker('option', 'maxDate', new Date(output));
//  }

//  callDiff();
// 
// });
// });

// $(document).ready(function () {
//   $(".btn-permohonan").on('click', function () {
//     let s = $('.jeniscuti').find(":selected").val();
//     let e = document.getElementsByClassName("jeniscuti")[0].value;;
//     if (e == "Permohonan Cuti Khusus" || s == "Permohonan Cuti Khusus") {
//       $('.keterangan').prop('required', false);
//       $('.uploadimage').prop('required', true);
//       $('.keperluan').prop('required', true);
//       $(".tujuantrip").prop('required', false);
//       $('.keterangan').val("");
//       $('.keterangancuti').val("");
//     } else if (e == "Permohonan Cuti Mendadak" || s == "Permohonan Cuti Mendadak") {
//       $(".keterangan").prop('required', true);
//       $(".tujuantrip").prop('required', false);
//       $(".keperluan").prop('required', false);
//       $('.tujuantrip').val("");
//       $('.keperluan').val("");
//       $(".keperluan").find(':selected').removeAttr('data-id');
//       $('.keterangancuti').val("");
//     } else if (e == "Permohonan Tidak Masuk Kerja" || s == "Permohonan Tidak Masuk Kerja") {
//       $(".keterangan").prop('required', true);
//       $(".keperluan").prop('required', false);
//       $(".tujuantrip").prop('required', false);
//       $(".uploadimage").prop('required', true);
//       $(".keperluan").find(':selected').removeAttr('data-id');
//       $('.keperluan').val("");
//       $('.tujuantrip').val("");
//       $('.keterangancuti').val("");
//     } else if (e == "Permohonan Business Trip" || s == "Permohonan Business Trip") {
//       $(".keterangan").prop('required', false);
//       $(".uploadimage").prop('required', true);
//       $(".keperluan").prop('required', false);
//       $(".keperluan").find(':selected').removeAttr('data-id');
//       $('.keterangan').val("");
//       $('.keperluan').val("");
//       $('.keterangancuti').val("");
//     }
//     else if (e == "Permohonan Cuti Tahunan" || s == "Permohonan Cuti Tahunan") {
//       $(".keterangan").prop('required', false);
//       $(".tujuantrip").prop('required', false);
//       $(".uploadimage").prop('required', false);
//       $(".keperluan").prop('required', false);
//       $(".keperluan").find(':selected').removeAttr('data-id');
//       $('.keterangan').val("");
//       $('.uploadimage').val("");
//       $('.keperluan').val("");
//     }
//   })

// })
// $(document).ready(function () {
//   $('#tanggalLembur').datepicker({
//     format: "dd MM yyyy",
//     changeMounth: true,
//     changeYear: true
//   });

//   $('#mdate').datepicker({
//     format: "dd, MM yyyy",
//     multidate: true,
//     changeMounth: true,
//     changeYear: true
//   });
//   // $('')
//   // mul_dp();
//   $('#mdate').on('changeDate', function (evt) {
//     console.log(evt.date);
//   });
//   $('.jeniscuti').change(function () {
//     let v = $(this).val();
//     $('#mdate').val("");
//     console.info("value", v);
//     if (v == "Permohonan Cuti Khusus") {
//       $('.alasan').change(function () {
//         $('#mdate').val("");
//         $(".setDay").prop('readonly', true);
//         let s = parseInt($(".alasan").find(':selected').attr('data-id'));
//         $('.setDay').val(s);
//         $('#mdate').datepicker('destroy').datepicker({
//           format: "dd M yyyy",
//           multidate: s,
//           changeMounth: true,
//           changeYear: true,
//           highlight: true
//         });
//       });
//     } else {
//       let v2 = document.getElementsByClassName("setDay");
//       v2[0].addEventListener('input', updateValue);
//     }
//   })

// })
function updateValue(e) {
	let v3 = e.target.value
	console.info("value", v3);
	$('.mdate').datepicker('destroy').datepicker({
		format: "dd M yyyy",
		multidate: v3,
		changeMounth: true,
		changeYear: true,
		highlight: true
	});
}
function setDate() {

}
// function mul_dp(num_days = 2) {

//   $('#numdays').val(num_days);

//   $("#Txt_Date").datepicker('destroy').datepicker({
//     format: 'd-mm-yyyy',
//     inline: false,
//     lang: 'en',
//     step: num_days,
//     multidate: num_days,
//     closeOnDateSelect: true,
//     onSelect: function (dateText, inst) {
//       $(this).change();
//     }
//   });
// }
// function setDay(value){

// }
