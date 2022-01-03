 
<!--**********************************
            Content body start
            ***********************************-->


                <div class="row page-titles mx-0">
                    <div class="col p-md-0">

                    </div>
                </div>
                
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit Formulir Cuti</h4>
                            <?php echo form_open_multipart("web/updatecuti")?>
                            <?php foreach ($cuti->result() as $key => $value) {

                            } ?>
                            <div class="basic-form">
                                <?php echo form_open_multipart("web/updatecuti")?>
                                <input type="hidden" name="id_cuti" value="<?= $value->id_cuti ?>">
                                <div class="form-row">
                                    <?php 
                                    $sql = $this->db->query("SELECT * FROM tbl_karyawan where NIK ='$value->NIK'"); 
                                    foreach ($sql->result() as $key => $row) {

                                        ?>
                                        <div class="form-group col-md-6">
                                            <label>Nama</label>
                                            <input type="text" class="form-control" name="nama" value="<?=$row->nama ?>" readonly>
                                        </div>
                                    <?php } ?>
                                        <div class="form-group col-md-6">
                                            <label>NIK</label>
                                            <input type="text" class="form-control" name="nik" value="<?= $value->NIK  ?>" readonly>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Jenis Cuti</label>
                                            <select id="jeniscuti" name="jeniscuti" class="form-control jeniscuti">
                                               <?php if ($value->jenis_permohonan_cuti=="Permohonan Cuti") {

                                                            echo "<option value='$value->jenis_permohonan_cuti'>$value->jenis_permohonan_cuti</option>
                                                            <option value='Permohonan Cuti Mendadak'>Permohonan Cuti Mendadak</option>
                                                            <option value='Permohonan Tidak Masuk Kerja'>Permohonan Tidak Masuk Kerja</option>
                                                            ";

                                                        }elseif($value->jenis_permohonan_cuti=="Permohonan Tidak Masuk Kerja"){
                                                            echo "<option value='$value->jenis_permohonan_cuti'>$value->jenis_permohonan_cuti </option>
                                                            <option value='Permohonan Cuti'>Permohonan Cuti</option>
                                                            <option value='Permohonan Cuti Mendadak'>Permohonan Cuti Mendadak</option>";
                                                        }else{
                                                            echo "<option>$value->jenis_permohonan_cuti</option>
                                                            <option value='Permohonan Cuti'>Permohonan Cuti</option>
                                                            <option value='Permohonan Tidak Masuk Kerja'>Permohonan Tidak Masuk Kerja</option>
                                                           ";
                                                        }?>

                                            </select> 
                                        </div>
                                        <div class="form-group col-md-6" >                                                
                                            <div  class="form-group alasan" >
                                                <label>Keperluan</label>
                                                <select  name="alasan" class="form-control keperluan">

                                                    <?php $sql=$this->db->get('tbl_jenis_cuti');foreach ($sql->result() as $key => $rows) {
                                                      ?>
                                                      <option value="<?=$value->id_jenis_cuti ?>"
                                                        data-id="<?=$rows->durasi ?>"selected><?= $rows->jenis_cuti ?></option>
                                                    <?php } ?>
                                                </select> 
                                            </div>
                                        
                                            <div  class="form-group BuktiImage">
                                                <label>Upload Bukti</label>
                                                <input name="uploadimage"type="file" class="form-control-file"><img src="<?=base_url("assets/picture/izin/$value->buktiizin") ?>" id="fileinput" class='img-rounded' alt='Cinque Terre'alt='Responsive image' width='50' height='50'>
                                                <input type="hidden" name="gambarlama" value="$value->buktiizin">
                                            </div>
                                        
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Mulai Cuti</label>
                                            <input  type="text" class="form-control setMin" placeholder="dd/mm/yyyy" name="tglmulaicuti" readonly required value="<?= $value->tgl_mulai_cuti ?>"> <span class="input-group-append "required >
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Cuti Berakhir</label>
                                                <input  type="text" class="form-control setMax" placeholder="dd/mm/yyyy" name="tglberakhircuti" readonly required value="<?= $value->tgl_berakhir_cuti ?>" > <span class="input-group-append">
                                                </div>
                                            </div>



                                            <div class="form-group">

                                                <button type="submit" class="btn login-form__btn submit w-100 mt-5">Ajukan</button>
                                            </div>
                                            <?php echo form_close() ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>