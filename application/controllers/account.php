<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller {

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

	
	public function login()
	{
 
  		$this->lang->load('home', $this->session->userdata('lang_file'));

 		//Menu and Categorys ...
		$this->load->model('categories_model');
  
 		
		$this->load->library('cart');
		//Products...
 
 
		
		//Category...
 		$data['cart_total'] = $this->cart->total();
 
		//Menu...
		 $data['categories'] = $this->categories_model->get_cats();
 		$this->load->view('login', $data);
 


	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */