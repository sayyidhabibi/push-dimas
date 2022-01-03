<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Web extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation', 'upload');
    $this->load->model('app_model');
    $this->load->helper(array('form', 'url'));
  }

  public function index()
  {
    // check_not_login();
    // $nik = $this->session->userdata('nik');
    // $data['user'] = $this->app_model->getDataPribadi($nik);
    
    // $data['title'] = "Home Page Nippisun";
    // $this->load->view('header.php', $data);
    // $this->load->view('dashboard.php', $data);
    // $this->load->view('footer.php', $data);
    check_not_login();
    $nik = $this->session->userdata('NIK');
    
   $data['user'] = $this->app_model->getDataPribadi($nik);
   
    $data['title'] = "Home Page Nippisun";
    $this->template->load('template', 'dashboard', $data);
  }
  //data karyawan cuti 
  



//   /*
// <!--**********************************
//            MJenis Cuti
//             ***********************************-->
//   */
//   public function MjenisCuti()
//   {
//     $id_user = $this->session->userdata('nik');
//     $data['user'] = $this->db->get_where('tbl_user', ['NIK' => $id_user])->row_array();
//     $data['jeniskeperluancuti'] = $this->db->get("tbl_jeniskeperluancuti");
//     $data['title'] = "Page Master Data Keperluan Cuti Nippisun";
//     $this->form_validation->set_rules('jeniscuti', 'Jenis_cuti', 'Trim|required');
//     $this->load->view('header.php', $data);
//     $this->load->view('Tabel_Jenis_Cuti', $data);
//     $this->load->view('footer.php', $data);
//   }

//   public function add_keperluanleave()
//   {
//     $this->form_validation->set_rules("titlekeperluan", "Titlekeperluan", "required|trim");
//     $this->form_validation->set_rules("durasikeperluan", "Durasikeperluan", "required|trim|xss_clean");
//     if ($this->form_validation->run() == false) {
//     } else {
//       $namakeperluan = $this->input->post("titlekeperluan");
//       $durasikeperluan = $this->input->post("durasikeperluan");
//       $data = array(
//         "id_jeniskeperluancuti" => uniqid(),
//         "title" => $namakeperluan,
//         "durasi" => $durasikeperluan
//       );
//       $this->db->insert("tbl_jeniskeperluancuti", $data);
//       if ($this->db->affected_rows() == 1) {
//         $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
//                 Keperluan Berhasil Ditambahkan
//                 </div>');
//         redirect('web/Mjeniscuti');
//       } else {
//         $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
//               Keperluan Gagal Ditambahkan
//                 </div>');
//         redirect('web/Mjeniscuti');
//       }
//     }
//   }

//   public function edit_jeniskeperluancuti()
//   {
//     $this->form_validation->set_rules("edittitlekeperluan", "Edittitlekeperluan", "required|trim");
//     $this->form_validation->set_rules("editdurasikeperluan", "Editdurasikeperluan", "required|trim|xss_clean");
//     if ($this->form_validation->run() == false) {
//     } else {
//       $id_jeniskeperluancuti = $this->input->post("id_jeniskeperluancuti");
//       $namakeperluan = $this->input->post("edittitlekeperluan");
//       $durasikeperluan = $this->input->post("editdurasikeperluan");
//       $data = array(
//         "title" => $namakeperluan,
//         "durasi" => $durasikeperluan
//       );

//       $this->db->set($data);
//       $this->db->where("id_jeniskeperluancuti", $id_jeniskeperluancuti);
//       $this->db->update("tbl_jeniskeperluancuti");

//       if ($this->db->affected_rows() == 1) {
//         $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
//                 Keperluan Berhasil Diubah
//                 </div>');
//         redirect('web/Mjeniscuti');
//       } else {
//         $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
//               Keperluan Gagal Diubah
//                 </div>');
//         redirect('web/Mjeniscuti');
//       }
//     }
//   }
//   /*
// <!--**********************************
//             END Mjenis Cuti
// ***********************************-->
//   */


//   /*
// <!--**********************************
//             Formulir Cuti
//             ***********************************-->
//   */
//   public function form_overtime()
//   {
//     $id_user = $this->session->userdata('nik');
//     $data['user'] = $this->db->get_where('tbl_user', ['NIK' => $id_user])->row_array();
//     $data['karyawan'] = $this->db->query("SELECT * FROM tbl_karyawan LEFT JOIN tbl_departemen ON tbl_karyawan.id_departemen = tbl_departemen.id_departemen WHERE tbl_karyawan.NIK ='$id_user' ");
//     $data['title'] = "Page Form Cuti Nippisun";
//     $this->load->view('header.php', $data);
//     $this->load->view('formulir_overtime', $data);
//     $this->load->view('footer.php', $data);
//   }
//   /*
// <!--**********************************
//             END Formulir Cuti
//             ***********************************-->
//   */


//   /*
// <!--**********************************
//           Add Formulir Lembur
// ***********************************-->
//   */

//   public function add_formulirlembur()
//   {
//     $nik = $this->session->userdata('nik');
//     $keperluanlembur = $this->input->post('keterangan_lembur');
//     $tanggallembur = $this->input->post('tanggallembur');
//     $starttime = $this->input->post('jamStartLembur');
//     $endtime = $this->input->post('jamEndLembur');
//     $this->form_validation->set_rules('keterangan_lembur', 'Keterangan_Lembur', 'required|Trim');
//     $this->form_validation->set_rules('tanggallembur', 'Tanggallembur', 'required|Trim');
//     $this->form_validation->set_rules('jamStartLembur', 'JamStartLembur', 'required|Trim');
//     $this->form_validation->set_rules('jamEndLembur', 'JamEndLembur', 'required|Trim');
//     if ($this->form_validation->run() == false) {
//       $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Check Kembali Input Anda/ Input Tidak Boleh Kosong
//       </div>');
//       redirect('web/form_overtime;');
//     } else {
//       $nik = $this->session->userdata('nik');
//       $keperluanlembur = $this->input->post('keterangan_lembur');
//       $tanggallembur = $this->input->post('tanggallembur');
//       $starttime = date("H:i:s", strtotime($this->input->post('jamStartLembur')));
//       $endtime = date("H:i:s", strtotime($this->input->post('jamEndLembur')));
//       $data = array(
//         'id_lembur' => uniqid(),
//         'keperluan' => $keperluanlembur,
//         'start_ot' => $starttime,
//         'end_ot' => $endtime,
//         'NIK' => $nik,
//         'tanggal_lembur' => $tanggallembur,
//         'date_created' => date('Y-m-d'),
//         'status' => 0,
//         'date_update' => NULL
//       );
//       $this->db->insert('tbl_overtime', $data);
//     }
//     if ($this->db->affected_rows() == 1) {
//       $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Overtime Berhasil Dibuat
//       </div>');
//       redirect('web/datapribadi_overtime');
//     } else {
//       $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Overtime Gagal Dibuat
//       </div>');
//       redirect('web/form_overtime');
//     }
//     /*  $end = strtotime ('2021-06-21') ;
// $start = strtotime ("-1 month -1 days", $end) ;
// $new['first'] =  date ('Y-m-d', $start) ;
// $new['last'] = date ('Y-m-d', $end) ; 

// $interval = DateInterval::createFromDateString ('1 days') ;

// $periods = new DatePeriod(new DateTime($new['first']), $interval, new DateTime($new['last'])) ;*/
//   }
//   /*
// <!--**********************************
//            End Add Formulir Lembur
// ***********************************-->
//   */


//   public function datapribadi_overtime()
//   {
//     $nik = $this->session->userdata('nik');

//     $data['overtime'] = $this->db->query("SELECT * FROM tbl_overtime LEFT JOIN tbl_karyawan ON tbl_overtime.NIK = tbl_karyawan.NIK WHERE tbl_overtime.NIK='$nik'");
//     $data['karyawan'] = $this->db->query("SELECT * FROM tbl_karyawan LEFT JOIN tbl_departemen ON tbl_karyawan.id_departemen = tbl_departemen.id_departemen WHERE tbl_karyawan.NIK ='$nik' ");
//     $data['title'] = "Data Lembur Pribadi Page Nippisun";
//     $this->load->view('header', $data);
//     $this->load->view('datapribadi_overtime', $data);
//     $this->load->view('footer', $data);
//   }


//   public function edit_datapribadi_overtime()
//   {
//     $this->form_validation->set_rules('keterangan_lembur', 'Keterangan_Lembur', 'required|Trim');
//     $this->form_validation->set_rules('tanggallembur', 'Tanggallembur', 'required|Trim');
//     $this->form_validation->set_rules('jamStartLembur', 'JamStartLembur', 'required|Trim');
//     $this->form_validation->set_rules('jamEndLembur', 'JamEndLembur', 'required|Trim');
//     if ($this->form_validation->run() == false) {
//       $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Check Kembali Input Anda/ Input Tidak Boleh Kosong
//       </div>');
//       redirect('web/tabel_cuti_pribadi;');
//     } else {
//       $id_lembur = $this->input->post('id_lembur');
//       $keperluanlembur = $this->input->post('keterangan_lembur');
//       $tanggallembur = date("Y-m-d", strtotime($this->input->post('tanggallembur')));
//       $starttime = date("H:i:s", strtotime($this->input->post('jamStartLembur')));

//       $endtime = date("H:i:s", strtotime($this->input->post('jamEndLembur')));
//       $data = array(
//         'keperluan' => $keperluanlembur,
//         'start_ot' => $starttime,
//         'end_ot' => $endtime,
//         'tanggal_lembur' => $tanggallembur,
//         'date_update' => date('Y-m-d')
//       );
//       $this->db->where('id_lembur', $id_lembur);
//       $this->db->update('tbl_overtime', $data);
//       if ($this->db->affected_rows() == 1) {
//         $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
//         Permintaan Overtime Berhasil Diubah
//         </div>');
//         redirect('web/datapribadi_overtime');
//       } else {
//         $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
//         Permintaan Overtime Gagal Diubah
//         </div>');
//         redirect('web/datapribadi_overtime');
//       }
//     }
//   }
//   public function datakaryawan_overtime()
//   {
//     $nik = $this->session->userdata('nik');
//     $id_rule = $this->session->userdata('id_rule');
//     $sql = $this->db->query("SELECT * FROM tbl_karyawan where NIK ='$nik'");
//     foreach ($sql->result() as $key => $row) {
//     }
//     $id_departemen = $row->id_departemen;

//     if ($id_rule == 2) {
//       $data['overtime']   = $this->db->query("SELECT * from tbl_overtime left join tbl_karyawan on
//       tbl_overtime.NIK=tbl_karyawan.NIK")->result_array();
//       $data['karyawan'] = $this->db->query("SELECT * from tbl_karyawan left join tbl_departemen on
//       tbl_karyawan.id_departemen=tbl_departemen.id_departemen")->result_array();
//     } else {
//       $data['overtime']   = $this->db->query("SELECT * from tbl_overtime left join tbl_karyawan on
//       tbl_overtime.NIK=tbl_karyawan.NIK WHERE id_departemen='$id_departemen'");
//     }

//     $data['title'] = "Data Karyawan Overtime Page Nippisun";
//     $this->load->view('header', $data);
//     $this->load->view('datakaryawan_overtime', $data);
//     $this->load->view('footer', $data);
//   }
//   public function insert_acc_lembur($id_lembur)
//   {
//     $data = array(
//       'status' => 1,
//       'date_update' => date('Y-m-d')
//     );
//     $this->db->where('id_lembur', $id_lembur);
//     $this->db->update('tbl_overtime', $data);
//     if ($this->db->affected_rows() == 1) {
//       $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
//       Permintaan Overtime Berhasil Disetujui
//       </div>');
//       redirect('web/datakaryawan_overtime');
//     } else {
//       $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
//       Permintaan Overtime Gagal Disetujui
//       </div>');
//       redirect('web/datakaryawan_overtime');
//     }
//   }
//   public function insert_tolak_lembur($id_lembur)
//   {
//     $data = array(
//       'status' => 2,
//       'date_update' => date('Y-m-d')
//     );
//     $this->db->where('id_lembur', $id_lembur);
//     $this->db->update('tbl_overtime', $data);
//     if ($this->db->affected_rows() == 1) {
//       $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
//       Permintaan Overtime Berhasil Ditolak
//       </div>');
//       redirect('web/datakaryawan_overtime');
//     } else {
//       $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
//       Permintaan Overtime Gagal Ditolak
//       </div>');
//       redirect('web/datakaryawan_overtime');
//     }
//   }
//   /*
// <!--**********************************
//             Delete Overtime
//             ***********************************-->
//   */
//   public function delete_overtime($id_lembur)
//   {
//     $this->db->query("DELETE FROM tbl_overtime where id_lembur='$id_lembur'");
//     if ($this->db->affected_rows() == 1) {
//       $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
//                   Permintaan Overtime Berhasil DiHapus
//                   </div>');
//       redirect('web/datakaryawan_overtime');
//     } else {
//       $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
//                   Permintaan Overtime Gagal Dihapus
//                   </div>');
//       redirect('web/datakaryawan_overtime');
//     }
//   }



//   /*
// <!--**********************************
//             Create Work  Schedule
//             ***********************************-->
//   */
//   public function workschedule()
//   {

//     $id_user = $this->session->userdata('nik');
//     $data['user'] = $this->db->get_where('tbl_user', ['NIK' => $id_user])->row_array();
//     $data['karyawan'] = $this->db->query("SELECT * FROM tbl_karyawan LEFT JOIN tbl_departemen ON tbl_karyawan.id_departemen = tbl_departemen.id_departemen WHERE tbl_karyawan.NIK ='$id_user' ");
//     $data['title'] = "Page Form Work schedule Nippisun";

//     $data['jadwal'] = $this->db->query("SELECT * FROM tbl_jenis_jadwal");
//     /*$prefs = array(
//                 'start_day'    => 'saturday',
//                 'month_type'   => 'long',
//                 'day_type'     => 'short',
//                 'show_next_prev'  => TRUE,
//                 'next_prev_url'   => base_url().'web/workschedule'
//               );
//               $datakaryawan=array();
//               foreach ($sql->result() as $key => $value){
//                 array_push($datakaryawan,array(
//                   'id_jenis_jadwal'=>$value->id_jadwal,
//                   'Nama_Jadwal'=>$value->Nama_jadwal
//                 ));
//               }
//               $prefs['template'] = '
//               {table_open}<table class=" table table-striped table-bordered table-responsive">{/table_open}
//               {heading_row_start}<tr>{/heading_row_start}
//               {heading_previous_cell}<th><a href="{previous_url}">&lt;&lt;</a></th>{/heading_previous_cell}
//               {heading_title_cell}<th colspan="{colspan}">{heading}</th>{/heading_title_cell}
//               {heading_next_cell}<th><a href="{next_url}">&gt;&gt;</a></th>{/heading_next_cell}
//               {heading_row_end}</tr>{/heading_row_end}
//               {week_row_start}<tr>{/week_row_start}
//               {week_day_cell}<td>{week_day}</td>{/week_day_cell}
//               {week_row_end}</tr>{/week_row_end}
//               {cal_row_start}<tr>{/cal_row_start}
//               {cal_cell_start}<td>{/cal_cell_start}
//               {cal_cell_start_today}<td>{/cal_cell_start_today}
//               {cal_cell_start_other}<td class="other-month">{/cal_cell_start_other}
//               {cal_cell_no_content}<select class="custom-select custom-select-lg mb-3" name="shift[]" style="width: 100px;"required>
//               <option value="">-------</option>
//               <option value="shift1">shift 1</option>
//               </select><input type="hidden" value="'.$year.'-'.$month.'-{day}" name="datework[]">  {day}{/cal_cell_no_content}
//               {cal_cell_no_content_today} <div class="highlight"><select class="custom-select custom-select-lg mb-3" name="shift[]" style="width: 100px;"required>
//               <option value="">-------</option>
//               <option value="shift1">shift 1</option>
//               </select><input type="hidden" value="'.$year.'-'.$month.'-{day}" name="datework[]">  {day}</div>{/cal_cell_no_content_today}
//               {cal_cell_blank}&nbsp;{/cal_cell_blank}
//               {cal_cell_other}{day}{/cal_cel_other}
//               {cal_cell_end}</td>{/cal_cell_end}
//               {cal_cell_end_today}</td>{/cal_cell_end_today}
//               {cal_cell_end_other}</td>{/cal_cell_end_other}
//               {cal_row_end}</tr>{/cal_row_end}
//               {table_close}</table>{/table_close}
//               ';
//               $this->load->library('calendar',$prefs);
//               $data['calender']= $this->calendar->generate($this->uri->segment(3), $this->uri->segment(4));*/
//     $this->load->view('header.php', $data);
//     $this->load->view('work_schedule', $data);
//     $this->load->view('footer.php', $data);
//   }
//   public function workschedule_addperson()
//   {

