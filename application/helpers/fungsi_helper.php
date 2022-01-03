<?php 

function check_already_login(){
	$ci =& get_instance();
	$user_session = $ci->session->userdata('NIK');
	if($user_session) {
		redirect('web');
	}
}

function check_not_login(){
	$ci =& get_instance();
	$user_session = $ci->session->userdata('NIK');
	if(!$user_session) {
		redirect('auth');
	}
}
?>