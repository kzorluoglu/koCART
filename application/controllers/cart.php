<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart extends KoController {

	public function index(){
			if($this->cart->total_items() == 0){
				redirect('home');
			}
		
			$this->lang->load('cart', $this->session->userdata('lang_file'));
			
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
 
			//Products...
			$this->data['slider_products'] = $this->products_model->slider_products();
	 
			//Menu...
			$this->data['categories'] = $this->categories_model->get_cats();
	 
			$this->load->view('cart', $this->data);
			
}

	public function update(){
	
			$qtys = $this->input->post("qty");
			$i = 0;
			$total = count($this->input->post('rowid'));
			
            foreach ($this->input->post('rowid') as $index => $id){
 
			$data = array(
               array(
				   'rowid'   => $id,
				   'qty'     => $qtys[$index],	
				)
            );
			
			$this->cart->update($data);
			$i++;
 
 			if($total == $i){
				redirect($_SERVER['HTTP_REFERER']);
			}
			
 		 }
 
}
		function remove() {

			$data = array(
               array(
                       'rowid'   => $this->uri->segment(3),
                       'qty'     => 0,	
				)
            );
			
			$this->cart->update($data);
			
			redirect($_SERVER['HTTP_REFERER']);
			
}	
}