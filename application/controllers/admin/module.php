<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Module extends CI_Controller {

 
		function __construct()
		{
			parent::__construct();
			
			if(! $this->session->userdata('validated')){
            redirect('admin/account/login');
        }
		
		}
 
 
	public function index(){
 
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
   
    public function add(){
   		$this->load->model('admin/module_model');
		
     	if($_POST){
			
			$add = $this->module_model->add($_POST);
			if($add){
				$this->session->set_flashdata('action_message', 'New Module added!');
				$this->session->set_flashdata('action_message_type', 'success');
				redirect($_SERVER['HTTP_REFERER']);
			}else{
				$this->session->set_flashdata('action_message', 'New Module not added!. An error has occured.');
				$this->session->set_flashdata('action_message_type', 'danger');
				redirect($_SERVER['HTTP_REFERER']);
			}
	}
				
 
   }
   
   public function detail(){
   		$this->load->model('admin/module_model');
		
     	if($_POST){

			$update = $this->module_model->update($_POST);
			if($update){
				$this->session->set_flashdata('action_message', 'Module updated!');
				$this->session->set_flashdata('action_message_type', 'success');
				redirect($_SERVER['HTTP_REFERER']);
			}else{
				$this->session->set_flashdata('action_message', 'Module not updated!. An error has occured.');
				$this->session->set_flashdata('action_message_type', 'danger');
				redirect($_SERVER['HTTP_REFERER']);
			}
	}
 
 
		$data["type"] = $this->uri->segment(4);
 		$data["products"] = $this->module_model->products($this->uri->segment(4));
		
   		$this->load->view('admin/module/detail', $data);
   }
   
   public function delete(){
   		$this->load->model('admin/module_model');
 
			$delete = $this->module_model->delete($this->uri->segment(4));
			if($delete){
				$this->session->set_flashdata('action_message', 'Module deleted!');
				$this->session->set_flashdata('action_message_type', 'success');
				redirect($_SERVER['HTTP_REFERER']);
			}else{
				$this->session->set_flashdata('action_message', 'Module not deleted!. An error has occured.');
				$this->session->set_flashdata('action_message_type', 'danger');
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