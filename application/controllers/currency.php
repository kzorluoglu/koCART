<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Currency extends KoController {
 
	public function set(){
	
			$id = $this->security->xss_clean($this->uri->segment(3));
	
			if($id == 1){
				$this->cart->destroy();
				$this->session->set_userdata('currency', '1');
			}
	
			if($id == 2){
				$this->cart->destroy();
				$this->session->set_userdata('currency', '2');
			}

			redirect($_SERVER['HTTP_REFERER']);

	}
}

 