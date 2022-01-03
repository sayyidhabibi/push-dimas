 <!--**********************************
            Content body start
            ***********************************-->

     <div class="row page-titles mx-0">
         <div class="col p-md-0">
         </div>
     </div>
     <div class="error-form" data-error="<?= $this->session->flashdata('error'); ?>"></div>

     <?php foreach ($data_permohonanpribadi->result_array() as $key => $value) :
            $id_cuti = encrypt_url($value['id_cuti']);
            $date_created = date("d-M-Y", strtotime($value['date_created']));
            $nama = $value['Name'];
            $jenis_permohonan_cuti = $value['Title_Permohonan'];
            $formatBukti = pathinfo($value['buktiLeave']);
            $buktiLeave = $value['buktiLeave'];
            $keterangan = $value['keterangan'];
            $date_update = $value['date_update'];
            $status = $value['status'];
            $Departemen_Name = $value['DepartemenName'];
            $totalHari = $value['totalLeave'];
            $tanggalOut = $value['TanggalOut'];
            $NIK = $value['NIK'];
        ?>
         <div class="col-lg-12">
             <div class="row">
                 <div class="col-lg-4 col-md-2">
                     <div class="card">
                         <div class="card-body">
                             <h4 class="mt-1">Profile</h4>
                             <div class="media align-items-center mb-4">
                                 <img class="mr-3" src="<?= base_url("assets/") ?>images/index.png" width="80" height="80" alt="">
                                 <div class="media-body">
                                     <h4 class="mb-0"><?= $user['Name'] ?></h4>
                                     <p class="mb-0">
                                         <span class="text-muted">NIK :</span> <?= $NIK ?> <br>
                                         <span class="text-muted">Periode :</span> <?= date('Y')  ?><br>
                                         <span class="text-muted">Departemen :</span> <?= $Departemen_Name ?> <br>
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
                                 <h4 class="card-title">Update Formulir Permohonan Tidak Masuk Kerja</h4>
                                 <div class="basic-form">
                                     <?php echo form_open_multipart("permohonan/updatepermohonan"); ?>
                                     <div class="form-row">
                                         <input type="hidden" name="updateIdPermohonan" value="<?= $id_cuti ?> ">
                                          <div class="form-group col-md-6">
                                             <label>Jenis Permohonan</label>
                                             <!-- <select name="updatejenispermohonan" class="form-control input-rounded jeniscuti" required>
                                                 <option value="">Pilih Permohonan</option>
                                                 <?php foreach ($getjenispermohonan->result_array() as $key => $value) :
                                                        if ($jenis_permohonan_cuti == $value['Title_Permohonan']) {
                                                    ?>

                                                         <option value="<?= $value['Title_Permohonan'] ?>" selected><?= $value['Title_Permohonan'] ?></option>
                                                     <?php } else { ?>
                                                         <option value="<?= $value["Title_Permohonan"] ?>"><?= $value["Title_Permohonan"] ?></option>
                                                     <?php  } ?>
                                                 <?php endforeach; ?>
                                             </select> -->
                                             <input type="text" class="form-control input-rounded jeniscuti" name="updatejenispermohonan" value="<?= $jenis_permohonan_cuti ?>"readonly >
                                         </div> 
                                         <div class="form-group col-md-6">
                                             <div id="U-alasan" class="form-group alasan">
                                                 <label>Keperluan</label>
                                                 <select name="updatekeperluan" class="form-control input-rounded keperluan" required="required">
                                                     <option value="">Pilih Keperluan</option>
                                                     <?php foreach ($jeniskeperluancuti->result_array() as $key => $value) {
                                                         if($keterangan== $value['title_keperluancuti']){
                                                        ?>
                                                        
                                                         <option value="<?= $value['title_keperluancuti'] ?>" data-id="<?= $value["durasi"] ?>"selected><?= $value["title_keperluancuti"] ?></option>
                                                     <?php }} ?>
                                                 </select>
                                             </div>
                                             <div class="form-group U-keterangan_leave ">
                                                 <label>Keperluan</label>
                                                 <textarea name="updateketerangan" class="form-control keterangan input-rounded" value="" required="required" oninput="this.value = this.value.toUpperCase()" placeholder="Masukan Keterangan"><?= $keterangan ?></textarea>
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
                                         <div class="form-group col-md-6 U-uploadbukti">
                                             <label>Bukti Izin Baru</label>
                                             <div class="custom-file">
                                                 <input type="file" id="ChooseFile" class="form-control custom-file-input uploadimage" name="updateuploadizin">
                                                 <label class="custom-file-label">Upload Bukti Baru</label>
                                             </div>

                                         </div>
                                         <div class="form-group col-md-6" id="U-setDay">
                                             <label>Total Hari</label>
                                             <input type="number" class="form-control input-rounded Utday" placeholder="Total Hari" value="<?= $totalHari ?>" name="updatetotalHari" required="required"" readonly> 
                                     </div>
                                 </div>
                                 <div class=" form-group" id="U-BuktiLama">
                                             <label>Bukti Lama</label>
                                             <?php if ($buktiLeave == null) {
                                                    echo "-";
                                                } else {

                                                ?>
                                                 <p class="text-muted"><?= $buktiLeave  ?></p>
                                             <?php } ?>
                                         </div>
                                         <div class=" form-group">
                                             <label class="m-t-20">Pilih Tanggal</label>
                                             <input type="text" class="form-control input-rounded mdate" placeholder="Masukan Tanggal" value="<?= $tanggalOut ?>" name="updatetanggalOut" readonly required>
                                             <!-- <label>Select Date</label>
                                         <input type="text" class="form-control input-rounded" placeholder="Masukan Tanggal Libur" id="dateStart" name="date" required="required"">  -->
                                         </div>
                                         <div class="form-group">
                                             <button type="submit" id="btn-update" class="btn gradient-9 btn-rounded submit w-100 mt-5">Ajukan Permohonan</button>
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
     <?php endforeach; ?>