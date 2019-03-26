<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Currency extends CI_Controller {
 
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
		$this->load->model('admin/currency_model');
		$this->load->library("pagination");
 
		$config = array();
        $config["base_url"] = base_url() . "admin/currency/lists";
        $config["total_rows"] = $this->currency_model->currency_count();
        $config["per_page"] = 10;
        $config["uri_segment"] = 4;
 
        $this->pagination->initialize($config);
 
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data["links"] = $this->pagination->create_links();
		$data["currencys"] = $this->currency_model->get_currency($config["per_page"], $page);
 
 
		$this->load->view('admin/currency/list', $data);
   }
   
   public function detail(){

		$this->load->model('admin/currency_model');
		
		$data["currencys"] = $this->currency_model->currency_detail($this->uri->segment(4));
   		$this->load->view('admin/currency/detail', $data);

   }
   public function Add(){
		$this->load->model('admin/currency_model');
  
    	if($_POST){
			$add = false;
			//$add = $this->currency_model->add($_POST);
			if($add){
				$this->session->set_flashdata('action_message', 'New Currency added!');
				$this->session->set_flashdata('action_message_type', 'success');
				redirect($_SERVER['HTTP_REFERER']);
			}else{
				$this->session->set_flashdata('action_message', 'New Currency not added!. An error has occured.');
				$this->session->set_flashdata('action_message_type', 'danger');
				redirect($_SERVER['HTTP_REFERER']);
			}
	}
 
		$this->load->view('admin/currency/add');
   }
   
   public function update(){
		$this->load->model('admin/currency_model');
 
    	if($_POST){
			$update = false;
			//$update = $this->currency_model->update($this->uri->segment(4), $_POST);
			if($update){
				$this->session->set_flashdata('action_message', 'Currency updated!');
				$this->session->set_flashdata('action_message_type', 'success');
				redirect($_SERVER['HTTP_REFERER']);
			}else{
				$this->session->set_flashdata('action_message', 'Currency not updated!. An error has occured.');
				$this->session->set_flashdata('action_message_type', 'danger');
				redirect($_SERVER['HTTP_REFERER']);
			}
	}
 
   
   }
   
   public function delete(){
	$this->load->model('admin/currency_model');
	
 
			$delete = false;
			//$delete = $this->currency_model->delete($this->uri->segment(4));
			if($delete){
				$this->session->set_flashdata('action_message', 'Currency deleted!');
				$this->session->set_flashdata('action_message_type', 'success');
				redirect($_SERVER['HTTP_REFERER']);
			}else{
				$this->session->set_flashdata('action_message', 'Currency not deleted!. An error has occured.');
				$this->session->set_flashdata('action_message_type', 'danger');
				redirect($_SERVER['HTTP_REFERER']);
			}
 
 
 

   }
   
   
}
 