<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

 
		function __construct()
		{
			parent::__construct();
			
			if(! $this->session->userdata('validated')){
            redirect('admin/account/login');
        }
		
		}
 
 
	public function index(){
	    
 
		$this->load->model('admin/dashboard_model');

		$data["total_order"] = $this->dashboard_model->orders_count();
		$data["orders"] = $this->dashboard_model->orders();


           $this->load->view('admin/dashboard', $data);
 
			

	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */