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
            					<h4 class="card-title mb-5">Tambah Jadwal Kerja</h4>
            					<div class="basic-form">
            						<?php echo form_open_multipart("properti/add_jkerja"); ?>
            						<div class="form-group">
            							<label for="">Nama Jadwal</label>
            							<input type="text" class="form-control input-rounded" name="nj" placeholder="Nama Jadwal">
            						</div>
            						<div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label for="">Jam Mulai</label>
                                                <div class="input-group mb-3">
                                                    <input type="time" class="form-control input-rounded" placeholder="dd/mm/yyyy" name="jm" required> <span class="input-group-append input-rounded" required></span>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="">Jam Berakhir</label>
                                                <div class="input-group mb-3">
                                                    <input type="time" class="form-control input-rounded" placeholder="dd/mm/yyyy" name="jb" required> <span class="input-group-append input-rounded" required></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Jam Telat</label>
                                            <input type="text" class="form-control input-rounded" name="jt" placeholder="Jam Telat">
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