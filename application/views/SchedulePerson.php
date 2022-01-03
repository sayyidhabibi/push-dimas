
  <?= $this->session->flashdata('pesan'); ?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <div class="card-title">
              <h4 class="mL">Work Schedule Person</h4>
            </div>
            <div class="row">
              <div id="success-message" data-success="<?= $this->session->flashdata('success'); ?>"></div>
              <div id="error-message" data-failed="<?= $this->session->flashdata('error'); ?>"></div>
              <div class="col-md-8 py-3">
                <div class="AddGrup">
                  <label>Search Name Person</label>

                  <div class="form-group mx-sm-3 mb-2">
                    <div class="ui-widget">
                      <select id="selectperson" style="background:#000000;">
                        <option value="">Search Grup</option>
                        <?php foreach ($karyawan->result_array() as $key => $value) {
                        ?>
                          <option value="<?= $value['Name'] ?>"><?= $value["Name"] ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <!-- <input type="search" class="form-control grupnamesearch selectgrup" placeholder="Input Grup Name" name="grupname" required="required" id="selectgrupname" value="<?= $this->session->userdata("namaGRUP"); ?>" autofocus> -->
                  </div>

                  <br>
                  <label>Date Work</label>
                  <div id="calendarPerson"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- Edit Schedule Person -->
<div class="modal fade" tabindex="-1" role="dialog" id="editEventPersonmodal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit <span class="eventName"></span></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <?php echo form_open("workschedule/updateSchedulePerson");  ?>
        <input type="hidden" name="id_schedulePerson" id="editidModalSchedulePerson">
        <input type="hidden" name="id_scheduleGrup" id="editidModalScheduleGrup">
        <div class="col-xs-12">
          <label class="col-xs-4" for="title">Nama Grup</label>
          <input class="inputModal form-control " type="text" name="updateNameGrup" id="editTitle" readonly />
        </div>
        <div class="col-xs-12">
          <label class="col-xs-4" for="title">Nama Karyawan</label>
          <input class="inputModal form-control" type="text" name="updateNameEmployee" id="editNamaKaryawan" readonly />
        </div>
        <div class="col-xs-12">
          <label class="col-xs-4" for="starts-at">Mulai Kerja</label>
          <input class="inputModal form-control datepicker-workschedule" type="text" name="updateStartDate" id="editStartDate" readonly />
        </div>
        <div class="col-xs-12">
          <label class="col-xs-4" for="ends-at">Berakhir Kerja</label>
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
            <input class="form-check-input" name="updatePersonByGrup" type="checkbox" value="ON" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
              Update Schedule Person By Grup
            </label>
          </div>
        </div>
        <div class="col-xs-12">
          <div class="form-check mt-1">
            <input class="form-check-input" name="updatePersonDontKnowEndWork" type="checkbox" value="ON" id="flexCheckDefault2">
            <label class="form-check-label" for="flexCheckDefault2">
              Update Schedule Dont Know End Work
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