<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Basket extends CI_Controller {

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
 
	
	public function add()
	{
			$this->load->library('cart');
			$this->load->model('products');
			
			$product = $this->products->product($this->uri->segment(3));
 
 
			$data = array(
               'id'      => $product['0']->id,
               'qty'     => 1,
               'price'   => $product['0']->price,
               'name'    => $product['0']->name,
               'options' => array('Size' => 'L', 'Color' => 'Red')
            );

  
 
			
			$this->cart->insert($data);
		    redirect($_SERVER['HTTP_REFERER']);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */