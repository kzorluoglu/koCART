<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Currency extends KoController {
 
	public function set(){
			$this->load->model('currency_model');
			$id = $this->security->xss_clean($this->uri->segment(3));
			
			$is_valid = $this->currency_model->id_is_valid($id);
			
			if($id != "" & $is_valid == true){
				$this->session->set_userdata('currency', $id);
			} 

			redirect($_SERVER['HTTP_REFERER']);

	}
}

 