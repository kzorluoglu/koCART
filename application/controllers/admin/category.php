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
		$data["categories"] = $this->category_model->get_categories($page, $config["per_page"]);
 
 
		$this->load->view('admin/category/list', $data);
   }
   
 
   public function detail(){
   	$this->load->model('admin/category_model');
 	$this->load->model('admin/language_model');
	
 	$data["languages"] = $this->language_model->languages();
 	$category_infos = $this->category_model->category($this->uri->segment(4));
 
	foreach($category_infos as $category_info){
			$data["id"] = $category_info->id;
			$data["parent_id"] = $category_info->parent_id;
			$data["parent_name"] = $this->category_model->get_category($category_info->id);
			$data["link"] = $category_info->link;
			$data["rank"] = $category_info->rank;
			$data["category_description"] = $this->category_model->category_description($category_info->id);
}
			$start = 0;
			$limit = 100000000;
 			$data["categories"] = $this->category_model->get_categories($start, $limit);

   		$this->load->view('admin/category/detail', $data);

   }
   public function Add(){
	$this->load->model('admin/category_model');
	$this->load->model('admin/language_model');

	
	if($_POST){
	//$this->category_model->add($_POST);
	}
	
	
	$data["languages"] = $this->language_model->languages();
			$start = 0;
			$limit = 100000000;
 			$data["categories"] = $this->category_model->get_categories($start, $limit);
			
	$this->load->view('admin/category/add', $data);
		 
   }
   
   public function update(){
   	$this->load->model('admin/category_model');

   
   	if($_POST){
		//$this->category_model->update($this->uri->segment(4), $_POST);
		redirect($_SERVER['HTTP_REFERER']);
	}
	else{
	redirect($_SERVER['HTTP_REFERER']);
	}
   
   }
   
   public function delete(){
	$this->load->model('admin/category_model');
 
			//$this->category_model->delete($this->uri->segment(4));
			redirect($_SERVER['HTTP_REFERER']);
			
			
	 
   }
   
   
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */