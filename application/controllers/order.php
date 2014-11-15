<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order extends CI_Controller {

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

	
 
		public function detail()
	{
 
 
		$this->load->model('categories_model');
		$this->load->model('menu_model');
		
		$this->load->model('products');
		$this->load->model('categorys');
		$this->load->model('payment');

		$this->load->library('cart');
		//Products...
 
 		$data['payments'] = $this->payment->payments();

		
		//Category...
		$data['all_categorys'] = $this->categorys->all_categorys();
		$data['cart_total'] = $this->cart->total();
 
		//Menu...
		 $data['categories'] = $this->categories_model->get_cats();
		 $data['menu'] = $this->menu_model->get_menus();
		 
		$this->load->view('order/detail', $data);
 


	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */