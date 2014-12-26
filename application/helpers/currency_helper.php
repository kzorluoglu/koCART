<?php 
 
/********************************************
Load on Startup
If Currency Session empty is,We are Writing standart variable
********************************************/
    $CI =& get_instance();
	$CI->load->database();
	$CI->load->library('session');
	$CI->load->model('admin/settings_model');
 
	if($CI->session->userdata('currency') == ""){

		$CI->session->set_userdata('currency', $CI->settings_model->get_default_currency_id(1)); 
 	}
?>