//     $id_user = $this->session->userdata('nik');
//     $data['user'] = $this->db->get_where('tbl_user', ['NIK' => $id_user])->row_array();
//     $data['karyawan'] = $this->db->query("SELECT * FROM tbl_karyawan LEFT JOIN tbl_departemen ON tbl_karyawan.id_departemen = tbl_departemen.id_departemen WHERE tbl_karyawan.NIK ='$id_user' ");
//     $data['title'] = "Page Form Work schedule Nippisun";
//     $data['jadwal'] = $this->db->query("SELECT * FROM tbl_jenis_jadwal");
//     $this->load->view('header.php', $data);
//     $this->load->view('workschedule_addperson', $data);
//     $this->load->view('footer.php', $data);
//   }



//   /*
// <!--**********************************
//            END Work Schedule
//             ***********************************-->
//   */

//   /*
// <!--**********************************
//            Start Search Grup person
//             ***********************************-->
//   */
//   public function getsearchgrupperson()
//   {
//     if (isset($_GET['term'])) {
//       $nama_grup = $_GET['term'];

//       $this->db->like('nama_grup', $nama_grup, 'both');
//       $this->db->order_by('nama_grup', 'ASC');
//       $this->db->limit(10);
//       $result = $this->db->get("tbl_grup")->result();
//       if (count($result) > 0) {
//         foreach ($result as $row)
//           $data[] = array("value" => $row->id_grup, "label" => $row->nama_grup);
//         echo json_encode($data);
//       } else {
//         $data[] = array("value" => NULL, "label" => "Data Tidak Ditemukan");
//         echo json_encode($data);
//       }
//     }
//   }

//   /*
// <!--**********************************
//            END Search Grup
//             ***********************************-->
//   */
//   /*
// <!--**********************************
//            Start Get data Grup
//             ***********************************-->
//   */
//   public function Getdatapersonbygrup()
//   {
//     var_dump($_GET);
//     die();
//     // $request = $_POST[];
//     // if ($request == 2) {
//     //   $nama_grup = $_POST['namagrup'];
//     //   $result = $this->db->query("SELECT* FROM tbl_work_schedule_person JOIN tbl_karyawan ON tbl_work_schedule_person.NIK = tbl_karyawan.NIK WHERE tbl_work_schedule_person.id_grup = '$nama_grup'")->result();
//     //   $users_arr = [];
//     //   if (count($result) > 0) {
//     //     foreach ($result as $row) {
//     //       $id_work = $row->id_workperson;
//     //       $NIK = $row->NIK;
//     //       $nama = $row->nama;
//     //       $users_arr[] = array("id_work" => $id_work, "NIK" => $NIK, "nama" => $nama);
//     //     }
//     //   }
      
//     // }
//   }


//   /*
// <!--**********************************
//            End Get data Grup
//             ***********************************-->
//   */
//   /*
// <!--**********************************
//            Start Search person
//             ***********************************-->
//   */
//   public function getsearchperson()
//   {
//     $request = $_POST['request']; // request

//     // Get username list
//     if ($request == 1) {
//       $search = $_POST['search'];

//       $query = $this->db->query("SELECT * FROM tbl_karyawan WHERE nama like'%" . $search . "%'");
//       foreach ($query->result_array() as $key => $value) {
//         $response[] = array("value" => $value['NIK'], "label" => $value['nama']);
//       }

//       // encoding array toj autson format
//       echo json_encode($response);
//       exit;
//     }

//     // Get details
//     if ($request == 2) {
//       $userid = $_POST['userid'];
//       $sql = $this->db->query("SELECT * FROM tbl_karyawan WHERE NIK='$userid'");


