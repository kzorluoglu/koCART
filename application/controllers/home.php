<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

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
	 	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		// If the session language null value 

		
    }
	public function index()
	{
  
  		$this->lang->load('home', $this->session->userdata('lang_file'));
		
		
		$currency_info = $this->currency_library->currency('currency');
 		//Products...
		foreach($this->products_model->most_sell_products() AS $most_sell){
				$most_sell_products[] = array(
                   'id'  			=> $most_sell->id,
				   'name'			=> $most_sell->name,
				   'details'		=> $most_sell->details,
				   'type'			=> $most_sell->type,
				   'product_id'		=> $most_sell->product_id,
				   'rank'			=> $most_sell->rank,
				   'category_id'	=> $most_sell->category_id,
				   'price'			=> ''.$this->cart->format_number($most_sell->price * $currency_info[0]->currency).' '.$currency_info[0]->symbol.'',
				   'stock'			=> $most_sell->stock,
				   'image'			=> $most_sell->image,
				   'url'			=> $most_sell->url,
				   'description_id'	=> $most_sell->description_id,
				   'language_id'	=> $most_sell->language_id,
				   'meta_tags'		=> $most_sell->meta_tags,
				   'meta_keys'		=> $most_sell->meta_keys
               );  
			}
		$data['most_sell_products'] = $most_sell_products;	

			foreach($this->products_model->most_popular_products() AS $most_popular_products){
				$most_popular[] = array(
                   'id'  			=> $most_popular_products->id,
				   'name'			=> $most_popular_products->name,
				   'details'		=> $most_popular_products->details,
				   'type'			=> $most_popular_products->type,
				   'product_id'		=> $most_popular_products->product_id,
				   'rank'			=> $most_popular_products->rank,
				   'category_id'	=> $most_popular_products->category_id,
				   'price'			=> ''.$this->cart->format_number($most_sell->price * $currency_info[0]->currency).' '.$currency_info[0]->symbol.'',
				   'stock'			=> $most_popular_products->stock,
				   'image'			=> $most_popular_products->image,
				   'url'			=> $most_popular_products->url,
				   'description_id'	=> $most_popular_products->description_id,
				   'language_id'	=> $most_popular_products->language_id,
				   'meta_tags'		=> $most_popular_products->meta_tags,
				   'meta_keys'		=> $most_popular_products->meta_keys
               );  
			}
					$data['most_popular_products'] = $most_popular;
 
			foreach($this->products_model->slider_products() AS $slider_products){
				$slider_product[] = array(
                   'id'  			=> $slider_products->id,
				   'name'			=> $slider_products->name,
				   'details'		=> $slider_products->details,
				   'type'			=> $slider_products->type,
				   'product_id'		=> $slider_products->product_id,
				   'rank'			=> $slider_products->rank,
				   'category_id'	=> $slider_products->category_id,
				   'price'			=> ''.$this->cart->format_number($most_sell->price * $currency_info[0]->currency).' '.$currency_info[0]->symbol.'',
				   'stock'			=> $slider_products->stock,
				   'image'			=> $slider_products->image,
				   'url'			=> $slider_products->url,
				   'description_id'	=> $slider_products->description_id,
				   'language_id'	=> $slider_products->language_id,
				   'meta_tags'		=> $slider_products->meta_tags,
				   'meta_keys'		=> $slider_products->meta_keys
               );  
			}
			
		$data['slider_products'] = $slider_product;
		
		//Category...
 
 
		$data['cart_total'] = ''.$this->cart->format_number($this->cart->total() * $currency_info[0]->currency).' '.$currency_info[0]->symbol.'';

		 $data['categories'] = $this->categories_model->get_cats();
 		$this->load->view('home', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */