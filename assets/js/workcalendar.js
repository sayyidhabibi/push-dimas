$(document).ready(function () {
    $('#calendarKerja').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month'
        },
        height: 'auto',
        selectable: true,
        selectHelper: true,
        select: function(start, end, allDay){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Nama Karyawan Tidak Boleh Kosong!',
            });
        }
    })

});