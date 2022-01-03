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
            					<h4 class="card-title mb-md-3 mL">Jenis Permohonan</h4>
            					<!-- <a href="<?= base_url("properti/tambahjc") ?>" class="btn btn-info">Tambah Jenis Permohonan [+]</a> -->
            					<button class="btn btn-info" data-toggle="modal" data-target="#tambah">Tambah Jenis Permohonan [+]</button>

            					<!-- Modal -->
            					<div class="modal fade" id="tambah">
            						<div class="modal-dialog modal-dialog-centered" role="document">
            							<div class="modal-content">
            								<div class="modal-header">
            									<h5 class="modal-title">Tambah Jenis Permohonan</h5>
            									<button type="button" class="close" data-dismiss="modal"><span>&times;</span>
            									</button>
            								</div>
            								<?php echo form_open_multipart("properti/add_jpermohonan"); ?>
            								<div class="modal-body">
            									<div class="form-group">
            										<label for="">Permohonan</label>
            										<input type="text" class="form-control input-rounded" name="permohonan" placeholder="Jenis Cuti">
            									</div>
            								</div>
            								<div class="modal-footer">
            									<button type="submit" class="btn gradient-9 btn-rounded submit w-100 mt-5 btn-permohonan">Simpan</button>
            								</div>
            								<? echo form_close(); ?>
            							</div>
            						</div>
            					</div>

            					<div class="table-responsive">
            						<table class="table table-striped table-hover zero-configuration">
            							<thead>
            								<tr>
            									<th>Permohonan</th>
            									<th>Action</th>
            								</tr>
            							</thead>
            							<tbody>
            								<?php foreach ($jpermohonan as $key) { ?>
            									<tr>
            										<td><?= $key->Title_Permohonan ?></td>
            										<td>
            											<div class="dropdown">
            												<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            													Pilih Action
            												</button>
            												<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            													<!-- <a class="dropdown-item" href="<?= base_url('properti/editjp/' . $key->id_jenispermohonan) ?>">Edit</a> -->
            													<a class="dropdown-item" href="<?= base_url('properti/hapusjp/' . $key->id_jenispermohonan) ?>">Hapus</a>
            												</div>
            											</div>
            										</td>
            									</tr>
            								<?php } ?>
            							</tbody>
            						</table>
            					</div>
            				</div>
            			</div>
            		</div>
            	</div>
            </div>
     <!-- #/ container -->