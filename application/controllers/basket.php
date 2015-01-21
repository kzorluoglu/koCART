<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Basket extends CI_Controller {
 
	
	public function add()
	{
 
 
			$currency_info = $this->currency_library->currency();
 
	if($_POST){
 			$id = $this->security->xss_clean($this->input->post('id'));
			$product = $this->products_model->product($id);
 
			$data = array(
               'id'      => $product['0']->id,
               'qty'     => 1,
               'price'   => $this->cart->format_number($product['0']->price * $currency_info[0]->currency),
               'name'    => $product['0']->name,
               'options' => $id = $this->security->xss_clean($this->input->post('option_values'))

            );
 
			$this->cart->insert($data);
			print_r($data);
		    //redirect($_SERVER['HTTP_REFERER']);
			}
	}
}
 