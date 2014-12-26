	<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
/********************************************
Load on Startup
If Language Session empty is,We are Writing standart variable
********************************************/
    $CI =& get_instance();
	$CI->load->database();
	$CI->load->library('session');
	$CI->load->model('admin/settings_model');
  
	if($CI->session->userdata('lang') == ""){
		$CI->session->set_userdata('lang', $CI->settings_model->get_default_language_id(1));
		$CI->session->set_userdata('lang_file', $CI->settings_model->get_default_language_filename(1));
 
 	}
	
	?>