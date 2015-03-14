<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller {

 
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
			$add = false;
			//$add = $this->product_model->add($_POST);
			if($add){
				$this->session->set_flashdata('action_message', 'New product added!');
				$this->session->set_flashdata('action_message_type', 'success');
				redirect($_SERVER['HTTP_REFERER']);
			}else{
				$this->session->set_flashdata('action_message', 'New product not added!. An error has occured.');
				$this->session->set_flashdata('action_message_type', 'danger');
				redirect($_SERVER['HTTP_REFERER']);
			}
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
			$update = false;
			//$update = $this->product_model->update($this->uri->segment(4), $_POST);
			if($update){
				$this->session->set_flashdata('action_message', 'Product updated!');
				$this->session->set_flashdata('action_message_type', 'success');
				redirect($_SERVER['HTTP_REFERER']);
			}else{
				$this->session->set_flashdata('action_message', 'Product not updated!. An error has occured.');
				$this->session->set_flashdata('action_message_type', 'danger');
				redirect($_SERVER['HTTP_REFERER']);
			}
	}
		
	 
   
   }
   
   public function delete(){
	$this->load->model('admin/product_model');
 
 
 
			$delete = false;
			//$delete = $this->product_model->delete($this->uri->segment(4));
			if($delete){
				$this->session->set_flashdata('action_message', 'Product deleted!');
				$this->session->set_flashdata('action_message_type', 'success');
				redirect($_SERVER['HTTP_REFERER']);
			}else{
				$this->session->set_flashdata('action_message', 'Product not deleted!. An error has occured.');
				$this->session->set_flashdata('action_message_type', 'danger');
				redirect($_SERVER['HTTP_REFERER']);
			}
 
   }
   
   
}
 