<?php 
 
/********************************************
Load on Startup
If Currency Session empty is,We are Writing standart variable
********************************************/
    $this->CI =& get_instance();
	$this->CI->load->library('session');

	if($this->CI->session->userdata('currency') == ""){
		$this->CI->session->set_userdata('currency', '2');
 	}
?>