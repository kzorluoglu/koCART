	<?php
    $this->CI =& get_instance();
	$this->CI->load->library('session');

	if($this->CI->session->userdata('lang') == ""){
		$this->CI->session->set_userdata('lang', '2');
		$this->CI->session->set_userdata('lang_file', 'english');
	}
	?>