//       foreach ($sql->result_array() as $key => $value) {
//         $NIK = $value['NIK'];
//         $nama = $value['nama'];
//         $bagian = $value['id_departemen'];
//         $users_arr[] = array("NIK" => $NIK, "nama" => $nama, "id_departemen" => $bagian);
//       }


//       // encoding array to json format
//       echo json_encode($users_arr);
//       exit;
//     }
//   }

//   /*
// <!--**********************************
//            END Search Person
//             ***********************************-->
//   */


//   /*
// <!--***********s***********************
//             Add Work Schedule
//             ***********************************-->
//   */
//   public function addworkschedule()
//   {

//     $nama_grup = $this->input->post("grupname",);

//     $data = array(
//       "id_grup" => uniqid(),
//       "nama_grup" => $nama_grup
//     );

//     $this->db->insert("tbl_grup", $data);
//     if ($this->db->affected_rows() > 0) {
//       $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Grup Berhasil Dibuat
//                 </div>');
//       redirect("web/workschedule");
//     } else {
//       $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Grup Gagal Dibuat
//                 </div>');
//       redirect("web/workschedule");
//     }
//   }
//   public function addgrupschedule()
//   {
//     //select data grup

//     $nama_grup = $this->input->post("addGrupModal");
//     $startdate = date('Y-m-d H:i:s', strtotime(htmlspecialchars($this->input->post("addStartDate"))));
//     $enddate = date('Y-m-d H:i:s', strtotime(htmlspecialchars($this->input->post("addEndDate")) . "23:59:00"));
//     $schedulework = htmlspecialchars($this->input->post("jenishift"));
//     $sql = $this->db->query("SELECT * FROM tbl_grup WHERE nama_grup = '$nama_grup'");
//     $row = $sql->num_rows();
//     if ($row > 0) {
//       foreach ($sql->result_array() as $key => $row) :
//         $data = array(
//           "id_schedule" => uniqid(),
//           "id_grup" => $row['id_grup'],
//           "id_jadwal" => $schedulework,
//           "start_work" => $startdate,
//           "end_work" => $enddate,
//           "date_created" => date('Y-m-d H:i:s'),
//           "date_update" => NULL
//         );
//       endforeach;
//       $this->db->insert("tbl_workschedule", $data);
//       if ($this->db->affected_rows() > 0) {
//         $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Schedule Grup Berhasil Dibuat
//                   </div>');
//         redirect("web/workschedule");
//       } else {
//         $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Schedule Grup Gagal Dibuat
//                   </div>');
//         redirect("web/workschedule");
//       }
//     } else {
//       $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Nama Grup Tidak ada, Tolong tambahkan grup terlebih dahulu
//                 </div>');
//       redirect("web/workschedule");
//     }
//   }




//   /*
// <!--**********************************
//            END Add Work Schedule
//             ***********************************-->
//   */
//   /*
// <!--**********************************
//            Start Add person Work Schedule
//             ************** *********************-->
//   */
//   public function addpersonschedule()
//   {
//     $session = $this->session->userdata('nik');
//     $this->form_validation->set_rules('nik', 'Nik', 'required|trim|xss_clean|is_unique[tbl_work_schedule_person.NIK]', array('is_unique' => 'Nama Grup Tidak Boleh Sama'));
//     $this->form_validation->set_rules('selectgrup', 'Selectgrup', 'required|trim|xss_clean');
//     if ($this->form_validation->run() == false) {
//       $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Check Kembali Input Anda/ Input Tidak Boleh Kosong
//                 </div>');
//       redirect("web/workschedule_addperson");
//     } else {
//       $nik = $this->input->post('nik');
//       $nama_grup = $this->input->post('selectgrup');

//       $data = [];
//       if ($nik == $session) {
//         $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Maaf User Ini tidak bisa ditambahkan
//         </div>');
//         redirect("web/workschedule_addperson");
//       } else {
//         $sql = $this->db->query("SELECT id_grup 
//         FROM tbl_grup 
//         WHERE nama_grup ='$nama_grup'");
//         foreach ($sql->result_array() as $key => $row) :
//           $checkgrup = $this->db->query("SELECT id_grup 
//           FROM tbl_workschedule 
//           WHERE id_grup ='$row[id_grup]'")->num_rows();
//           if ($checkgrup > 0) {
//             $id_grup = $row['id_grup'];
//             $data = array(
//               'id_workperson' => uniqid(),
//               'NIK' => $nik,
//               'id_grup' => $id_grup,
//               'date_created' => date('Y-m-d H:i:s'),
//               'date_update' => NULL
//             );


