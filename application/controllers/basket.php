<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Basket extends KoController {
 
	
	public function add()
	{
 
 
			$currency_info = $this->currency_library->currency();
 
	if($_POST){
 			(int)$id = $this->security->xss_clean($this->input->post('id'));
			(int)$qty = $this->security->xss_clean($this->input->post('qty'));

			$total_option_price = 0;
			
			if($qty == ""){
				$qty = 1;
			}
 
			
 			$product = $this->products_model->product($id);

 			if($this->input->post('option_values')){
				$option = $this->security->xss_clean($this->input->post('option_values'));
				$total_option_price = $this->products_model->option_price_total($option);

 
			}

 
			$product_price = $product['0']->price * $currency_info[0]->currency;
			$total_price = $product_price + $total_option_price;
			$final_price = $total_price * $qty;
			
			$data = array(
               'id'      => $product['0']->id,
               'qty'     => $qty,
               'price'   => $this->cart->format_number($final_price),
               'name'    => $product['0']->name,
               'options' => array(),
            );
			
			if($this->input->post('option_values')){
 

				$data['options'] =  $option;

			}
 			$this->cart->insert($data);
		    redirect($_SERVER['HTTP_REFERER']);
			}
	}
}
 