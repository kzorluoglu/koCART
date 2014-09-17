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

	
	public function submit()
	{
	
 		if($this->session->userdata('lang') == ""){
			$this->session->set_userdata('lang', '1');
			$this->session->set_userdata('lang_file', 'turkish');

		}
 		
		$this->load->model('menu');
		$this->load->model('products');
		$this->load->model('categorys');
		
		$this->load->library('cart');
		//Products...
 
 
		
		//Category...
		$data['all_categorys'] = $this->categorys->all_categorys();
		$data['cart_total'] = $this->cart->total();
 
		//Menu...
        $data['menu'] = $this->menu->menu();
		$this->load->view('order/total', $data);
 


	}
		public function detail()
	{
	
 		if($this->session->userdata('lang') == ""){
			$this->session->set_userdata('lang', '1');
			$this->session->set_userdata('lang_file', 'turkish');

		}
 		
		$this->load->model('menu');
		$this->load->model('products');
		$this->load->model('categorys');
		
		$this->load->library('cart');
		//Products...
 
 
		
		//Category...
		$data['all_categorys'] = $this->categorys->all_categorys();
		$data['cart_total'] = $this->cart->total();
 
		//Menu...
        $data['menu'] = $this->menu->menu();
		$this->load->view('order/detail', $data);
 


	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */