 <!--**********************************
            Content body start
            ***********************************-->
 

     <!-- <div class="row page-titles mx-0">
         <div class="col p-md-0">

         </div>
     </div> -->
     <!-- row -->
     <div class="container-fluid">
         <div class="row">
             <div class="col-12">
                 <div class="card">
                     <div class="card-body">
                         <h4 class="card-title mL">History Create Schedule Person </h4>
                         <table id="example" class="table table-striped table-hover zero-configuration" style="width:100%">
                             <thead>
                                 <tr>
                                     <th>NIK</th>
                                     <th>Name</th>
                                     <th>DepartemenName</th>
                                     <th>Nama Grup</th>
                                     <th>Date Created</th>
                                 </tr>
                             </thead>

                             <tbody>
                                 <?php foreach ($HistoryEmployee->result_array() as $keys => $row) :
                                        $nama = $row['Name'];
                                        $NIK = $row['NIK'];
                                        if ($row['DepartemenName'] != NULL) {
                                            $DepartemenName = $row['DepartemenName'];
                                        } else {
                                            $DepartemenName = "-";
                                        }
                                        $id_grup = $row['nama_grup'];
                                        $date_created = date("d-M-yy", strtotime($row['date_created']));
                                    ?>
                                     <tr>
                                         <td><?= $NIK;  ?></td>
                                         <td><?= $nama;  ?></td>
                                         <td><?= $DepartemenName;  ?></td>
                                         <td><?= $id_grup; ?></td>
                                         <td><?= $date_created;  ?></td>

                                     </tr>
                                 <?php endforeach; ?>
                             </tbody>
                         </table>
                     </div>
                 </div>
             </div>
         </div>
     </div>