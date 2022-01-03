 <!--**********************************
            Content body start
            ***********************************-->
 

   <!-- <div class="row page-titles mx-0">
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
           <div class="card-body">
             <h4 class="card-title mL">Data Permohonan Karyawan </h4>
             <div class="table-responsive">
               <table class="table table-striped table-hover zero-configuration" id="tablePribadi">
                 <thead>
                   <tr>
                     <th>NIK</th>
                     <th>Nama Pegawai</th>
                     <th>Departemen</th>
                     <th>Date Created</th>
                     <th>Status</th>
                     <th>Detail</th>
                   </tr>
                 </thead>
                 <tbody>
                   <?php foreach ($permohonanKaryawan->result_array() as $key => $value) :
                      $NIK = $value['NIK'];
                      $id_cuti = encrypt_url($value['id_cuti']);
                      $date_created = date("d-M-Y", strtotime($value['date_created']));
                      $nama = $value['Name'];
                      $jenis_permohonan_cuti = $value['Title_Permohonan'];
                      $tanggalLeave = $value['TanggalOut'];
                      $buktiizin = $value['buktiLeave'];
                      $keterangan = $value['keterangan'];
                      $date_update = $value['date_update'];
                      $status = $value['status'];
                      $Departemen_Name = $value['DepartemenName'];

                    ?>
                     <tr>
                       <td><?= $NIK  ?></td>
                       <td><?= $nama  ?></td>
                       <td><?= $Departemen_Name ?></td>
                       <td><?= $date_created ?></td>
                       <td><?php if ($status == 0) {
                              echo "Menunggu Persetujuan";
                            } elseif ($status == 1) {
                              $path = base_url("assets/images/acc_icon.png");
                              echo "<img src='$path' alt='Responsive image'> Disetujui";
                            } else {
                              $path = base_url("assets/images/reject_icon.png");
                              echo "<img src='$path' alt='Responsive image'> Ditolak";
                            } ?></td>


                       <td><a href="#" data-toggle="modal" class="btn w-50 btn-primary btn-rounded" data-target="#detailInfo<?= $id_cuti ?>"><i class="mdi mdi-account-card-details"></i> Detail</a></td>
                     </tr>
                   <?php endforeach; ?>
                 </tbody>
               </table>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
   <!-- #/ container -->

 <!--**********************************
            Content body end
            ***********************************-->




 <!-- Modal Image -->
 <?php foreach ($permohonanKaryawan->result_array() as $key => $value) :
    $id_cuti = encrypt_url($value['id_cuti']);

    $buktiizin = $value['buktiLeave'];
    $infobuktipermohonan = pathinfo($value['buktiLeave']);
    $Departemen_Name = $value['DepartemenName'];

  ?>
   <!-- <div class="modal fade bd-example-modal-lg" id="modalbuktiizin<?= encrypt_url($id_cuti); ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg">
       <div class="modal-content">
         <h5 class="modal-title">Bukti Izin</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>

       </div>
     </div>
   </div> -->
   <div class="modal fade  bd-example-modal-lg" id="modalbuktiizin<?= $id_cuti; ?>" aria-labelledby="myLargeModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg">
       <div class="modal-content">
         <div class="modal-header gradient-4">
           <h5 class="modal-title text-white">Bukti Izin</h5>
           <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <div class="modal-body">
           <?php
            if ($buktiizin != null) {
              if ($infobuktipermohonan['extension'] == "jpg" || $infobuktipermohonan['extension'] == "png" || $infobuktipermohonan['extension'] == "jpeg") { ?>
               <img src="<?= base_url("assets/picture/izin/$buktiizin") ?>" class="rounded mx-auto d-block" width=50% height=50%>
             <?php } else { ?>
               <div class="embed-responsive embed-responsive-16by9">
                 <iframe class="embed-responsive-item" type="application/pdf" src="<?= base_url("assets/picture/izin/$buktiizin") ?>" allowfullscreen></iframe>
               </div>

             <?php }
            } else { ?>
             -
           <?php } ?>

         </div>
         <div class="modal-footer">

           <a href="<?= base_url("assets/picture/izin/$buktiizin") ?>" class="btn btn-primary btn-rounded" download><i class="mdi mdi-download"> </i>Download</a>
         </div>
       </div>
     </div>
   </div>
   </div>
 <?php endforeach; ?>
 <!-- Modal Note -->
 <?php
  foreach ($permohonanKaryawan->result_array() as $keys => $row) :
    $id_cuti = encrypt_url($row['id_cuti']);

  ?>
   <div class="modal" id="rejectModal<?= $id_cuti ?>" tabindex="-1" role="dialog">
     <div class="modal-dialog" role="document">
       <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title">Note</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <?php echo form_open_multipart("permohonan/insert_tolak_cuti", "id=tolakCuti") ?>
         <div class="modal-body">
           <div class="row">
             <div class="col">
               <input type="hidden" value="<?= $id_cuti ?>" name="id_permohonan">
               <input type="text input-rounded" class="form-control" placeholder="Note" autofocus name="note">
             </div>
           </div>
         </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
           <button type="submit" class="btn btn-primary">Tolak</button>
         </div>
         <?php echo form_close() ?>
       </div>
     </div>
   </div>
 <?php endforeach; ?>
 <!-- modal detail -->
 <?php
  foreach ($permohonanKaryawan->result_array() as $keys => $value) :
    $id_cuti = encrypt_url($value['id_cuti']);
    $date_created = date("D,d-F-Y", strtotime($value['date_created']));
    $nama = $value['Name'];
    $TitlePermohonan = $value['Title_Permohonan'];
    $tanggalLeave = $value['TanggalOut'];
    $buktiizin = $value['buktiLeave'];
    $keterangan = $value['keterangan'];
    $date_update = $value['date_update'];
    $status = $value['status'];
    $Departemen_Name = $value['DepartemenName'];
    $NIK = $value['NIK'];
    $totalHari = $value['totalLeave'];
    $note = $value['Note'];
  ?>
   <div class="modal modal-detail" id="detailInfo<?= $id_cuti ?>" tabindex="-1" role="dialog">
     <div class="modal-dialog" role="document">
       <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title">Detail Permohonan Leave </h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <?php echo form_open_multipart("permohonan/insert_tolak_cuti", "id=tolakCuti") ?>
         <div class="modal-body">
           <div class="row">
             <div class="col">
               <input type="hidden" value="<?= $id_cuti ?>" name="id_permohonan">

               <table class="table-responsive table table-hover" width ="100%">
                 <tr>
                   <td><span class="text-muted">NIK </span></td>
                   <td> <?= $NIK ?></td>
                 </tr>
                 <tr>
                   <td><span class="text-muted">Nama </span></td>
                   <td> <?= $nama  ?></td>
                 </tr>
                 <tr>
                   <td> <span class="text-muted">Periode Permohonan </span></td>
                   <td> <?= date('F-Y')  ?> <br></td>
                 </tr>
                 <tr>
                   <td><span class="text-muted">Departemen </span> </td>
                   <td><?= $Departemen_Name ?> <br></td>
                 </tr>
                 <tr>
                   <td><span class="text-muted">Pengajuan </span> </td>
                   <td><?= $date_created  ?></td>
                 </tr>
                 <tr>
                   <td><span class="text-muted">Jenis Permohonan </span></td>
                   <td> <?= $TitlePermohonan  ?></td>
                 </tr>
                 <tr>
                   <td> <span class="text-muted">Keterangan </span> </td>
                   <td>
                     <?php if ($keterangan == null) {
                        echo "-";
                      } else {
                        echo $keterangan;
                      } ?></td>
                 </tr>
                 <tr>
                   <td> <span class="text-muted">Bukti Tidak Masuk</span> </td>
                   <td>
                     <?php if ($buktiizin == null) {
                        echo "-";
                      } else {
                        echo $buktiizin;
                      } ?></td>
                 </tr>
                 <tr>
                   <td><span class="text-muted">Tanggal Tidak Masuk </span> </td>
                   <td> <?= $tanggalLeave ?></td>
                 </tr>
                 <tr>
                   <td><span class="text-muted">Total Hari </span></td>
                   <td> <?= $totalHari ?></td>
                 </tr>
                 <tr>
                   <td><span class="text-muted">Status </span></td>
                   <td> <?php if ($status == 0) {
                          echo "Menunggu Persetujuan";
                        } else if ($status == 1) {
                          echo "Di Setujui";
                        } else {
                          echo "Di Tolak";
                        } ?></td>
                 </tr>
                 <tr>
                   <td><span class="text-muted">Date Update </span></td>
                   <td> <?php if ($date_update == null) {
                          echo "-";
                        } else {
                          echo $date_update;
                        } ?></td>
                 </tr>
                 <tr>
                   <td>Note</td>
                   <td>
                   <?php if ($note == null) {
                          echo "-";
                        } else {
                          echo $note;
                        } ?></td>
                   </td>

                   </td>
                 </tr>
               </table>
             </div>
           </div>
         </div>
         <div class="modal-footer">
           <?php
            if ($user['id_rule'] == 2) {
              echo "No Action";
            } else {
            ?>

             <?php
              if ($status == 0) {
              ?>
               <a class="btn-setuju-permohonan btn btn-primary" href="<?= base_url("permohonan/insert_acc_cuti/" . $id_cuti) ?>">Setujui</a>
               <a class="btn btn-warning text-white btnTolak" href="#" data-toggle="modal" data-target="#rejectModal<?= $id_cuti ?>" data-dismiss="modal">Tolak</a>

               <?php } else {
                if ($status == 2) {
                ?>
                 <a class="btn-setuju-permohonan btn btn-success text-white" href="<?= base_url("permohonan/insert_acc_cuti/" . $id_cuti) ?>">Setujui</a>
               <?php } else { ?>
                 <a class="btn btn-warning text-white btnTolak" href="#" data-toggle="modal" data-target="#rejectModal<?= $id_cuti ?>" data-dismiss="modal" data-dismiss="modal">Tolak</a>
           <?php }
              }
            } ?>
         </div>
         <?php echo form_close() ?>
       </div>
     </div>
   </div>
 <?php endforeach; ?>