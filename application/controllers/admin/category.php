<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller {

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
	}
	
	public function lists(){
		$this->load->model('admin/category_model');
		$this->load->library("pagination");
 
		$config = array();
        $config["base_url"] = base_url() . "admin/category/lists";
        $config["total_rows"] = $this->category_model->category_count();
        $config["per_page"] = 10;
        $config["uri_segment"] = 4;
 
        $this->pagination->initialize($config);
 
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data["links"] = $this->pagination->create_links();
		$data["categories"] = $this->category_model->get_menu();
 
 
		$this->load->view('admin/category/list', $data);
   }
   
 
   public function detail(){
   		$this->load->model('admin/order_model');
 
 
 
 		$data["order"] = $this->order_model->detail($this->uri->segment(4));
 
		$data["products"] = $this->order_model->products($this->uri->segment(4));
		
   		$this->load->view('admin/category/list', $data);

   }
   
   
   
   
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */