<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Option extends CI_Controller {


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
		$this->load->model('admin/option_model');
		$this->load->model('admin/language_model');
	
		$data["languages"] = $this->language_model->languages();
		$data["options"] = $this->option_model->get_options();
		print_r($this->option_model->get_options());
		$this->load->view('admin/option/list', $data);
   }
   
 
   public function detail(){
 	$this->load->model('admin/option_model');
	$this->load->model('admin/language_model');
	
	$data["languages"] = $this->language_model->languages();
	$data["option_id"] 	= $this->uri->segment(4);
	$data["language_id"] 	= $this->uri->segment(5);
 	$data["values"] =  $this->option_model->get_values($this->uri->segment(4), $this->uri->segment(5));
   	
 	$this->load->view('admin/option/detail', $data);

   }

	public function add(){
		$this->load->model('admin/language_model');
		$this->load->model('admin/option_model');
		
		$data["languages"] = $this->language_model->languages();
		$data["option_id"] 	= $this->uri->segment(4);
 		$data["options"] = $this->option_model->get_option_list();
		
 		if($_POST){
		$this->option_model->add_new_option($_POST);
		redirect('admin/option/lists');
		}
		
		
		$this->load->view('admin/option/add', $data);
   }
   
	public function add_new_value(){
		$this->load->model('admin/language_model');
		$this->load->model('admin/option_model');
		
		$data["languages"] = $this->language_model->languages();
		$data["option_id"] 	= $this->uri->segment(4);
		
 		if($_POST){
		$this->option_model->add_new_value($_POST);
		redirect($_SERVER['HTTP_REFERER']);
		}
		
		
		$this->load->view('admin/option/add_new_value', $data);
   }
   
   
  public function delete(){
		$this->load->model('admin/option_model');

		$this->option_model->delete_option($this->uri->segment(4));
		redirect('admin/option/lists');
   }
   
   
   public function value_update(){
 	$this->load->model('admin/option_model');
 
		if($_POST){
 			$this->option_model->value_update($_POST);
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
   
 	public function get_options(){
		$this->load->model('admin/product_option_model');
 
		$options_result = $this->product_option_model->get_option_result($this->input->post('option_type', TRUE));
		foreach($options_result AS $opt_result){
		echo '<option value="'.$opt_result->opt_value_id.'">'.$opt_result->option_name.'</option>';
		
		}
   }
  
}
