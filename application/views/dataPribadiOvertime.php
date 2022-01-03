 <!--**********************************
            Content body start
            ***********************************-->
                <!--  <div class="row page-titles mx-0">
         <div class="col p-md-0">

         </div>
     </div> -->
     <!-- row -->
     <div id="success-message" data-success="<?= $this->session->flashdata('success'); ?>"></div>
   <div id="error-message" data-failed="<?= $this->session->flashdata('error'); ?>"></div>
     <div class="container-fluid">
         <div class="row">
             <div class="col-12">
                 <div class="card">
                     <!-- <div class="card-header text-right">
                         <h4 class="card-title text-left">Data Overtime Pribadi </h4>
                     </div> -->
                     <div class="card-body">
                     	<h4 class="card-title mL">Data Overtime Pribadi </h4>
                         <a href="<?= base_url("overtime/form_overtime") ?>" class="btn btn-info">Tambah Overtime [+]</a>

                         <div class="table-responsive">
                             <table class="table table-striped  zero-configuration" id="mydata">
                                 <thead>
                                     <tr>
                                         <th>Nama Pegawai</th>
                                         <th>Tanggal Dibuat</th>
                                         <th>Tanggal Overtime</th>
                                         <th>Tanggal Update</th>
                                         <th>Start Overtime</th>
                                         <th>End Overtime</th>
                                         <th>Keperluan</th>
                                         <th>status</th>
                                         <th>Action</th>
                                     </tr>
                                 </thead>

                                 <tbody>
                                     <?php foreach ($dataOvertimePribadi->result_array() as $key => $value) : {
                                                $id_lembur = encrypt_url($value['id_lembur']);
                                                $nama = $value['Name'];
                                                $Tanggaldibuat = date("d-M-Y", strtotime($value['date_created']));
                                                if ($value["date_update"] == NULL) {
                                                    $Tanggalupdate = "-";
                                                } else {
                                                    $Tanggalupdate = date("d-M-Y", strtotime($value['date_update']));
                                                }

                                                $tanggallembur = date("d-M-Y", strtotime($value['tanggal_lembur']));
                                                $start_ot = date("H:i A", strtotime($value['start_ot']));
                                                $end_ot = date("H:i A", strtotime($value['end_ot']));
                                                $status = $value['status'];
                                                $keperluan = $value['keperluan'];
                                            } ?>
                                         <tr>
                                             <td><?= $nama; ?></td>
                                             <td><?= $Tanggaldibuat; ?></td>
                                             <td><?= $tanggallembur; ?></td>
                                             <td><?= $Tanggalupdate; ?></td>
                                             <td><?= $start_ot; ?></td>
                                             <td><?= $end_ot; ?></td>
                                             <td><?= $keperluan; ?></td>
                                             <td><?php

                                                    if ($status == 0) {
                                                        echo "Menunggu Persetujuan";
                                                    } elseif ($status == 1) {
                                                        $path = base_url("assets/images/acc_icon.png");
                                                        echo "<img src='$path' alt='Responsive image'> Disetujui";
                                                    } else {
                                                        $path = base_url("assets/images/reject_icon.png");
                                                        echo "<img src='$path' alt='Responsive image'> Ditolak";
                                                    } ?></td>
                                             <td> <?php
                                                    $id_rule = $this->session->userdata('id_rule');
                                                    $sql = $this->db->query("SELECT * FROM tbl_karyawan where id_rule ='$id_rule'");
                                                    foreach ($sql->result() as $key => $row) {
                                                    }
                                                    ?>
                                                 <div class="dropdown">
                                                     <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                         Pilih Action
                                                     </button>
                                                     <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                         <?php
                                                            if ($status == 0) {

                                                            ?>
                                                             <a id="editovertime" class="dropdown-item" data-toggle="modal" data-target="#editlembur<?= $id_lembur ?>" href="#">Edit</a>

                                                         <?php
                                                            } else {
                                                                echo "No Action";
                                                            } ?>

                                                     </div>
                                             </td>
                                         <?php endforeach; ?>
                                         </tr>
                                 </tbody>
                             </table>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!-- #/ container -->
 </div>


 <!-- end modal -->
 <?php foreach ($dataOvertimePribadi->result_array() as $key => $value) :
        $id_lembur = encrypt_url($value['id_lembur']);
        $nama = $value['Name'];
        $Tanggaldibuat = $value['date_created'];
        $tanggallembur = date("m/d/Y",strtotime($value['tanggal_lembur']));
        $start_ot = date("H:i", strtotime($value['start_ot']));
        $end_ot = date("H:i", strtotime($value['end_ot']));
        $status = $value['status'];
        $keperluan = $value['keperluan'];
        $nik = $value['NIK'];
        $DepartemenName = $value['DepartemenName'];
    ?>
     <div class="modal fade" id="editlembur<?= $id_lembur ?>" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLongTitle">Update Data Lembur <?= $nama  ?></h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">
                     <div class="basic-form">
                         <?php echo form_open_multipart("overtime/updateOvertimePribadi",array('class' => 'updateOvertime')) ?>
                         <input type="hidden" value="<?= $id_lembur ?>" name="id_lembur">
                         <div class="form-group">
                             <div class="form-group">
                                 <label>Keterangan Lembur</label>
                                 <textarea name="updateketerangan_lembur" class="form-control"><?= $keperluan ?></textarea>
                             </div>
                         </div>
                         <div class="form-group">
                             <div class="form-group">
                                 <label>Tanggal Lembur</label>
                                 <input type="text" class="form-control tanggal-lembur" placeholder="dd/mm/yyyy" name="updatetanggallembur" value="<?= $tanggallembur ?>" readonly required> <span class="input-group-append " required>
                             </div>
                         </div>
                         <div class="form-row">
                             <div class="form-group col-md-6">
                                 <label>Start In</label>
                                 <input type="time" value="<?= $start_ot ?>" class="form-control " placeholder="dd/mm/yyyy" name="updatejamStartLembur" required> <span class="input-group-append " required>
                             </div>
                             <div class="form-group col-md-6">
                                 <label>Start Out</label>
                                 <input type="time" class="form-control" placeholder="dd/mm/yyyy" value="<?= $end_ot ?>" name="updatejamEndLembur" required> <span class="input-group-append">
                             </div>
                         </div>
                     </div>
                     <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                         <button type="submit" class="btn btn-primary btn-submit-update">Simpan Perubahan</button>
                     </div>
                     <?php echo form_close() ?>
                 </div>
             </div>
         </div>
     </div>
     <?php endforeach; ?>
     <!-- end edit Modal -->


     <!--**********************************
            Content body end
            ***********************************-->