//             $this->db->insert("tbl_work_schedule_person", $data);
//             if ($this->db->affected_rows() > 0) {
//               $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">schedule karyawan Berhasil Dibuat 
//                   </div>');
//               redirect("web/workschedule_addperson");
//             } else {
//               $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">schedule karyawan Gagal Dibuat
//                   </div>');
//               redirect("web/workschedule_addperson");
//             }
//           } else {
//             $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Schedule Grup Belum Dibuat! Silahkan Buat Terlebih Dahulu
//                   </div>');
//             redirect("web/workschedule_addperson");
//           }
//         endforeach;
//       }
//     }
//   }
//   public function personschedule_delete($id_workperson)
//   {

//     $this->db->delete('tbl_work_schedule_person', array('id_workperson' => $id_workperson));

//     if ($this->db->affected_rows() == 1) {
//       $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">schedule Grup Berhasil dihapus
//                 </div>');
//       redirect("web/workschedule_addperson");
//     } else {
//       $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">schedule Grup Gagal dihapus
//                 </div>');
//       redirect("web/workschedule_addperson");
//     }
//   }

//   /*
// <!--**********************************
//            End Add person Work Schedule
//             ***********************************-->
//   */

//   public function getevent_grup()
//   {
//     $start = $this->input->get("start");
//     $end = $this->input->get("end");
//     $startdt = new DateTime('now'); // setup a local datetime
//     $startdt->setTimestamp($start); // Set the date based on timestamp
//     $start_format = $startdt->format('Y-m-d');
//     $enddt = new DateTime('now'); // setup a local datetime
//     $enddt->setTimestamp($end); // Set the date based on timestamp
//     $end_format = $enddt->format('Y-m-d');

//     $sql = $this->db->query("SELECT * FROM tbl_workschedule JOIN tbl_jenis_jadwal ON tbl_jenis_jadwal.id_jadwal = tbl_workschedule.id_jadwal JOIN tbl_grup ON tbl_grup.id_grup = tbl_workschedule.id_grup WHERE tbl_workschedule.start_work >= '$start_format' OR tbl_workschedule.end_work >= '$end_format' ");
//     $data = [];
//     foreach ($sql->result() as $key) {
//       $endDate = $key->end_work;
//       $data[] = array(
//         'id' => encrypt_url($key->id_schedule),
//         'title' => $key->Nama_jadwal,
//         'start' => $key->start_work,
//         'end' => $endDate,
//         'grup' => $key->nama_grup
//       );
//     }
//     echo json_encode(array("events" => $data));
//     exit;
//   }
//   public function delete_workschedule($id_schedulegrup)
//   {
//     $this->db->delete('tbl_workschedule', array('id_schedule' => $id_schedulegrup));
//     if ($this->db->affected_rows() == 1) {
//       $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">schedule Grup Berhasil dihapus
//                 </div>');
//       redirect("web/workschedule");
//     } else {
//       $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">schedule Grup Gagal dihapus
//                 </div>');
//       redirect("web/workschedule");
//     }
//   }
//   public function update_work_schedule()
//   {
//     $id_jadwal = $this->input->post("id_schedule");
//     $nama_grup = $this->input->post("editTitle");
//     $this->db->where("nama_grup", $nama_grup);
//     $sql = $this->db->get("tbl_grup");
//     foreach ($sql->result() as $key => $row) :
//       $startdate = date('Y-m-d H:i:s', strtotime(htmlspecialchars($this->input->post("editStartDate"))));
//       $enddate = date('Y-m-d H:i:s', strtotime(htmlspecialchars($this->input->post("editEndDate")) . "23:59:00"));
//       $schedulework = htmlspecialchars($this->input->post("jenishift"));
//       $data = array(
//         "id_grup" => $row->id_grup,
//         "id_jadwal" => $schedulework,
//         "start_work" => $startdate,
//         "end_work" => $enddate,
//         "date_update" => date('Y-m-d')
//       );
//     endforeach;
//     $this->db->where('id_schedule', $id_jadwal);
//     $this->db->update('tbl_workschedule', $data);
//     if ($this->db->affected_rows() > 0) {
//       $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Schedule Grup Berhasil Diubah
//         </div>');
//       redirect("web/workschedule");
//     } else {
//       $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Schedule Grup Gagal Diubah
//         </div>');
//       redirect("web/workschedule");
//     }
//   }
//   //person schedule
//   public function workschedule_person()
//   {
//     $id_user = $this->session->userdata('nik');
//     $data['user'] = $this->db->get_where('tbl_user', ['NIK' => $id_user])->row_array();
//     $data['karyawan'] = $this->db->query("SELECT * FROM tbl_karyawan LEFT JOIN tbl_departemen ON tbl_karyawan.id_departemen = tbl_departemen.id_departemen WHERE tbl_karyawan.NIK ='$id_user' ");
//     $data['title'] = "Page Form Work schedule Nippisun";
//     $data['jadwal'] = $this->db->query("SELECT * FROM tbl_jenis_jadwal");
//     $this->load->view('header.php', $data);
//     $this->load->view('SchedulePerson', $data);
//     $this->load->view('footer.php', $data);
//   }
//   public function getschedule_person()
//   {
//     // $start = $this->input->get("start");
//     // $end = $this->input->get("end");
//     // $startdt = new DateTime('now'); // setup a local datetime
//     // $startdt->setTimestamp($start); // Set the date based on timestamp
//     // $start_format = $startdt->f  ormat('Y-m-d');
//     // $enddt = new DateTime('now'); // setup a local datetime
//     // $enddt->setTimestamp($end); // Set the date based on timestamp
//     // $end_format = $enddt->format('Y-m-d');

//     // $sql = $this->db->query("SELECT * FROM tbl_workschedule JOIN tbl_jenis_jadwal ON tbl_jenis_jadwal.id_jadwal = tbl_workschedule.id_jadwal JOIN tbl_grup ON tbl_grup.id_grup = tbl_workschedule.id_grup WHERE tbl_workschedule.start_work >= '$start_format' OR tbl_workschedule.end_work >= '$end_format' ");
//     // $data = array();
//     // foreach ($sql->result() as $key) {
//     //   $endDate = $key->end_work;
//     //   $data[] = array(
//     //     'id' => $key->id_schedule,
//     //     'title' => $key->nama_grup,
//     //     'start' => $key->start_work,
//     //     'end' => $endDate,
//     //     'jadwal' => $key->Nama_jadwal
//     //   );
//     // }
//     // echo json_encode(array("events" => $data));
//     // exit;
//     $start = $this->input->get("start");
//     $end = $this->input->get("end");
//     $startdt = new DateTime('now'); // setup a local datetime
//     $startdt->setTimestamp($start); // Set the date based on timestamp
//     $start_format = $startdt->format('Y-m-d');
//     $enddt = new DateTime('now'); // setup a local datetime
//     $enddt->setTimestamp($end); // Set the date based on timestamp
//     $end_format = $enddt->format('Y-m-d');
//     $sql = $this->db->query("SELECT tbl_workschedule.id_schedule,tbl_workschedule.id_grup,start_work,end_work,NIK,id_jadwal,id_workperson
//             FROM tbl_grup as grup
//             LEFT JOIN tbl_workschedule on grup.id_grup =tbl_workschedule.id_grup 
//           LEFT JOIN tbl_work_schedule_person on grup.id_grup = tbl_work_schedule_person.id_grup
//             WHERE (grup.id_grup ='6103f3efdebee') OR ( tbl_workschedule.start_work= '$start_format' or tbl_workschedule.end_work='$end_format')");
//     $data = array();
//     foreach ($sql->result() as $key) {
//       $data = array(
//         'id' => $key->id_workperson,
//         'title' => $key->NIK,
//         'start' => $key->start_work,
//         'end' => $key->end_work,
//         'jadwal' => $key->id_jadwal
//       );
//     }
//     echo json_encode(array("events" => $data));
//     exit;
//   }
// }
}