<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends KoController {
 
	public function seolink(){
		
			$this->load->model('pages_model');
	 
			//Products...
			$this->data['page_details'] = $this->pages_model->pages_detail($this->uri->segment(2));
			$this->data['slider_products'] = $this->products_model->slider_products();
 
			//Menu...
			$this->data['categories'] = $this->categories_model->get_cats();
			 
			$this->load->view('page', $this->data);
}
}
 