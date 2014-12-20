<?php 
/********************************************
Currency Price calculate and info
********************************************/
class currency_library {
	  
    function currency()
    {
		$this->CI = & get_instance();
		$this->CI->load->library('session');
		$query = $this->CI->db->query('SELECT * FROM currency WHERE id = '.$this->CI->session->userdata('currency').'');
 		return $query->result();

    } 
}
	