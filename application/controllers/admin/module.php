<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Module extends CI_Controller {

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
		$this->load->model('admin/module_model');
		$this->load->library("pagination");
 
		$config = array();
        $config["base_url"] = base_url() . "admin/module/lists";
        $config["total_rows"] = $this->module_model->module_count();
        $config["per_page"] = 10;
        $config["uri_segment"] = 4;
 
        $this->pagination->initialize($config);
 
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data["results"] = $this->module_model->get_modules($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();

		$this->load->view('admin/module/list', $data);
   }
   
   
   public function detail(){
   		$this->load->model('admin/module_model');
			 if($_POST){
 				$update = $this->module_model->update($_POST);
				if($update){
						redirect($_SERVER['HTTP_REFERER']);
				}
			 }
		$data["type"] = $this->uri->segment(4);
 		$data["products"] = $this->module_model->products($this->uri->segment(4));
		
   		$this->load->view('admin/module/detail', $data);
   }
   public function delete(){
   		$this->load->model('admin/module_model');
		$this->module_model->delete($this->uri->segment(4));
		redirect($_SERVER['HTTP_REFERER']);

   }
   public function add(){
   		$this->load->model('admin/module_model');
			 if($_POST){
				$this->module_model->add($_POST);
				redirect($_SERVER['HTTP_REFERER']);
			 }
   }
   
   function get_product_name(){
   	$this->load->model('admin/module_model');	
    if(isset($_GET['term'])){
		$q = strtolower($_GET['term']);
		$this->module_model->get_products($q);
    }
  }
   
   
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */