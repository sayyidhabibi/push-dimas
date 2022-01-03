   <!--**********************************
            Content body start
        ***********************************-->
   <div class="content-body">


       <!-- row -->
       <?= $this->session->flashdata('pesan');?>
       <div class="container-fluid">
           <div class="row">
               <div class="col-12">

                   <div class="card">
                       <div class="card-body">
                           <h4 class="card-title">Data Table</h4>
                           
                           <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModalCenter">[+] Add Data </button>
                           <div class="table-responsive">
                               <table class="table table-striped table-bordered zero-configuration">
                                   <thead>
                                       <tr>
                                           <th>Title</th>
                                           <th>Durasi</th>
                                           <th>Action</th>
                                       </tr>
                                   </thead>
                                   <tbody>
                                       <?php foreach ($jeniskeperluancuti->result_array() as $key => $value):
                                       
                                            $title = $value['title'];
                                            $durasi = $value['durasi'];
                                            $id_jeniskeperluancuti = $value['id_jeniskeperluancuti'];

                                        ?>
                                           <tr>
                                               <td><?= $title ?> </td>
                                               <td><?= $durasi ?> <sup><b> Day</b></sup></td>
                                               <td><a class="btn btn-primary mx-1" href="#" data-toggle="modal" data-target="#modaleditkeperluancuti<?=$id_jeniskeperluancuti?>"><i class="mdi mdi-pencil-box"> </i>Edit</a> <a class="btn btn-danger mx-1" href="#" data-toggle="modal" data-target="#deletejeniskeperluancuti<?=$id_jeniskeperluancuti?>"><i class="mdi mdi-delete"> </i>DELETE</a> </td>
                                           </tr>
                                       <?php endforeach; ?>
                                   </tbody>
                                   <tfoot>
                                       <tr>
                                           <th>Title</th>
                                           <th>Durasi</th>
                                           <th>Action</th>

                                       </tr>
                                   </tfoot>
                               </table>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
       <!-- #/ container -->
   </div>
   <!--**********************************
            Content body end
        ***********************************-->
   <!-- Button trigger modal -->


   <!-- Modal ADD KEPERLUAN CUTI -->
   <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
       <div class="modal-dialog modal-dialog-centered" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalLongTitle">Tambah Keperluan Leave </h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <?php echo form_open_multipart("web/add_keperluanleave") ?>
              
               <div class="modal-body">
                   <div class="row">
                       <div class="col">
                           <input type="text" class="form-control" placeholder="Tittle" name="titlekeperluan" autofocus>
                       </div>
                       <div class="col">
                           <div class="input-group">
                               <input type="number" class="form-control" placeholder="Durasi" name="durasikeperluan">
                               <div class="input-group-append">
                                   <span class="input-group-text">Day</span>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
               <div class="modal-footer">
                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                   <button type="submit" class="btn btn-primary">Save changes</button>
               </div>
               <?php echo form_close() ?>
           </div>
       </div>
   </div>

     <!-- Modal EDIT KEPERLUAN CUTI -->
     <?php foreach ($jeniskeperluancuti->result_array() as $key => $value):                         
                                       $title = $value['title'];
                                       $durasi = $value['durasi'];
                                       $id_jeniskeperluancuti = $value['id_jeniskeperluancuti'];
                                   ?>
     <div class="modal fade" id="modaleditkeperluancuti<?= $id_jeniskeperluancuti;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
       <div class="modal-dialog modal-dialog-centered" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalLongTitle">Tambah Keperluan Leave </h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <?php echo form_open_multipart("web/edit_jeniskeperluancuti") ?>
               <div class="modal-body">
                   <div class="row">
                       <div class="col">
                       <input type="hidden" value="<?= $id_jeniskeperluancuti?>" name="id_jeniskeperluancuti">
                           <input type="text" class="form-control"placeholder="Tittle" name="edittitlekeperluan" value="<?= $title?>" autofocus>
                       </div>
                       <div class="col">
                           <div class="input-group">
                               <input type="number" class="form-control" placeholder="Durasi" name="editdurasikeperluan" value="<?= $durasi?>">
                               <div class="input-group-append">
                                   <span class="input-group-text">Day</span>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
               <div class="modal-footer">
                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                   <button type="submit" class="btn btn-primary">Save changes</button>
               </div>
               <?php echo form_close() ?>
           </div>
       </div>
   </div>
   <?php endforeach;  ?>