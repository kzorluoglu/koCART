<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order extends KoController {
 
	public function detail(){
			
			if($this->cart->total_items() == 0){
				redirect('home');
			}
			// Language File load
			$this->lang->load('order/detail', $this->session->userdata('lang_file')); 
 
 
			//Menu...
			$this->data['categories'] = $this->categories_model->get_cats();
		
			$this->load->view('order/detail', $this->data);
 
	}
	
	public function cargo(){
		 
			$this->lang->load('order/cargo', $this->session->userdata('lang_file')); 

			$this->load->model('cargo_model');
 
			//Menu...
			$this->data['categories'] = $this->categories_model->get_cats();
			// Cargo types
			$this->data['cargos'] = $this->cargo_model->all_cargo();
		
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
			
		$this->load->view('order/cargo', $this->data);

	}
	
	public function payment(){
			//Language File load, For Error Mesage of Cargo Type Select
			$this->lang->load('order/cargo', $this->session->userdata('lang_file')); 
			$this->lang->load('order/payment', $this->session->userdata('lang_file'));  
 
			//Menu...
			$this->data['categories'] = $this->categories_model->get_cats();
			//Payment types
			$this->load->model('payment_model');
			$this->data['payments'] = $this->payment_model->payments();
			
			
			///////////////////// Control Order Detail /////////////////////
			$this->order_control();
			///////////////////// Control Order Detail /////////////////////

			if($this->input->get_post('cargo_type', TRUE) == "" && $this->session->userdata('cargo_type') == ""){
					$this->session->set_flashdata('error', $this->lang->line('cargo_error')); 
		            redirect('order/cargo');
			}
			if($this->input->get_post('cargo_type', TRUE) != ""){
			$this->session->set_userdata('cargo_type', $this->input->get_post('cargo_type', TRUE));
			}
		
			$this->load->view('order/payment', $this->data);

}

	public function complete(){
		
			$this->lang->load('order/payment', $this->session->userdata('lang_file')); //For Error Mesage of Cargo Type Select

			$this->load->model('cargo_model');
 
			//Menu...
			$this->data['categories'] = $this->categories_model->get_cats();
		
			foreach($this->cart->contents() AS $carts){
					$product = $this->products_model->product($carts['id']);	
					$cart[] = array(
					   'rowid'  		=> $carts['rowid'],
					   'name'			=> $carts['name'],
					   'qty'			=> $carts['qty'],
					   'subtotal'		=> ''.$this->cart->format_number($carts['price']),
					   'price'			=> ''.$this->cart->format_number($product['0']->price * $this->data['currency_currency']),
					   'options'		=> $this->products_model->cart_product_options($carts['options']),
					   
				   );  
				}
	 
			$this->data['cart'] = $cart;
			$this->data['currency'] = $this->data['currency_currency'];
			$this->data['symbol'] = $this->data['currency_symbol'];
	
			///////////////////// Control Order Detail /////////////////////
			$this->order_control();
			///////////////////// Control Order Detail /////////////////////
		
			if($this->input->get_post('cargo_type', TRUE) == "" && $this->session->userdata('cargo_type') == ""){
				$this->session->set_flashdata('error', $this->lang->line('cargo_error')); 
				redirect('order/cargo');
			}
			if($this->input->get_post('cargo_type', TRUE) != ""){
				$this->session->set_userdata('cargo_type', $this->input->get_post('cargo_type', TRUE));
			}
			
			if($this->input->get_post('payment_type', TRUE) == "" && $this->session->userdata('payment_type') == ""){
				$this->session->set_flashdata('error', $this->lang->line('payment_error')); 
				redirect('order/payment');
			}
			if($this->input->get_post('payment_type', TRUE) != ""){
				$this->session->set_userdata('payment_type', $this->input->get_post('payment_type', TRUE));
			} 

			$this->data['cargo_detail'] = $this->cargo_model->cargo_detail($this->session->userdata('cargo_type'));
		
			$this->load->view('order/complete', $this->data);
	
}
	
	public function confirm(){
 
			//Menu...
			$this->data['categories'] = $this->categories_model->get_cats();
			
			///////////////////// Control Order Detail /////////////////////
			$this->order_control();
			///////////////////// Control Order Detail /////////////////////
			
			if($this->input->get_post('cargo_type', TRUE) == "" && $this->session->userdata('cargo_type') == ""){
				$this->session->set_flashdata('error', $this->lang->line('cargo_error')); 
				redirect('order/cargo');
			}
			
			if($this->input->get_post('cargo_type', TRUE) != ""){
				$this->session->set_userdata('cargo_type', $this->input->get_post('cargo_type', TRUE));
			}
				
			if($this->input->get_post('payment_type', TRUE) == "" && $this->session->userdata('payment_type') == ""){
				$this->session->set_flashdata('error', $this->lang->line('payment_error')); 
				redirect('order/payment');
			}
			
			if($this->input->get_post('payment_type', TRUE) != ""){
				$this->session->set_userdata('payment_type', $this->input->get_post('payment_type', TRUE));
			} 
			
			$this->load->model('order_model');

			$orderinformation = array(
			   'customer_id'			=> $this->session->userdata('customer_id'),
			   'billing_first_name'  	=> $this->session->userdata('billing_first_name'),
			   'billing_email'    		=> $this->session->userdata('billing_email'),
			   'billing_telephone' 		=> $this->session->userdata('billing_telephone'),
			   'billing_address1' 		=> $this->session->userdata('billing_address1'),
			   'billing_address2' 		=> $this->session->userdata('billing_address2'),
			   'billing_city'			=> $this->session->userdata('billing_city'),
			   'billing_postcode'		=> $this->session->userdata('billing_postcode'),
			   'billing_country' 		=> $this->session->userdata('billing_country'),
			   'billing_region' 		=> $this->session->userdata('billing_region'),
			   'billing_company' 		=> $this->session->userdata('billing_company'),
			   'billing_companyid' 		=> $this->session->userdata('billing_companyid'),
			   'cargo_first_name' 		=> $this->session->userdata('cargo_first_name'),
			   'cargo_email' 			=> $this->session->userdata('cargo_email'),
			   'cargo_telephone' 		=> $this->session->userdata('cargo_telephone'),
			   'cargo_address1' 		=> $this->session->userdata('cargo_address1'),
			   'cargo_address2' 		=> $this->session->userdata('cargo_address2'),
			   'cargo_city' 			=> $this->session->userdata('cargo_city'),
			   'cargo_postcode'			=> $this->session->userdata('cargo_postcode'),
			   'cargo_country' 			=> $this->session->userdata('cargo_country'),
			   'cargo_region' 			=> $this->session->userdata('cargo_region'),
			   'cargo_type'				=> $this->session->userdata('cargo_type'),
			   'payment_type'			=> $this->session->userdata('payment_type'),
			   'status'					=> 1,
			   'comment'				=> '',
			   'total'					=> $this->cart->total(),
			   'ip'						=> $_SERVER['REMOTE_ADDR'],
			   'date'					=> date("Y-m-d H:i:s")
		   ); 
			   
 			$order_id = $this->order_model->add($orderinformation, $this->cart->contents());
			
			$this->data['order_id'] = $order_id;

			if($order_id > 0){
				$this->cart->destroy();
					$array_items = array(
								   'cargo_type'				=> $this->session->userdata('cargo_type'),
								   'payment_type'			=> $this->session->userdata('payment_type'),
					);

			$this->session->unset_userdata($array_items);
			
			}
			
			$this->load->view('order/confirm', $this->data);

}

	public function order_control(){
			if($this->cart->total_items() == 0){
				redirect('home');
			}
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

 