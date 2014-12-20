<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller {

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
 
 
	public function seolink()
	{
 
		
  		$this->lang->load('home', $this->session->userdata('lang_file'));
 
		$currency_info = $this->currency_library->currency('currency');
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
 
 		
		//Cart...
 		$data['cart_total'] = $this->cart->total();
 
		//Menu...
		 $data['categories'] = $this->categories_model->get_cats();
 		$this->load->view('product', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */