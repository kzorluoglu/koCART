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

	
 
		public function detail(){
  		$this->lang->load('home', $this->session->userdata('lang_file')); // For Footer and Header
		$this->load->model('categories_model');
		$this->load->model('products_model');
		$this->load->library('cart');
 
		//Cart Total Price...
 		$data['cart_total'] = $this->cart->total();
		//Menu...
		$data['categories'] = $this->categories_model->get_cats();
		
		$this->load->view('order/detail', $data);
 
	}
	public function cargo(){
	
  		$this->lang->load('home', $this->session->userdata('lang_file')); // For Footer and Header
  		$this->lang->load('order/cargo', $this->session->userdata('lang_file')); 

		$this->load->model('categories_model');
		$this->load->model('products_model');
		$this->load->library('cart');
		$this->load->model('cargo_model');
 		
		//Cart Total Price...
 		$data['cart_total'] = $this->cart->total();
		//Menu...
		$data['categories'] = $this->categories_model->get_cats();
		// Cargo types
		$data['cargos'] = $this->cargo_model->all_cargo();
		
 
		
		
		if($_POST){
		// Form Value required from view file .. for example ;  ....name="billing_..." required="required" ....
		//Billing and Cargo Detail information saved with Session
			$orderinformation = array(
                   'billing_first_name'  	=> $this->input->get_post('billing_first_name', TRUE),
                   'billing_email'    		=> $this->input->get_post('billing_email', TRUE),
                   'billing_telephone' 		=> $this->input->get_post('billing_telephone', TRUE),
                   'billing_address1' 		=> $this->input->get_post('billing_address1', TRUE),
                   'billing_address2' 		=> $this->input->get_post('billing_address2', TRUE),
                   'billing_city'			=> $this->input->get_post('billing_city', TRUE),
                   'billing_postcode'		=> $this->input->get_post('billing_postcode', TRUE),
                   'billing_country' 		=> $this->input->get_post('billing_country', TRUE),
                   'billing_region' 		=> $this->input->get_post('billing_region', TRUE),
                   'billing_company' 		=> $this->input->get_post('billing_company', TRUE),
                   'billing_companyid' 		=> $this->input->get_post('billing_companyid', TRUE),
                   'cargo_first_name' 		=> $this->input->get_post('cargo_first_name', TRUE),
                   'cargo_email' 			=> $this->input->get_post('cargo_email', TRUE),
                   'cargo_telephone' 		=> $this->input->get_post('cargo_telephone', TRUE),
                   'cargo_address1' 		=> $this->input->get_post('cargo_address1', TRUE),
                   'cargo_address2' 		=> $this->input->get_post('cargo_address2', TRUE),
                   'cargo_city' 			=> $this->input->get_post('cargo_city', TRUE),
                   'cargo_postcode'			=> $this->input->get_post('cargo_postcode', TRUE),
                   'cargo_country' 			=> $this->input->get_post('cargo_country', TRUE),
                   'cargo_region' 			=> $this->input->get_post('cargo_region', TRUE),

               );  
			$this->session->set_userdata($orderinformation);
 
		}
 
 

		$this->load->view('order/cargo', $data);

	}
	public function payment(){
  		$this->lang->load('home', $this->session->userdata('lang_file')); // For Footer and Header
  		$this->lang->load('order/cargo', $this->session->userdata('lang_file')); //For Error Mesage of Cargo Type Select
		
		$this->lang->load('order/payment', $this->session->userdata('lang_file')); //For Error Mesage of Cargo Type Select

		$this->load->model('categories_model');
		$this->load->model('products_model');
		$this->load->library('cart');
 		
		//Cart Total Price...
 		$data['cart_total'] = $this->cart->total();
		//Menu...
		$data['categories'] = $this->categories_model->get_cats();
		//Payment types
		$this->load->model('payment_model');
 		$data['payments'] = $this->payment_model->payments();
		
		
		///////////////////// Control Order Detail /////////////////////
		$this->order_control();
		///////////////////// Control Order Detail /////////////////////

		

		
			if($this->input->get_post('cargo', TRUE) == ""){
					// language/../order/cargo
					$this->session->set_flashdata('error', $this->lang->line('cargo_error')); 
		            redirect('order/cargo');
			}
	
		$this->load->view('order/payment', $data);


	}
	
	
	
	public function complete(){
	
  		$this->lang->load('home', $this->session->userdata('lang_file')); // For Footer and Header
		$this->lang->load('order/payment', $this->session->userdata('lang_file')); //For Error Mesage of Cargo Type Select
		$this->load->model('categories_model');
		$this->load->model('products_model');
		$this->load->library('cart');
 		
		//Cart Total Price...
 		$data['cart_total'] = $this->cart->total();
		//Menu...
		$data['categories'] = $this->categories_model->get_cats();
		//Payment types
		$this->load->model('payment_model');
 		$data['payments'] = $this->payment_model->payments();
	
	
		///////////////////// Control Order Detail /////////////////////
		$this->order_control();
		///////////////////// Control Order Detail /////////////////////
		
		
		
		
			if($this->input->get_post('payment', TRUE) == ""){
					// language/../order/cargo
					$this->session->set_flashdata('error', $this->lang->line('payment_error')); 
		            redirect('order/cargo');
			}
	
	
	
	
		$this->load->view('order/complete', $data);
	
	}
	
	
	public function order_control(){
		if($this->session->userdata('billing_first_name') == "" && $this->session->userdata('billing_email') == ""){
		            redirect('order/detail');
		}
		if($this->session->userdata('billing_telephone') == "" && $this->session->userdata('billing_address1') == ""){
		            redirect('order/detail');
		}
		if($this->session->userdata('billing_city') == "" && $this->session->userdata('billing_postcode') == ""){
		            redirect('order/detail');
		}
		if($this->session->userdata('billing_country') == "" && $this->session->userdata('billing_region') == ""){
		            redirect('order/detail');
		}
		if($this->session->userdata('billing_company') == "" && $this->session->userdata('billing_companyid') == ""){
		            redirect('order/detail');
		}
		if($this->session->userdata('cargo_first_name') == "" && $this->session->userdata('cargo_email') == ""){
		            redirect('order/detail');
		}
		if($this->session->userdata('cargo_telephone') == "" && $this->session->userdata('cargo_address1') == ""){
		            redirect('order/detail');
		}
		if($this->session->userdata('cargo_city') == "" && $this->session->userdata('cargo_postcode') == ""){
		            redirect('order/detail');
		}
		if($this->session->userdata('cargo_country') == "" && $this->session->userdata('cargo_region') == ""){
		            redirect('order/detail');
		}
	
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */