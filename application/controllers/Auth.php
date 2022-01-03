<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('app_model');
	}
	public function index()

	{
		check_already_login();
		$data['title'] = "Login Page";
		$this->load->view('login.php', $data);
	}
	public function login()
	{
		check_already_login();

		$post = html_escape($this->input->post(null, TRUE));
		if (isset($post['login'])) {

			$this->load->model('user_model');
			$query = $this->user_model->login($post);

			?>
			<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('assets/images/pigment.png') ?>">
			<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/fontawesome.min.css">
			<!-- Custom Stylesheet -->
			<link href="<?= base_url("assets/") ?>./css/style.css" rel="stylesheet">
			<link href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css" />
			<!-- Custom Calender -->
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
			<link href="<?= base_url("assets/") ?>asset/plugins/fullcalendar/css/fullcalendar.min.css" rel="stylesheet">
			<link href="<?= base_url("assets/") ?>css/style.css" rel="stylesheet">
			<link href="<?= base_url("assets/") ?>asset/plugins/sweetalert/css/sweetalert.css" rel="stylesheet">
			<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
			<script src="<?= base_url("assets/") ?>js/custom.min.js"></script>
			<script src="<?= base_url("assets/") ?>js/settings.js"></script>
			<script src="<?= base_url("assets/") ?>js/gleek.js"></script>
			<script src="<?= base_url("assets/") ?>js/styleSwitcher.js"></script>
			<style>
			body {
				font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
				font-size: 1.124em;
				font-weight: normal;
			}
		</style>

		<body></body>
		<?php
		if ($query->num_rows() > 0) {
			$row = $query->row_array();
			$params = array(
				'NIK' => $row['NIK'],
				'id_rule' => $row['id_rule']
			);
                // $data = array(
                //     "NIK"=>$row['NIK'],
                //     "ID"=>uniqid(),
                //     "joinTime"=>date("Y-m-d H:i:s",now("Asia/Jakarta")),
                //     "P_id"=>0,
                //     "update_time"=>null
                // );
                // var_dump($data);
                // die();
			$this->session->set_userdata($params);
			?>
			<script>
				Swal.fire({
					icon: 'success',
					title: 'success',
					text: 'Selamat, login berhasil',
					showClass: {
						popup: 'animate__animated animate__heartBeat'
					}
				}).then((result) => {

					window.location = '<?= site_url('web') ?>';
				})
			</script>
			<?php
		} else {
			?>
			<script>
				Swal.fire({
					icon: 'error',
					title: 'Failure',
					text: 'Login gagal, NIK / password salah',
					showClass: {
						popup: 'animate__animated animate__headShake'
					}
				}).then((result) => {
					window.location = '<?= site_url('auth') ?>';
				})
			</script>
			<?php

		}
	}
}
public function logout()
{
	$params = array('NIK', 'id_rule', 'namaGrup');
	$this->session->unset_userdata($params);
	$this->session->unset_userdata('mode');
	redirect('auth');
}
}
?>