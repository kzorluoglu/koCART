<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends CI_Controller {

 
		function __construct()
		{
			parent::__construct();
			
			if(! $this->session->userdata('validated')){
            redirect('admin/account/login');
        }
		
		}
 
 
	public function index(){
 
	} 
   
   public function detail(){
   		$this->load->model('admin/settings_model');
   		$this->load->model('admin/language_model');
   		$this->load->model('admin/currency_model');

       	if($_POST){
			$update = false;
			//$update = $this->settings_model->update(1, $_POST);
			if($update){
				$this->session->set_flashdata('action_message', 'Settings updated!');
				$this->session->set_flashdata('action_message_type', 'success');
				redirect($_SERVER['HTTP_REFERER']);
			}else{
				$this->session->set_flashdata('action_message', 'Settings not updated!. An error has occured.');
				$this->session->set_flashdata('action_message_type', 'danger');
				redirect($_SERVER['HTTP_REFERER']);
			}
	}
 
 
			 
 	$settings = $this->settings_model->settings_detail(1);
 
	foreach($settings as $setting){
			$data["id"] = $setting->id;
			$data["title"] = $setting->title;
 			$data["description"] = $setting->description;
			$data["meta_tags"] = $setting->meta_tags;
			$data["name"] = $setting->name;
			$data["owner"] = $setting->owner;
			$data["address"] = $setting->address;
			$data["email"] = $setting->email;
			$data["telefon"] = $setting->telefon;
			$data["logo"] = $setting->logo;
			$data["language"] = $setting->language;
			$data["language_name"] = $this->language_model->get_language($setting->language);
			$data["currency"] = $setting->currency;
			$data["currency_name"] = $this->currency_model->get_currencys($setting->currency);
 }
			$data["currencys"] =  $this->currency_model->get_currency();
			$data["languages"] = $this->language_model->languages();
		
   		$this->load->view('admin/settings/detail', $data);
   }
 
   
   
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */