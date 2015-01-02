<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends CI_Controller {

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
   
   public function detail(){
   		$this->load->model('admin/settings_model');
   		$this->load->model('admin/language_model');
   		$this->load->model('admin/currency_model');

			 if($_POST){
 				$update = $this->settings_model->update(1, $_POST);
				if($update){
						redirect($_SERVER['HTTP_REFERER']);
				}
				else{
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