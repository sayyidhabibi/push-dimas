<div class="container">
    <div id="calendarKerja"></div>
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
    </div>
</div>