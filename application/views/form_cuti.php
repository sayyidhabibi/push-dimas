 <!--**********************************
            Content body start
            ***********************************-->
     <!-- <div class="row page-titles mx-0">
         <div class="col p-md-0">
         </div>
     </div>
     <div class="error-form" data-error="<?= $this->session->flashdata('error'); ?>"></div> -->


     <div class="col-lg-12">
         <div class="row">
             <div class="col-lg-4 col-md-12">
                 <div class="card">
                     <div class="card-body">
                         <h4 class="mt-1 mL">Profile</h4>
                         <div class="media align-items-center mb-4">
                             <img class="mr-3" src="<?= base_url("assets/") ?>images/index.png" width="80" height="80" alt="">
                             <div class="media-body">
                                 <h4 class="mb-0 mL"><?= $user['Name'] ?></h4>
                                 <p class="mb-0">
                                     <span class="text-muted">NIK :</span> <?= $user['NIK'] ?> <br>
                                     <span class="text-muted">Periode :</span> <?= date('Y')  ?><br>
                                     <span class="text-muted">Departemen :</span> <?= $user['DepartemenName'] ?> <br>
                                 </p>
                             </div>
                         </div>
                         <div class="row mb-5 my-1">
                             <div class="col">
                                 <?php if ($user['batas_cuti']  > 4) {  ?>
                                     <div class="card card-profile gradient-9 text-center">
                                         <span class="mb-1 text-white"><i class="icon-clock "></i></span>
                                         <h3 class="mb-0 text-white"><?= $user['batas_cuti']  ?></h3>
                                         <p class=" px-4 text-white">Sisa Cuti</p>
                                     </div>
                                 <?php } elseif ($user['batas_cuti'] <= 4) {  ?>
                                     <div class="card card-profile text-center">
                                         <span class="mb-1 text-primary"><i class="icon-clock"></i></span>
                                         <h3 class="mb-0"><?= $user['batas_cuti'] ?> </h3>
                                         <p class="text-muted px-4 ">Sisa Cuti</p>
                                     </div>
                                 <?php } elseif ($user['batas_cuti']  == 0) { ?>
                                     <div class="card card-profile text-center">
                                         <span class="mb-1 text-primary"><i class="icon-clock "></i></span>
                                         <h3 class="mb-0"><?= $user['batas_cuti'] ?></h3>
                                         <p class="text-muted px-4 ">Sisa Cuti</p>
                                     </div>
                                 <?php } ?>
                             </div>
                             <div class="col">
                                 <div class="card card-profile gradient-4 text-center">
                                     <span class="mb-1 text-white"><i class="icon-user-follow"></i></span>
                                     <h3 class="mb-0 text-white"><?= $num_rows  ?></h3>
                                     <p class="text-white">Total Permohonan</p>
                                 </div>
                             </div>
                         </div>

                     </div>
                 </div>
             </div>
             <div class="col-lg-8 col-md-12">
                 <div class="card">
                     <div class="card-body">
                         <div class="card-body">
                             <h4 class="card-title mL">Formulir Permohonan Tidak Masuk Kerja</h4>

                             <div class="basic-form">
                                 <?php echo form_open_multipart("permohonan/addcuti"); ?>
                                 <div class="form-row">
                                     <div class="form-group col-md-6">
                                         <label>Jenis Permohonan</label>
                                         <select name="jenispermohonan" class="form-control input-rounded jeniscuti" required>
                                             <option value="">Pilih Permohonan</option>
                                             <?php foreach ($jenispermohonan->result_array() as $key => $value) {
                                                ?>
                                                 <option value="<?= $value["Title_Permohonan"] ?>"><?= $value["Title_Permohonan"] ?></option>
                                             <?php } ?>
                                         </select>
                                     </div>
                                     <div class="form-group col-md-6">
                                         <div id="alasan" class="form-group alasan">
                                             <label>Keperluan</label>
                                             <select name="keperluan" class="form-control input-rounded keperluan" required="required">
                                                 <option value="">Pilih Keperluan</option>
                                                 <?php foreach ($jeniskeperluancuti->result_array() as $key => $value) {
                                                    ?>
                                                     <option value="<?= $value['title_keperluancuti'] ?>" data-id="<?= $value["durasi"] ?>"><?= $value["title_keperluancuti"] ?></option>
                                                 <?php } ?>
                                             </select>
                                         </div>
                                         <div class="form-group keterangan_leave ">
                                             <label>Keperluan</label>
                                             <textarea onfocus="this.value=''" name="keterangan" class="form-control keterangan input-rounded" value="" required="required" oninput="this.value = this.value.toUpperCase()" placeholder="Masukan Keterangan"></textarea>
                                         </div>
                                         <!-- <div class="form-group tujuan_trip ">
                                             <label>Tujuan</label>
                                             <input type="text" onfocus="this.value=''" name="tujuan_trip" class="form-control tujuantrip" placeholder="Masukan Tujuan"  oninput="this.value = this.value.toUpperCase()" required="required">
                                         </div> -->
                                     </div>
                                 </div>
                                 <!-- <div class="form-group uploadbukti">
                                     <div class="input-group mb-3">
                                         <div class="custom-file">
                                             <input type="file" id="ChooseFile" class="form-control custom-file-input" name="uploadimage">
                                             <label class="custom-file-label">Upload Bukti</label>
                                         </div>
                                     </div>
                                 </div> -->
                                 <div class="form-row">
                                     <!-- <div class="form-group col-md-6">
                                         <label>Mulai Cuti</label>
                                         <input type="text" class="form-control mydatepicker setMin" placeholder="dd/mm/yyyy" name="tglmulaicuti" readonly required="required" onfocus="this.value=''" value=""> <span class="input-group-append " value="" required="required">

                                     </div>
                                     <div class="form-group col-md-6">
                                         <label>Cuti Berakhir</label>
                                         <input type="text" class="form-control setMax" placeholder="dd/mm/yyyy" name="tglberakhircuti" readonly required="required" onfocus="this.value=''"> <span class="input-group-append" required="required">
                                     </div> -->
                                     <div class="form-group col-md-6 uploadbukti">
                                         <label>Bukti Izin</label>
                                         <div class="custom-file">
                                             <input type="file" id="ChooseFile" class="form-control custom-file-input uploadimage" name="uploadizin">
                                             <label class="custom-file-label">Upload Bukti</label>
                                         </div>
                                     </div>
                                     <div class="form-group col-md-6" id="tDay">
                                         <label>Total Hari</label>
                                         <input type="number" class="form-control input-rounded setDay" placeholder="Total Hari" name="totalHari" required="required""> 
                                     </div>
                                 </div>
                                 <div class=" form-group" id="dayGo">
                                         <label class="m-t-20">Pilih Tanggal</label>
                                         <input type="text" class="form-control input-rounded mdate" placeholder="Masukan Tanggal" required name="tanggalOut" id="mdate" readonly>
                                         <!-- <label>Select Date</label>
                                         <input type="text" class="form-control input-rounded" placeholder="Masukan Tanggal Libur" id="dateStart" name="date" required="required"">  -->
                                     </div>
                                     <div class=" form-group">
                                         <button type="submit" class="btn gradient-9 btn-rounded submit w-100 mt-5 btn-permohonan">Ajukan Permohonan</button>
                                     </div>
                                     <?php echo form_close(); ?>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>