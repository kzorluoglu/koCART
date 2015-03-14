<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends KoController {

 
 
 
	public function seolink()
	{
 
		
  
		$currency_info = $this->currency_library->currency('currency');
		$data["currency_sembol"] = $currency_info[0]->symbol; // For Right Side -> Option price 
 		//Products...
		$id = $this->security->xss_clean($this->uri->segment(2));
		foreach($this->products_model->product($id) AS $products){
				$product[] = array(
                   'id'  			=> $products->id,
				   'name'			=> $products->name,
				   'details'		=> $products->details,
 				   'product_id'		=> $products->product_id,
				   'rank'			=> $products->rank,
				   'category_id'	=> $products->category_id,
				   'price'			=> ''.$this->cart->format_number($products->price * $currency_info[0]->currency).' '.$currency_info[0]->symbol.'',
				   'stock'			=> $products->stock,
				   'image'			=> $products->image,
				   'url'			=> $products->url,
				   'description_id'	=> $products->description_id,
				   'language_id'	=> $products->language_id,
				   'meta_tags'		=> $products->meta_tags,
				   'meta_keys'		=> $products->meta_keys
               );  
			}
		$data['product'] = $product;	
		
		if($this->products_model->product_options($id)){
			foreach($this->products_model->product_options($id) AS $option){
				$options[] = array(
				   'id'					=> $option->id,
 				   'product_id'			=> $option->product_id,
				   'option_type'		=> $option->option_type,
 				   'option_name'		=> $option->option_name,
				   'values' 			=> $this->products_model->product_options_value($option->opt_id_for_value, $option->product_id)
               );  
			}
					$data['options'] = $options; 
		}

 
 		
		//Cart...
		$data['cart_total'] = ''.$this->cart->format_number($this->cart->total()).' '.$currency_info[0]->symbol.'';
 
		//Menu...
		 $data['categories'] = $this->categories_model->get_cats();
 		$this->load->view('product', $data);
	}
}

 