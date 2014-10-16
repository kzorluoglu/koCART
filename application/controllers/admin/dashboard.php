<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
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

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */