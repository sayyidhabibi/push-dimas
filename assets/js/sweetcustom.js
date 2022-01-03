$(document).on('click', '.btn-hapus-permohonan', function(e) {
    e.preventDefault();
    var link = $(this).attr('href');
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
 
    setTimeout(function(){ window.location = link ; }, 1000);
}else{
    Swal.fire("Cancelled", "Dibatalkan", "error");
}
})
});
$(document).on('click', '.btn-setuju-permohonan', function(e) {
    e.preventDefault();
    var link = $(this).attr('href');

    Swal.fire({
      title: 'Apakah anda yakin?',
      text: "Ingin Disetujui !",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#00a65a',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Setujui !',
      showClass: {
        popup: 'animate__animated animate__zoomIn'
    },
    hideClass: {
        popup: 'animate__animated animate__zoomOut'
    }
}).then((result) => {
  if (result.isConfirmed) {
    
    setTimeout(function(){ window.location = link ; }, 1000);
}else{
    Swal.fire("Cancelled", "Dibatalkan.", "error");
}
})
});
$(document).on('click', '.btn-tolak-permohonan', function(e) {
    e.preventDefault();
    var link = $(this).attr('href');

    Swal.fire({
      title: 'Apakah anda yakin?',
      text: "Ingin Menolak !",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#00a65a',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Tolak !',
      showClass: {
        popup: 'animate__animated animate__zoomIn'
    },
    hideClass: {
        popup: 'animate__animated animate__zoomOut'
    }
}).then((result) => {
  if (result.isConfirmed) {
    
    setTimeout(function(){ window.location = link ; }, 1000);
}else{
    Swal.fire("Cancelled", "Dibatalkan", "error");
}
})
});
$(document).ready(function(){
  let flash = $('#success-save').data('flash');

  if(flash) {
    Swal.fire({
        icon: 'success',
        title: 'success',
        text: flash,
        showClass: {
          popup: 'animate__animated animate__tada'
      },
      hideClass: {
          popup: 'animate__animated animate__zoomOut'
      }
  })
}
 let error = $('.error-form').data('error');
 console.log('error',error)
  if(error) {
    Swal.fire({
        icon: 'error',
        title: 'error',
        text: error,
        showClass: {
          popup: 'animate__animated animate__tada'
      },
      hideClass: {
          popup: 'animate__animated animate__zoomOut'
      }
  })
}
});
$(document).ready(function(){
  let successmsg = $('#success-message').data('success');
  console.log('success',successmsg);
  if(successmsg) {
    Swal.fire({
        icon: 'success',
        title: 'success',
        text: successmsg,
        showClass: {
          popup: 'animate__animated animate__tada'
      },
      hideClass: {
          popup: 'animate__animated animate__zoomOut'
      }
  })
}else{
  let errormsg = $('#error-message').data('failed');
  console.log('error',errormsg)
   if(errormsg) {
     Swal.fire({
         icon: 'error',
         title: 'error',
         text: errormsg,
         showClass: {
           popup: 'animate__animated animate__tada'
       },
       hideClass: {
           popup: 'animate__animated animate__zoomOut'
       }
   })
 }
}
 
})
$(document).on('click', '.btn-submit-update', function(e) {
  e.preventDefault();
  var link = $(this).attr('href');

  Swal.fire({
    title: 'Apakah anda yakin?',
    text: "Data Akan Keubah Permanen !",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#00a65a',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Data Diubah !',
    showClass: {
      popup: 'animate__animated animate__zoomIn'
  },
  hideClass: {
      popup: 'animate__animated animate__zoomOut'
  }
}).then((result) => {
if (result.isConfirmed) {
  $('.updateOvertime').submit();
}else{
  Swal.fire("Cancelled", "Dibatalkan", "error");
}
})
});