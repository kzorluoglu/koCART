<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Paypal extends CI_Controller {

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
		if($this->session->userdata('lang') == ""){
			$this->session->set_userdata('lang', '1');
			$this->session->set_userdata('lang_file', 'turkish');

		}
		
    }
	public function index()
	{

		$this->lang->load('cart', $this->session->userdata('lang_file'));
		$this->load->library('cart');
		$this->load->view('payment/paypal');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */