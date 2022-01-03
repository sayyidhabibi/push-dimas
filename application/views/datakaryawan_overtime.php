 <!--**********************************
            Content body start
            ***********************************-->
 

     <!-- <div class="row page-titles mx-0">
         <div class="col p-md-0">

         </div>
     </div> -->
     <!-- row -->
     <?= $this->session->flashdata('pesan'); ?>
     <div class="container-fluid">
         <div class="row">
             <div class="col-12">
                 <div class="card">
                     <div class="card-body">
                         <h4 class="card-title mL">Data Overtime Karyawan </h4>

                         <div class="table-responsive">
                             <table class="table table-striped table-bordered zero-configuration">
                                 <thead>
                                     <tr>
                                         <th>Nama Pegawai</th>
                                         <th>Date Created</th>
                                         <th>Date Update</th>
                                         <th>Tanggal Overtime</th>
                                         <th>Start Overtime</th>
                                         <th>End Overtime</th>
                                         <th>Keperluan</th>
                                         <th>status</th>
                                         <th>Action</th>
                                     </tr>
                                 </thead>

                                 <tbody>
                                     <?php foreach ($overtime->result_array() as $key => $value) : {
                                                $id_lembur = $value['id_lembur'];
                                                $nama = $value['nama'];
                                                $Tanggalbuat = date("d-M-Y", strtotime($value['date_created']));
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
                                             <td><?= $Tanggalbuat; ?></td>
                                             <td><?= $Tanggalupdate; ?></td>
                                             <td><?= $tanggallembur; ?></td>
                                             <td><?= $start_ot; ?></td>
                                             <td><?= $end_ot; ?></td>
                                             <td><?= $keperluan; ?></td>
                                             <td><?php

                                                    if ($status == 0) {
                                                        echo "Menunggu Persetujuan";
                                                    } elseif ($status == 1) {
                                                        $path = base_url("assets/images/acc_icon.png");
                                                        echo "<img src='$path'class='img-fluid' alt='Responsive image'> Disetujui";
                                                    } else {
                                                        $path = base_url("assets/images/reject_icon.png");
                                                        echo "<img src='$path'class='img-fluid' alt='Responsive image'> Ditolak";
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
                                                     <?php if($status==0){
                                   ?>
                                   <a class="dropdown-item btn-hapus-permohonan" href="<?= base_url("web/delete_overtime/").$id_lembur?>">Hapus</a> 
                                   <a class="dropdown-item btn-setuju-permohonan"href="<?= base_url("web/insert_acc_lembur/".$id_lembur)?>">Setuju</a>
                                   <a class="dropdown-item btn-tolak-permohonan"href="<?= base_url("web/insert_tolak_lembur/".$id_lembur)?>">Tolak</a>
                                 <?php }else{?>
                                  <a class="dropdown-item btn-setuju-permohonan"href="<?= base_url("web/insert_acc_lembur/".$id_lembur)?>">Setuju</a>
                                   <a class="dropdown-item btn-tolak-permohonan"href="<?= base_url("web/insert_tolak_lembur".$id_lembur)?>">Tolak</a>
                                <?php } ?>

                                                     </div>
                                             </td>
                                         <?php endforeach;  ?>
                                         </tr>
                                 </tbody>
                                 <tfoot>
                                     <tr>
                                         <th>Nama Pegawai</th>
                                         <th>Date Created</th>
                                         <th>Date Update</th>
                                         <th>Tanggal Overtime</th>
                                         <th>Start Overtime</th>
                                         <th>End Overtime</th>
                                         <th>Keperluan</th>
                                         <th>status</th>
                                         <th>Action</th>
                                     </tr>
                                 </tfoot>
                             </table>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!-- #/ container -->