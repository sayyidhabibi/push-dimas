

$(document).ready(function() {
var editEvent;
  $('#calendar').fullCalendar({

    header:{
     left:'prev,next today',
     center:'title',
     right:'month'
   },
   height:'auto',
   eventSources:[{
    url:("<?= base_url('web/getevent_grup')?>"),
      color: 'yellow', // an option!
      textColor: 'black'
    }],
    eventRender:function(event,elemet,view){
      var showTypes=true,showSearchTerms = true;
      var valueselect = $('#selectgrup').val();
      console.log('valueselect',valueselect);
      if(valueselect.length > 1 ){
        showSearchTerms = event.title.indexOf(valueselect) >= 0; 
      }
      else{
        showTypes=true;
      }
      return showSearchTerms && showTypes;
    }
    
  });
  $(document).on('keydown','.grupnamesearch',function(){

    var id = this.id;
    $('#'+id).autocomplete({
      source:function(request,response){
        $.ajax({
          url:"<?= base_url('web/getsearchgrupperson/')  ?>",       
          type:"post",
          dataType:"json",
          data:{
            search: request.term,
            request:1
          },
          success:function(data){
            response(data);
            $('#calendar').fullCalendar('rerenderEvents');
          }
        });
      },
      select:function(event,ui){
        $(this).val(ui.item.label);
        var namegrup = ui.item.value;
        $.ajax({
          url:"<?= base_url('web/getdatagrup')  ?>",   
          type:"post",
          dataType:"json",
          data:{
            namagrup:namegrup,request:2
          },
          success:function(response){
            var len = response.length;

            if (len>0) {
             $('#calendar').fullCalendar('rerenderEvents');

           }
         }
       });
      }
    });
  });
/*  editEvent = function(event, element, view) {
   $('.popover.fade.top').remove();
   $(element).popover("hide");
   if(event.allDay == true){
    $('#editEventModal').find('#editEndDate').attr("disabled", true);
    $('#editEventModal').find('#editEndDate').val("");
    $(".allDayEdit").prop('checked', true);
  }else{
    $('#editEventModal').find('#editEndDate').attr("disabled", false);
    $('#editEventModal').find('#editEndDate').val(event.end.format('ddd DD MMM YYYY HH:mm'));
    $(".allDayEdit").prop('checked', false);
  }
}*/
});
