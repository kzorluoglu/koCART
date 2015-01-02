<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Currency extends CI_Controller {
 
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
			$this->currency_model->add($_POST);
		}
 
		$this->load->view('admin/currency/add');
   }
   
   public function update(){
		$this->load->model('admin/currency_model');

   
		if($_POST){
			$this->currency_model->update($this->uri->segment(4), $_POST);
			redirect($_SERVER['HTTP_REFERER']);
		}
		else{
			redirect($_SERVER['HTTP_REFERER']);
		}
   
   }
   
   public function delete(){
	$this->load->model('admin/currency_model');
 
			$this->currency_model->delete($this->uri->segment(4));
			redirect($_SERVER['HTTP_REFERER']);

   }
   
   
}
 