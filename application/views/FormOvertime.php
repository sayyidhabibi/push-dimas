 <!--**********************************
            Content body start
            ***********************************-->
     <!-- <div class="row page-titles mx-0">
         <div class="col p-md-0">
         </div>
     </div>
     <div id="error-message" data-failed="<?= $this->session->flashdata('error'); ?>"></div> -->
   
     <div class="col-lg-12">
         <div class="row">
             <div class="col-lg-4 col-md-12">
                 <div class="card">
                     <div class="card-body">
                         <h4 class="mt-1 mL">Profile</h3>
                             <div class="media align-items-center mb-4">
                                 <img class="mr-3" src="<?= base_url("assets/") ?>images/index.png" width="80" height="80" alt="">
                                 <div class="media-body">
                                     <h4 class="mb-0 mL"><?= $user['Name'] ?></h4>
                                     <p class="mb-0">
                                         <span class="text-muted">NIK :</span> <?=  $user['NIK'] ?> <br>
                                         <span class="text-muted">Periode :</span> <?= $tgl = date('F-Y'); ?><br>
                                         <span class="text-muted">Departemen :</span> <?= $user['DepartemenName']  ?> <br>
                                     </p>
                                 </div>
                             </div>
                             <div class="row mb-5">
                                 <div class="col">
                                     <div class="card card-profile text-center">
                                         <span class="mb-1 text-primary"><i class="icon-clock"></i></span>
                                         <h3 class="mb-0"><?= $num_rows;  ?></h3>
                                         <p class="text-muted px-4">Total Overtime</p>
                                     </div>
                                 </div>

                             </div>
                             <a href="<?= base_url("overtime/overtimePribadi")?> " class="btn btn-primary">Lihat Overtime Priabadi</a>
                     </div>
                 </div>
             </div>
             <div class="col-lg-8 col-md-12">
                 <div class="card">
                     <div class="card-body">
                         <h4 class="card-title mL">Formulir Permohonan Lembur Periode (<?= $tgl = date('F-Y'); ?>)</h4>
                         </p>
                         <?php echo form_open_multipart("overtime/add_formulirlembur") ?>
                         <div class="form-group">
                             <div class="mb-3">
                                 <label for="exampleFormControlTextarea1" class="form-label">Keterangan</label>
                                 <textarea class="form-control" id="exampleFormControlTextarea1" rows="4"name="keterangan_lembur" placeholder="Masukan Keterangan" required></textarea>
                             </div>
                         </div>
                         <div class="form-group">
                             <label>Tanggal Lembur</label>
                             <input type="text" class="form-control input-rounded" id="tanggalLembur" placeholder="Masukan Tanggal Lembur" name="tanggallembur" readonly required> <span class="input-group-append" readonly required>

                         </div>
                         <div class="form-row">
                             <div class="form-group col-md-6">
                                 <label>Start In</label>
                                 <input type="time" class="form-control input-rounded" placeholder="dd/mm/yyyy" name="jamStartLembur" required> <span class="input-group-append" required>
                             </div>
                             <div class="form-group col-md-6">
                                 <label>Start Out</label>
                                 <input type="time" class="form-control input-rounded" placeholder="dd/mm/yyyy" name="jamEndLembur" required> <span class="input-group-append">
                             </div>
                         </div>
                         <div class="form-group">
                             <button type="submit" class="btn login-form__btn submit w-100 mt-5">Ajukan</button>
                         </div>
                     <?php echo form_close();?>
                               
                     </div>
                 </div>
             </div>
         </div>
     </div>
