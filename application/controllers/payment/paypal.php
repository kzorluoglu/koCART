<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Paypal extends CI_Controller {

 
	 	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	public function index()
	{

		$this->lang->load('cart', $this->session->userdata('lang_file'));
		$this->load->view('payment/paypal');
	}
	public function complete(){
	
		$paypal_credentials = array(
		   'API_username' => 'korayzorluoglu1-facilitator_api1.hotmail.com',
		   'API_signature' => 'AFcWxV21C7fd0v3bYYYRCpSSRl31AMo4Sr5CuFAYAsMOj.Mc4vQaYcSn',
		   'API_password' => '1394582264',
		   'sandbox_status' => true
		);    

		$this->load->library('paypal_ec', $paypal_credentials);


		$currency = 'USD'; // currency for the transaction
		$ec_action = 'Sale'; // for PAYMENTREQUEST_0_PAYMENTACTION, it's either Sale, Order or Authorization
		$to_buy = array(
			'desc' => 'Purchase from ACME Store', 
			'currency' => $currency, 
			'type' => $ec_action, 
			'return_URL' => site_url('order/confirm'), 
			// see below have a function for this -- function back()
			// whatever you use, make sure the URL is live and can process
			// the next steps
			'cancel_URL' => site_url('order/error'), // this goes to this controllers index()
			'shipping_amount' => 5.00, 
			'get_shipping' => true);
		// I am just iterating through $this->product from defined
		// above. In a live case, you could be iterating through
		// the content of your shopping cart.
		foreach($this->cart->contents() as $p) {
			$temp_product = array(
				'name' => $p['name'], 
				'desc' => $p['desc'], 
				'number' => $p['code'], 
				'quantity' => $p['qty'], // simple example -- fixed to 1
				'amount' => $p['price']);
				
			// add product to main $to_buy array
			$to_buy['products'][] = $temp_product;
		}
		// enquire Paypal API for token
		$set_ec_return = $this->paypal_ec->set_ec($to_buy);
		if (isset($set_ec_return['ec_status']) && ($set_ec_return['ec_status'] === true)) {
		$this->session->set_userdata('payment_type', 1);
		$this->paypal_ec->redirect_to_paypal( $set_ec_return['TOKEN'], true);
		////////////////////////////////////	$this->paypal_ec->redirect_to_paypal($set_ec_return['TOKEN']);
			// You could detect your visitor's browser and redirect to Paypal's mobile checkout
			// if they are on a mobile device. Just add a true as the last parameter. It defaults
			// to false
			// $this->paypal_ec->redirect_to_paypal( $set_ec_return['TOKEN'], true);
		} else {
			$this->_error($set_ec_return);
		}
	}
 
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */