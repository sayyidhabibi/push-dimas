 
<!--**********************************
            Content body start
            ***********************************-->

                <div class="row page-titles mx-0">
                    <div class="col p-md-0">

                    </div>
                </div>
                <?= $this->session->flashdata('pesan');?>

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Formulir Permohonan Lembur Periode (<?= $tgl=date('F-Y'); ?>)</h4>
                            <span><?php 
                            $nik= $this->session->userdata('nik');
                            $sql = $this->db->query("SELECT * FROM tbl_karyawan where NIK ='$nik'");

                            foreach ($sql->result() as $key => $value) {
                                
                            }
                            foreach ($karyawan->result() as $key => $rows) {

                            }   
                            ?></span>
                        </p>
                        <div class="basic-form">
                            <?php echo form_open_multipart("web/add_formulirlembur")?>
                            
                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label>Nama</label>
                                    <input type="text" class="form-control" name="nama" value="<?= $value->nama ?>" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>NIK</label>
                                    <input type="text" class="form-control" name="nik" value="<?= $value->NIK ?>" readonly>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Departemen</label>
                                    <input type="text" class="form-control" name="nik" value="<?= $rows->nama_departemen ?>" readonly>
                                </div>
                                <div class="form-group col-md-6" >
                                  <label>Keterangan Lembur</label>
                                  <textarea name="keterangan_lembur" placeholder="Masukan Keterangan Lembur" class="form-control" required></textarea>  
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label>Tanggal Lembur</label>
                            <input  type="text" class="form-control tanggal-lembur" placeholder="YYYY-MM-DD" name="tanggallembur" readonly required> <span class="input-group-append "required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Start In</label>
                                <input  type="time" class="form-control " placeholder="dd/mm/yyyy" name="jamStartLembur" required> <span class="input-group-append "required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Start  Out</label>
                                    <input  type="time" class="form-control" placeholder="dd/mm/yyyy" name="jamEndLembur" required> <span class="input-group-append">
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
