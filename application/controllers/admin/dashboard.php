<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

 
		function __construct()
		{
			parent::__construct();
		}
 
 
	public function index(){
	    
		if(! $this->session->userdata('validated')){
            redirect('admin/account/login');
        }
		$this->load->model('admin/dashboard_model');

		$data["total_order"] = $this->dashboard_model->orders_count();
		$data["orders"] = $this->dashboard_model->orders();
		$data["message"] = "This is a Dashboard of Database";

           $this->load->view('admin/dashboard', $data);
 
			

	}
	
}

 