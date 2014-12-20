<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Basket extends CI_Controller {
 
	
	public function add()
	{
 
			$currency_info = $this->currency_library->currency();
 
			$id = $this->security->xss_clean($this->uri->segment(3));
			$product = $this->products_model->product($id);
 
			$data = array(
               'id'      => $product['0']->id,
               'qty'     => 1,
               'price'   => $this->cart->format_number($product['0']->price * $currency_info[0]->currency),
               'name'    => $product['0']->name,

            );
 
			$this->cart->insert($data);
		    redirect($_SERVER['HTTP_REFERER']);
	}
}
 