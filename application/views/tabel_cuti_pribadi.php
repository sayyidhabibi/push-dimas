 <!--**********************************
            Content body start
            ***********************************-->

            <!-- <div class="row page-titles mx-0">
            	<div class="col p-md-0">

            	</div>
            </div> -->
            <!-- row -->
            <div id="success-save" data-flash="<?= $this->session->flashdata('success'); ?>"></div>
            <div class="container-fluid">
            	<div class="row">
            		<div class="col-12">
            			<div class="card">
            				<div class="card-body">
            					<h4 class="card-title mL">Data Permohonan Cuti Pribadi </h4>
            					<a href="<?= base_url("permohonan/form_cuti") ?>" class="btn btn-info">Tambah Permohonan [+]</a>
            					<div class="table-responsive">
            						<!-- <div class="row">
            							<div class="col-sm-12 col-md-6">
            								<div class="dataTables_length" id="tablePribadi_length">
            									<label>Show 
            										<select name="tablePribadi_length" aria-controls="tablePribadi" class="form-control form-control-sm">
            											<option value="10">10</option>
            											<option value="25">25</option>
            											<option value="50">50</option>
            											<option value="100">100</option>
            										</select>entries
            									</label>
            								</div>
            							</div>
            							<div class="col-sm-12 col-md-6">
            								<div id="tablePribadi_filter" class="dataTables_filter">
            									<label>Search:
            										<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="tablePribadi">
            									</label>
            								</div>
            							</div>
            						</div> -->
            						<table class="table table-striped table-hover zero-configuration" id="tablePribadi">
            							<thead>
            								<tr>
            									<th>Nama Pegawai</th>
            									<th>Departemen</th>
            									<th>Date Created</th>
            									<!-- <th>Date Update</th> -->
            									<th>Tanggal Leave</th>
            									<th>Jenis Permohonan Cuti</th>
            									<th>Bukti Leave</th>
            									<th>Keterangan</th>
            									<th>Status</th>
            									<th>Action</th>
            								</tr>
            							</thead>
            							<tbody>
            								<?php foreach ($datacutipribadi->result_array() as $key => $value) :
            									$id_cuti = encrypt_url($value['id_cuti']);
            									$date_created = date("d-M-Y", strtotime($value['date_created']));
            									$nama = $value['Name'];
            									$jenis_permohonan_cuti = $value['Title_Permohonan'];
            									$tanggalLeave = $value['TanggalOut'];
            									$buktiizin = $value['buktiLeave'];
            									$keterangan = $value['keterangan'];
            									$date_update = $value['date_update'];
            									$status = $value['status'];
            									$Departemen_Name = $value['DepartemenName'];

            									?>
            									<tr>
            										<td><?= $nama  ?></td>
            										<td><?= $Departemen_Name ?></td>
            										<td><?= $date_created ?></td>
            										<!-- <td><?php if ($date_update == NULL) {
            											echo "-";
            										} else {
            											echo date("d-M-Y", strtotime($date_update));
            										} ?></td> -->
            										<td><?= $tanggalLeave ?></td>
            										<td><?= $jenis_permohonan_cuti  ?></td>

            										<td id="buktiizin" data-gambar="<?= $buktiizin ?>">
            											<?php
            											$path = base_url("assets/picture/izin/$buktiizin");
            											if ($buktiizin == null) {
            												echo "-";
            											} else {
            												echo "<a href='#' data-toggle='modal' data-target='#modalbuktiizin$id_cuti'>$buktiizin</a>";
            											} ?>
            										</td>
            										<td>
            											<?php


            											if ($keterangan == null) {
            												echo "-";
            											} else {

            												echo $keterangan;
            											} ?>
            										</td>


            										<td><?php if ($status == 0) {
            											echo "Menunggu Persetujuan";
            										} elseif ($status == 1) {
            											$path = base_url("assets/images/acc_icon.png");
            											echo "<img src='$path' alt='Responsive image'> Disetujui";
            										} else {
            											$path = base_url("assets/images/reject_icon.png");
            											echo "<img src='$path' alt='Responsive image'> Ditolak";
            										} ?></td>

                                             <!-- <td>

                                                 <?php
                                                    $id_rule = $this->session->userdata('id_rule');
                                                    $sql = $this->db->query("SELECT * FROM tbl_karyawan where id_rule ='$id_rule'");
                                                    foreach ($sql->result() as $key => $row) {
                                                    }
                                                    ?>
                                                 <div class="dropdown">
                                                     <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                         Pilih Action
                                                     </button>
                                                     <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                         <?php
                                                            if ($status == 0) {
                                                            ?>
                                                             <a class="dropdown-item" href="<?= base_url('permohonan/form_updatecuti/' . $id_cuti) ?>">Edit</a>
                                                         <?php
                                                            } else {
                                                                echo "No Action";
                                                            } ?>
                                                     </div>
                                                 </div>
                                             </td> -->
                                             <td><a href="#" data-toggle="modal" class="btn btn-primary btn-rounded" data-target="#detailInfo<?= $id_cuti ?>"><i class="mdi mdi-account-card-details"></i> Detail</a></td>
                                         </tr>
                                     <?php endforeach; ?>
                                 </tbody>
                             </table>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- #/ container -->
