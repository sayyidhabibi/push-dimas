 <!--**********************************
            Content body start
            ***********************************-->
 
   <?= $this->session->flashdata('pesan'); ?>
   <div class="container-fluid">
     <div class="row">
       <div class="col-lg-12">
         <div class="card">
           <div class="card-body">
             <div class="card-title">
               <h4 class="mL">Work Schedule Grup</h4>
             </div>
             <div class="row">
               <div id="success-message" data-success="<?= $this->session->flashdata('success'); ?>"></div>
               <div id="error-message" data-failed="<?= $this->session->flashdata('error'); ?>"></div>
               <div class="col-md-8 py-3">
                 <div class="AddGrup">
                   <label>Name Group</label>
                   <?= form_open_multipart("workschedule/addGrup"); ?>
                   <div class="form-group mx-sm-3 mb-2">
                     <div class="ui-widget">
                       <select id="selectgrupname" style="background:#000000;">
                         <option value="">Search Grup</option>
                         <?php foreach ($getGrup->result_array() as $key => $value) {
                          ?>
                           <option value="<?= $value['nama_grup'] ?>"><?= $value["nama_grup"] ?></option>
                         <?php } ?>
                       </select>
                     </div>
                     <!-- <input type="search" class="form-control grupnamesearch selectgrup" placeholder="Input Grup Name" name="grupname" required="required" id="selectgrupname" value="<?= $this->session->userdata("namaGRUP"); ?>" autofocus> -->
                   </div>
                   <button type="submit" class="btn btn-rounded btn-primary mb-2">Save</button>
                   <?= form_close(); ?>
                   <br>
                   <label>Date Work</label>
                   <div id="calendargrup"></div>
                 </div>

               </div>
               <div class="col-md-4 py-3">
                 <div class="card gradient-9">
                   <div class="card-body">
                     <h4 class="text-white">Calendar Perusahaan </h4>
                       <div id="calendarEvent"></div>
                   </div>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 <!-- edit Modal -->
 <div class="modal fade" tabindex="-1" role="dialog" id="editEventModal">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h4 class="modal-title">Edit <span class="eventName"></span></h4>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
       </div>
       <div class="modal-body">
         <?php echo form_open("workschedule/updateScheduleGrup");  ?>
         <input type="hidden" name="id_schedule" id="editidmodalworkschedule">
         <div class="col-xs-12">
           <label class="col-xs-4" for="title">Name Grup</label>
           <input class="inputModal form-control grupnamesearch" type="text" name="updateNameGrup" id="editTitle" readonly />
         </div>
         <div class="col-xs-12">
           <label class="col-xs-4" for="starts-at">Starts at</label>
           <input class="inputModal form-control datepicker-workschedule" type="text" name="updateStartDate" id="editStartDate" readonly />
         </div>
         <div class="col-xs-12">
           <label class="col-xs-4" for="ends-at">Ends at</label>
           <input class="inputModal form-control datepicker-workschedule" type="text" name="updateEndDate" id="editEndDate" readonly />
         </div>
         <div class="col-xs-12">
           <label class="col-xs-4" for="edit-event-desc">Jenis Shift</label>
           <select class="form-control" name="updatejenisshift" id="editjadwal">
             <?php
              $sql = $this->db->get("tbl_jenis_jadwal");
              foreach ($sql->result_array() as $key => $row) {
              ?>
               <option value="<?= encrypt_url($row["id_jadwal"]) ?>" selected><?= $row["Nama_jadwal"] ?>
               </option>
             <?php } ?>
           </select>
         </div>
         <div class="col-xs-12">
           <div class="form-check mt-1">
             <input class="form-check-input" name="updatePerson" type="checkbox" value="ON" id="flexCheckDefault">
             <label class="form-check-label" for="flexCheckDefault">
               Update Schedule Person
             </label>
           </div>
         </div>
       </div>
       <div class="modal-footer">
         <a href="<?= base_url("web/delete_workschedule/") ?>" type="button" class="btn btn-danger" id="deleteEvent">Delete Event</a>
         <button type="submit" class="btn btn-primary" id="updateEvent">Save changes</button>
       </div>
     </div>
     <?php echo form_close();  ?>
     <!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
 </div>
 <!-- add Modal -->
 <div class="modal fade" tabindex="-1" role="dialog" id="modaladdgrup">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h4 class="modal-title">
           <h4>Add Work Schedule</h4>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       </div>
       <div class="modal-body">
         <?php echo form_open("workschedule/addScheduleGrup");  ?>
         <div class="col-xs-12">
           <label class="col-xs-4" for="title">Name Grup</label>

           <input class="inputaddModal form-control " id="addModalNameGrup" type="text" name="addNameGrup" readonly />
         </div>
         <div class="col-xs-12">
           <label class="col-xs-4" for="starts-at">Starts at</label>
           <input class="form-control datepicker-workschedule" id="addStartDate" type="text" name="addStartDate" id="addStartDate" readonly />
         </div>
         <div class="col-xs-12">
           <label class="col-xs-4" for="ends-at">Ends at</label>
           <input class=" form-control datepicker-workschedule" type="text" name="addEndDate" id="addEndDate" readonly>
         </div>
         <div class="col-xs-12">
           <label class="col-xs-4" for="edit-event-desc">Jenis Shift</label>
           <select class="form-control" name="jenisshift" id="addjadwal">
             <option value="">--------pilih Jadwal--------</option>
             <?php foreach ($jadwal->result_array() as $key => $value) :
                $nama_jadwal = $value['Nama_jadwal'];
                $id_jadwal = encrypt_url($value['id_jadwal']); ?>
               <option value="<?= $id_jadwal ?>"><?= $nama_jadwal  ?></option>
             <?php endforeach;  ?>
           </select>
         </div>
       </div>
       <div class="modal-footer">
         <button type="submit" class="btn btn-primary">Save changes</button>
       </div>
     </div>
     <?php echo form_close();  ?>
     <!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
 </div>