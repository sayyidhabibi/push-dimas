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

            					<h4 class="card-title mb-md-3 mL">Jenis Cuti Khusus Karyawan</h4>
            					<a href="<?= base_url("properti/tambahjc") ?>" class="btn btn-info">Tambah Jenis Cuti [+]</a>

            					<div class="table-responsive">
            						<table class="table table-striped table-hover zero-configuration">
            							<thead>
            								<tr>
            									<th>Keperluan Cuti</th>
            									<th>Durasi Cuti</th>
            									<th>Action</th>
            								</tr>
            							</thead>

            							<tbody>
            								<?php foreach ($jcuti as $key) { ?>
            									<tr>
            										<td><?= $key->title_keperluancuti ?></td>
            										<td><?= $key->durasi ?></td>
            										<td>
            											<div class="dropdown">
            												<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            													Pilih Action
            												</button>
            												<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            													<!-- <a class="dropdown-item" href="<?= base_url('properti/editjc/' . $key->id_jeniskeperluancuti) ?>">Edit</a> -->
            													<a class="dropdown-item" href="<?= base_url('properti/hapusjc/' . $key->id_jeniskeperluancuti) ?>">Hapus</a>
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