</div>
<!-- Modal Image -->
<?php foreach ($datacutipribadi->result_array() as $key => $value) :
	$id_cuti = $value['id_cuti'];

	$buktiizin = $value['buktiLeave'];
	$infobuktipermohonan = pathinfo($value['buktiLeave']);
	$Departemen_Name = $value['DepartemenName'];

	?>

	<div class="modal" id="modalbuktiizin<?= encrypt_url($id_cuti); ?>" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Bukti Izin</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<?php
					if ($buktiizin != null) {
						if ($infobuktipermohonan['extension'] == "jpg" || $infobuktipermohonan['extension'] == "png" || $infobuktipermohonan['extension'] == "jpeg") { ?>
							<img src="<?= base_url("assets/picture/izin/$buktiizin") ?>" class="rounded mx-auto d-block" width=50% height=50%>
						<?php } else { ?>
							<embed type="application/pdf" src="<?= base_url("assets/picture/izin/$buktiizin") ?>" width="100%" height="100%"></embed>
						<?php }
					} else { ?>
						-
					<?php } ?>

				</div>
				<div class="modal-footer">
					<a href="<?= base_url("assets/picture/izin/$buktiizin") ?>" class="btn" download><i class="mdi mdi-download"> </i>Download</a>
				</div>
			</div>
		</div>
	</div>
<?php endforeach; ?>
<!-- End Modal Image -->


<!-- modal detail -->
<?php
foreach ($datacutipribadi->result_array() as $keys => $value) :
	$id_cuti = encrypt_url($value['id_cuti']);
	$date_created = date("d-M-Y", strtotime($value['date_created']));
	$nama = $value['Name'];
	$jenis_permohonan_cuti = $value['Title_Permohonan'];
	$tanggalLeave = $value['TanggalOut'];
	$buktiizin = $value['buktiLeave'];
	$keterangan = $value['keterangan'];
	$date_update = $value['date_update'];
	$status = $value['status'];
	$Departemen_Name = $value['DepartemenName'];
	$note = $value['Note'];
	?>
	<div class="modal modal-detail" id="detailInfo<?= $id_cuti ?>" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Detail Permohonan Leave </h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<!-- <?php echo form_open_multipart("permohonan/insert_tolak_cuti", "id=tolakCuti") ?> -->
				<div class="modal-body">
					<div class="row">
						<div class="col">
							<input type="hidden" value="<?= $id_cuti ?>" name="id_permohonan">

							<table class="table-responsive table table-hover" width ="100%">
								<tr>
									<td><span class="text-muted">Nama </span></td>
									<td> <?= $nama  ?></td>
								</tr>
								<tr>
									<td> <span class="text-muted">Periode Permohonan </span></td>
									<td> <?= date('F-Y')  ?> <br></td>
								</tr>
								<tr>
									<td><span class="text-muted">Departemen </span> </td>
									<td><?= $Departemen_Name ?> <br></td>
								</tr>
								<tr>
									<td><span class="text-muted">Pengajuan </span> </td>
									<td><?= $date_created  ?></td>
								</tr>
								<tr>
									<td><span class="text-muted">Jenis Permohonan </span></td>
									<td> <?= $jenis_permohonan_cuti  ?></td>
								</tr>
								<tr>
									<td> <span class="text-muted">Keterangan </span> </td>
									<td>
										<?php if ($keterangan == null) {
											echo "-";
										} else {
											echo $keterangan;
										} ?></td>
									</tr>
									<tr>
										<td> <span class="text-muted">Bukti Tidak Masuk</span> </td>
										<td>
											<?php if ($buktiizin == null) {
												echo "-";
											} else {
												echo $buktiizin;
											} ?>
											
										</td>
									</tr>
									<tr>
										<td><span class="text-muted">Tanggal Tidak Masuk </span> </td>
										<td> <?= $tanggalLeave ?></td>
									</tr>
									<tr>
										<td><span class="text-muted">Status </span></td>
										<td> <?php if ($status == 0) {
											echo "Menunggu Persetujuan";
										} else if ($status == 1) {
											echo "Di Setujui";
										} else {
											echo "Di Tolak";
										} ?></td>
									</tr>
										<!-- <tr>
											<td><span class="text-muted">Date Update </span></td>
											<td> <?php if ($date_update == null) {
												echo "-";
											} else {
												echo $date_update;
											} ?></td>
										</tr> -->
										<tr>
											<td>Note</td>
											<td>
												<?php if ($note == null) {
													echo "-";
												} else {
													echo $note;
												} ?></td>
											</td>

										</td>
									</tr>
								</table>
							</div>
						</div>
					</div>
					<!-- <div class="modal-footer">
						<?php
						if ($user['id_rule'] == 2) {
							echo "No Action";
						} else {
							?>

							<?php
							if ($status == 0) {
								?>
								<a class="btn-setuju-permohonan btn btn-primary" href="<?= base_url("permohonan/insert_acc_cuti/" . $id_cuti) ?>">Setujui</a>
								<a class="btn btn-warning text-white btnTolak" href="#" data-toggle="modal" data-target="#rejectModal<?= $id_cuti ?>" data-dismiss="modal">Tolak</a>

							<?php } else {
								if ($status == 2) {
									?>
									<a class="btn-setuju-permohonan btn btn-success text-white" href="<?= base_url("permohonan/insert_acc_cuti/" . $id_cuti) ?>">Setujui</a>
								<?php } else { ?>
									<a class="btn btn-warning text-white btnTolak" href="#" data-toggle="modal" data-target="#rejectModal<?= $id_cuti ?>" data-dismiss="modal" data-dismiss="modal">Tolak</a>
								<?php }
							}
						} ?>
					</div>
					<?php echo form_close() ?>
				-->				</div>
			</div>
		</div>
		<?php endforeach; ?>