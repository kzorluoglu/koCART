<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends CI_Controller {

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
 
 
	public function seolink()
	{
 
		
  		$this->lang->load('home', $this->session->userdata('lang_file'));
 		$this->load->model('pages_model');
 
		//Products...
		$data['page_details'] = $this->pages_model->pages_detail($this->uri->segment(2));
		$data['slider_products'] = $this->products_model->slider_products();
		
		$currency_info = $this->currency_library->currency('currency');
		
		//Cart Total...
  		$data['cart_total'] = ''.$this->cart->format_number($this->cart->total()).' '.$currency_info[0]->symbol.'';
 
		//Menu...
		 $data['categories'] = $this->categories_model->get_cats();
 		 
		$this->load->view('page', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */