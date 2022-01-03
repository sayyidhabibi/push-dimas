 <!--**********************************
            Content body start
            ***********************************-->


           <!--  <div class="row page-titles mx-0">
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

            					<h4 class="card-title mb-md-3 mL">Jadwal Kerja</h4>
            					<a href="<?= base_url("properti/tambahjk") ?>" class="btn btn-info">Tambah Jadwal Kerja [+]</a>

            					<div class="table-responsive">
            						<table class="table table-striped table-hover zero-configuration">
            							<thead>
            								<tr>
            									<th>Nama Jadwal</th>
            									<th>Jam Mulai</th>
                                                <th>Jam Akhir</th>
                                                <th>Late Time</th>
            									<th>Action</th>
            								</tr>
            							</thead>

            							<tbody>
            								<?php 
                                            $timestamp = 1234567890;
                                            foreach ($jkerja as $key) { ?>
            									<tr>
            										<td><?= $key->Nama_jadwal ?></td>
            										<td><?= date('H:i',strtotime($key->jam_mulai)) ?></td>
                                                    <td><?= date('H:i',strtotime($key->jam_akhir)) ?></td>
                                                    <td><?= $key->Late_time ?></td>
            										<td>
            											<div class="dropdown">
            												<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            													Pilih Action
            												</button>
            												<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            													<a class="dropdown-item" href="<?= base_url('properti/ubahjk/' . $key->id_jadwal) ?>">Edit</a>
            													<a class="dropdown-item" href="<?= base_url('properti/hapusjk/' . $key->id_jadwal) ?>">Hapus</a>
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