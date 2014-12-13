<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

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
        // Call the Model constructor
        parent::__construct();
		// If the session language null value 

		
    }
	public function index()
	{
 
		
  		$this->lang->load('home', $this->session->userdata('lang_file'));
 
		//Products...
		$data['most_sell_products'] = $this->products_model->most_sell_products();
		$data['most_popular_products'] = $this->products_model->most_popular_products();
		$data['slider_products'] = $this->products_model->slider_products();
		
		//Category...
 		
		$data['cart_total'] = $this->cart->total();

		 $data['categories'] = $this->categories_model->get_cats();
 		
		$this->load->view('home', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */