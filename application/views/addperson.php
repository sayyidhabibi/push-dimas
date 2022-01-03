 <!--**********************************
            Content body start
            ***********************************-->
 <div id="success-message" data-success="<?= $this->session->flashdata('success'); ?>"></div>
   <div id="error-message" data-failed="<?= $this->session->flashdata('error'); ?>"></div>
   <div class="container-fluid">
     <div class="row">
       <div class="col-lg-12">
         <div class="card">
           <div class="card-body">
             <div class="card-title">
               <h4 class="mL">Add Person</h4>
             </div>
             <div class="AddPerson">
               <?php echo form_open_multipart("workschedule/addPersonToGrup") ?>
               <label>Select Grup</label>

               <div class="ui-widget">
                 <select id="selectgrupnameAddPerson" style="background:#000000;">
                   <option value="">Search Grup</option>
                   <?php foreach ($getGrup->result_array() as $key => $value) {
                    ?>
                     <option value="<?= $value['nama_grup'] ?>"><?= $value["nama_grup"] ?></option>
                   <?php } ?>
                 </select>
               </div>

               <!-- <label>Input Karyawan</label>
               <table class="table tableperson">
                 <thead>
                   <tr>
                     <th>Name</th>
                     <th>NIK</th>
                     <th>Departemen</th>
                   </tr>
                 </thead>
                 <tbody>
                   <tr class="tr_input">
                     <td>
                       <div class="ui-widget">
                         <select id="name" style="background:#000000;">
                           <option value="">Search Nik</option>
                           <?php foreach ($karyawan->result_array() as $key => $value) {
                            ?>
                             <option value="<?= $value['Name'] ?>"><?= $value["Name"] ?></option>
                           <?php } ?>
                         </select>
                       </div>
                     </td>
                     <td><input type="text" class="form-control input-rounded" placeholder="NIK" id="nik" name="nik" readonly></td>
                     <td><input type="text" class="form-control input-rounded" placeholder="Departemen" id="bagian" name="bagian" readonly></td>
                   </tr>
                 </tbody>
               </table> -->
               <!-- <button type="submit" class="btn btn-primary" id="mysubmit">SAVE</button> -->
               <?php echo form_close();  ?>
               
               <div class="table-responsive">
                   <table id="karyawantable" class="table zero-configuration">
                     <thead>
                       <tr>
                         <th>Name</th>
                         <th>NIK</th>
                         <th>Departemen</th>
                         <th>Action</th>
                       </tr>
                     </thead>
                     <tbody>
                     </tbody>
                   </table>
                   </div>
               <button class="btn btn-primary my-1 mt-4" id="addPerson">Tambah Karyawan</button>

               <!-- <input type="search" class="form-control grupnamesearch selectgrup" placeholder="Input Grup Name" name="grupname" required="required" id="selectgrupname" value="<?= $this->session->userdata("namaGRUP"); ?>" autofocus> -->
               <div class="table-responsive" id="tabelAddPerson">
                 <label>Data Karyawan</label>
                 <table class="table table-striped table-hover zero-configuration">
                   <thead>
                     <tr>
                       <th>Name</th>
                       <th>NIK</th>
                       <th>Departemen</th>
                       <th>Action</th>
                     </tr>
                   </thead>

                   <tbody>

                     <?php foreach ($karyawan->result_array() as $key => $value) : {
                          $Nama = $value['Name'];
                          $NIK = $value['NIK'];
                          if ($value['DepartemenName'] == NULL) {
                            $DepartemenName = "-";
                          } else {
                            $DepartemenName = $value['DepartemenName'];
                          }
                        } ?>
                       <tr>
                         <?php echo form_open_multipart("workschedule/addPersonToGrup"); ?>
                         
                         <td><?= $Nama;  ?> <input type="hidden" name="namegrup" class="nameGrupAddPerson"></td>
                         <td> <?= $NIK;  ?><input type="hidden" name="nik" class="form-control input-rounded" value="<?= encrypt_url($NIK);  ?>" style="width:auto;" readonly></td>
                         <td><?= $DepartemenName;  ?></td>
                         <td><button type="submit" id="submitAddPerson" class="btn btn-primary btn-rounded text-white">Tambahkan</button></td>
                         <?php echo form_close(); ?>
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