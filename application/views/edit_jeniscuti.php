 <!--**********************************
            Content body start
            ***********************************-->


            <div class="row page-titles mx-0">
                <div class="col p-md-0">

                </div>
            </div>
            <!-- row -->
            <?= $this->session->flashdata('pesan'); ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-5">Ubah Jenis Cuti</h4>
                                <div class="basic-form">
                                    <?php echo form_open_multipart("properti/update_jcuti"); ?>
                                    <div class="form-group">
                                        <label for="">Jenis Cuti</label>
                                        <input type="text" class="form-control input-rounded" name="jcuti" placeholder="Jenis Cuti">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Durasi Cuti</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control input-rounded" name="durasi" placeholder="Durasi Cuti" onkeypress="return event.charCode >= 48 && event.charCode <=57">
                                            <div class="input-group-append"><span class="input-group-text pl-4 pr-4 input-rounded">Hari</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" form-group">
                                         <button type="submit" class="btn gradient-9 btn-rounded submit w-100 mt-5 btn-permohonan">Simpan</button>
                                     </div>
                                    <? echo form_close(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
     <!-- #/ container -->