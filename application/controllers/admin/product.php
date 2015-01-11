<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller {

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
		$this->load->model('admin/product_model');
		$this->load->library("pagination");
 
		$config = array();
        $config["base_url"] = base_url() . "admin/product/lists";
        $config["total_rows"] = $this->product_model->product_count();
        $config["per_page"] = 10;
        $config["uri_segment"] = 4;
 
        $this->pagination->initialize($config);
 
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data["links"] = $this->pagination->create_links();
		$data["products"] = $this->product_model->get_products($config["per_page"], $page);
 
 
		$this->load->view('admin/product/list', $data);
   }
   
 
   public function detail(){
   	$this->load->model('admin/product_model');
	$this->load->model('admin/category_model');
 	$this->load->model('admin/language_model');
	
 	$data["languages"] = $this->language_model->languages();
		$product_infos = $this->product_model->product($this->uri->segment(4));
 
	foreach($product_infos as $product_info){
			$data["id"] = $product_info->id;
			$data["category_id"] = $product_info->category_id;
			$data["category_name"] = $this->category_model->get_category($product_info->category_id);
			$data["url"] = $product_info->url;
			$data["rank"] = $product_info->rank;
			$data["price"] = $product_info->price;
			$data["stock"] = $product_info->stock;
			$data["image"] = $product_info->image;
			$data["product_description"] = $this->product_model->product_description($product_info->id);
		}
			
		foreach($this->product_model->get_options($this->uri->segment(4)) as $options){
 			$option[] = array(
				'id' => $options->id,
				'product_id' =>  $options->product_id,
				'option_type' =>  $options->option_type,
				'rank' =>  $options->rank,
				'language_id' => $options->language_id,
				'option_name' =>  $options->option_name,
				'values' =>  $this->product_model->get_values($options->option_id, $options->product_id) //pr_value_id is product_option_value table -> id
			);
			}
			$data["option"] = $option;
 
 
			$start = 0;
			$limit = 100000000;
 			$data["categories"] = $this->category_model->get_categories($start, $limit);

   		$this->load->view('admin/product/detail', $data);

   }
   public function Add(){
	$this->load->model('admin/category_model');
	$this->load->model('admin/product_model');
	$this->load->model('admin/language_model');

	
	if($_POST){
	//$this->product_model->add($_POST);
	}
	
	
	$data["languages"] = $this->language_model->languages();
			$start = 0;
			$limit = 100000000;
 			$data["categories"] = $this->category_model->get_categories($start, $limit);
			
	$this->load->view('admin/product/add', $data);
		 
   }
   
   public function update(){
   	$this->load->model('admin/product_model');

   
   	if($_POST){
		//$this->product_model->update($this->uri->segment(4), $_POST);
		redirect($_SERVER['HTTP_REFERER']);
	}
	else{
	redirect($_SERVER['HTTP_REFERER']);
	}
   
   }
   
   public function delete(){
	$this->load->model('admin/product_model');
 
			//$this->product_model->delete($this->uri->segment(4));
			redirect($_SERVER['HTTP_REFERER']);
			
			
	 
   }
   
   
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */