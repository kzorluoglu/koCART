<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_option extends CI_Controller {


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
		$this->load->model('admin/product_option_model');
		$data["product_id"] = $this->uri->segment(4);
		$data["options"] = $this->product_option_model->get_options($this->uri->segment(4));
 		$this->load->view('admin/product_option/list', $data);
   }
   
 
   public function detail(){
 	$this->load->model('admin/product_option_model');
	
	$data["option_id"] 	= $this->uri->segment(4);
	$data["product_id"] = $this->uri->segment(5);
	$data["value_list"] = $this->product_option_model->get_values_list($this->uri->segment(4));
																
	$data["values"] =  $this->product_option_model->get_values($this->uri->segment(4), $this->uri->segment(5));				// option_id			// product_id
 
 	$this->load->view('admin/product_option/detail', $data);

   }

	public function add(){
		$this->load->model('admin/product_option_model');
		$data["product_id"] = $this->uri->segment(4);
		$data["options"] = $this->product_option_model->get_option_type_list();
		
		if($_POST){
			$add_new_option = false;
			//$add_new_option = $this->product_option_model->add_new_option($_POST);
			if($add_new_option){
				$this->session->set_flashdata('action_message', 'New Product Option added!');
				$this->session->set_flashdata('action_message_type', 'success');
				redirect($_SERVER['HTTP_REFERER']);
			}else{
				$this->session->set_flashdata('action_message', 'New Product Option not added!. An error has occured.');
				$this->session->set_flashdata('action_message_type', 'danger');
				redirect($_SERVER['HTTP_REFERER']);
			}
		}
 
		$this->load->view('admin/product_option/add', $data);
   }
  public function delete(){
		$this->load->model('admin/product_option_model');
 
			$delete = false;
			//$delete = $this->product_option_model->delete($this->uri->segment(4));
			if($delete){
				$this->session->set_flashdata('action_message', 'Product Option deleted!');
				$this->session->set_flashdata('action_message_type', 'success');
				redirect($_SERVER['HTTP_REFERER']);
			}else{
				$this->session->set_flashdata('action_message', 'Product Option not deleted!. An error has occured.');
				$this->session->set_flashdata('action_message_type', 'danger');
				redirect($_SERVER['HTTP_REFERER']);
			} 
   }
   
   
   public function value_update(){
 	$this->load->model('admin/product_option_model');
 
 		if($_POST){
			$update_value = false;
			//$update_value = $this->product_option_model->value_update($_POST);
			if($update_value){
				$this->session->set_flashdata('action_message', 'Product Option value updated!');
				$this->session->set_flashdata('action_message_type', 'success');
				redirect($_SERVER['HTTP_REFERER']);
			}else{
				$this->session->set_flashdata('action_message', 'Product Option value not updated!. An error has occured.');
				$this->session->set_flashdata('action_message_type', 'danger');
				redirect($_SERVER['HTTP_REFERER']);
			}
		}

   }
   
 
   public function add_value(){
    	$this->load->model('admin/product_option_model');

		if($_POST){
			$add_new_value = false;
			//$add_new_value = $this->product_option_model->add_new_value($_POST);
			if($add_new_value){
				$this->session->set_flashdata('action_message', 'Product Option new value added!');
				$this->session->set_flashdata('action_message_type', 'success');
				redirect($_SERVER['HTTP_REFERER']);
			}else{
				$this->session->set_flashdata('action_message', 'Product Option new value not added!. An error has occured.');
				$this->session->set_flashdata('action_message_type', 'danger');
				redirect($_SERVER['HTTP_REFERER']);
			}
		}
		
 
   }
   public function delete_value(){
 	$this->load->model('admin/product_option_model');

			$delete_value = false;
			//$delete_value = $this->product_option_model->delete_value($this->uri->segment(4));
			if($delete_value){
				$this->session->set_flashdata('action_message', 'Product Option value deleted!');
				$this->session->set_flashdata('action_message_type', 'success');
				redirect($_SERVER['HTTP_REFERER']);
			}else{
				$this->session->set_flashdata('action_message', 'Product Option value not deleted!. An error has occured.');
				$this->session->set_flashdata('action_message_type', 'danger');
				redirect($_SERVER['HTTP_REFERER']);
			} 
   }
   
 	public function get_options(){
		$this->load->model('admin/product_option_model');
 
		$options_result = $this->product_option_model->get_option_result($this->input->post('option_type', TRUE));
		foreach($options_result AS $opt_result){
		echo '<option value="'.$opt_result->opt_value_id.'">'.$opt_result->option_name.'</option>';
		
		}
   }
  
}
