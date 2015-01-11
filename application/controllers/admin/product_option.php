<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_option extends CI_Controller {


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
		$this->load->model('admin/product_option_model');
		$data["options"] = $this->product_option_model->get_options($this->uri->segment(4));
		$this->load->view('admin/product_option/list', $data);
   }
   
 
   public function detail(){
 	$this->load->model('admin/product_option_model');
	
	$data["option_id"] 	= $this->uri->segment(4);
	$data["product_id"] = $this->uri->segment(5);
	$data["value_list"] = $this->product_option_model->get_values_list($this->uri->segment(4), $this->uri->segment(5));
																// option_id			// product_id
	$data["values"] =  $this->product_option_model->get_values($this->uri->segment(4), $this->uri->segment(5));
   	
 	$this->load->view('admin/product_option/detail', $data);

   }

   
   public function value_update(){
 	$this->load->model('admin/product_option_model');
 
		if($_POST){
			$this->product_option_model->value_update($_POST);
			redirect($_SERVER['HTTP_REFERER']);
		}
   
   }
   
 
   public function add_value(){
    	$this->load->model('admin/product_option_model');

 		if($_POST){
		$this->product_option_model->add_new_value($_POST);
		redirect($_SERVER['HTTP_REFERER']);
		}
 		 
   }
   public function delete_value(){
 	$this->load->model('admin/product_option_model');

		$this->product_option_model->delete_value($this->uri->segment(4));
		redirect($_SERVER['HTTP_REFERER']);
   }
   
 
  
}
