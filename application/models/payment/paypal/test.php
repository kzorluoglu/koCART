<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
Sample controller for Paypal_ec.php Library

18 November 2012

PayPal Express Checkout Library for CodeIgniter
based on paypalfunctions.php by Paypal Integration Wizard
---------------------------------------------
by Khairil Iszuddin Ismail
https://github.com/kidino/paypal_ec

Paypal_ec Sample Controller -- How To Use Guide
-----------------------------------------------

This is sample controller for Paypal_ec Library, a Paypal Express Checkout library
for CodeIgniter. For now it only handles normal Sale transaction -- no recurring, no
Order and Authorization. I am not familiar and have no experience with those yet.

Again, this is just a sample controller. Use this to learn how to implement Paypal
Express Checkout with your own Controller.

Basically the main functions are

- buy()    -- which calls the SetExpressCheckout, get the token and redirect to Paypal.
You can also detect visitor's browser and redirect to Paypal's Mobile Checkout
if they are on mobile devices. More info below

- return() -- this the location where Paypal will send back your customers. Arriving back
here, we should call GetExpressCheckoutDetails to get the details of the
transaction. And then call DoExpressCheckoutPayment to complete the transaction.

What more to do
---------------

You should build your system to store products and transactions details. At any point between,
before 	and/or after the API calls, you might want to log the data, or store them into the database.
This is different from system to system as each may have different requirements. So I believe you
are wise to think on your on for that part.

*/
class Test extends CI_Controller {
	// This is just sample products -- you can name your
	// products anything and use any variables you like.
	// But you should be storing and calling product info
	// from your database though, and not like this.
	private $product = array(
		'soap' => array('name' => 'Brand X Soap', 'desc' => 'a bar of soap for showering', 'price' => '2.95', 'code' => 'sp001'), 
		'lotion' => array('name' => 'Skin Lotion', 'desc' => '100ml - Dry skins no more', 'price' => '4.50', 'code' => 'lt004'));
	private $currency = 'USD'; // currency for the transaction
	private $ec_action = 'Sale'; // for PAYMENTREQUEST_0_PAYMENTACTION, it's either Sale, Order or Authorization
	
	function __construct() {
		parent::__construct();
		$paypal_details = array(
			// you can get this from your Paypal account, or from your
			// test accounts in Sandbox
			'API_username' => 'paypal_api1.somedomain.com', 
			'API_signature' => 'ABCDEFGHIJKLMNOPQRSTUVWXYZabc.0123456789abcdefgihjklmn-e', 
			'API_password' => 'ABCDEFGHIJ123456',
			// Paypal_ec defaults sandbox status to true
			// Change to false if you want to go live and
			// update the API credentials above
			// 'sandbox_status' => false,
		);
		$this->load->library('paypal_ec', $paypal_details);
	}
	
	/* -------------------------------------------------------------------------------------------------
	* a sample order page, which just iterate $this->product and display them
	* --------------------------------------------------------------------------------------------------
	*/
	function index() {
		echo "<p>You are about to buy</p>";
		echo "<ul>";
		foreach($this->product as $p) {
			echo "<li>{$p['name']} - \${$p['price']}</li>";
		}
		echo "</ul>";
		echo "<h1><a href='" . site_url('test/buy') . "'>BUY NOW</a></h1>";
	}
	
	/* -------------------------------------------------------------------------------------------------
	* a sample buy function in your Controller that does the SetExpressCheckout and redirects to Paypal
	* --------------------------------------------------------------------------------------------------
	*/
	function buy() {
		$to_buy = array(
			'desc' => 'Purchase from ACME Store', 
			'currency' => $this->currency, 
			'type' => $this->ec_action, 
			'return_URL' => site_url('test/back'), 
			// see below have a function for this -- function back()
			// whatever you use, make sure the URL is live and can process
			// the next steps
			'cancel_URL' => site_url('test'), // this goes to this controllers index()
			'shipping_amount' => 5.00, 
			'get_shipping' => true);
		// I am just iterating through $this->product from defined
		// above. In a live case, you could be iterating through
		// the content of your shopping cart.
		foreach($this->product as $p) {
			$temp_product = array(
				'name' => $p['name'], 
				'desc' => $p['desc'], 
				'number' => $p['code'], 
				'quantity' => 1, // simple example -- fixed to 1
				'amount' => $p['price']);
				
			// add product to main $to_buy array
			$to_buy['products'][] = $temp_product;
		}
		// enquire Paypal API for token
		$set_ec_return = $this->paypal_ec->set_ec($to_buy);
		if (isset($set_ec_return['ec_status']) && ($set_ec_return['ec_status'] === true)) {
			// redirect to Paypal
			$this->paypal_ec->redirect_to_paypal($set_ec_return['TOKEN']);
			// You could detect your visitor's browser and redirect to Paypal's mobile checkout
			// if they are on a mobile device. Just add a true as the last parameter. It defaults
			// to false
			// $this->paypal_ec->redirect_to_paypal( $set_ec_return['TOKEN'], true);
		} else {
			$this->_error($set_ec_return);
		}
	}
	
	/* -------------------------------------------------------------------------------------------------
	* a sample back function that handles
	* --------------------------------------------------------------------------------------------------
	*/
	function back() {
		// we are back from Paypal. We need to do GetExpressCheckoutDetails
		// and DoExpressCheckoutPayment to complete.
		$token = $_GET['token'];
		$payer_id = $_GET['PayerID'];
		// GetExpressCheckoutDetails
		$get_ec_return = $this->paypal_ec->get_ec($token);
		if (isset($get_ec_return['ec_status']) && ($get_ec_return['ec_status'] === true)) {
			// at this point, you have all of the data for the transaction.
			// you may want to save the data for future action. what's left to
			// do is to collect the money -- you do that by call DoExpressCheckoutPayment
			// via $this->paypal_ec->do_ec();
			//
			// I suggest to save all of the details of the transaction. You get all that
			// in $get_ec_return array
			$ec_details = array(
				'token' => $token, 
				'payer_id' => $payer_id, 
				'currency' => $this->currency, 
				'amount' => $get_ec_return['PAYMENTREQUEST_0_AMT'], 
				'IPN_URL' => site_url('test/ipn'), 
				// in case you want to log the IPN, and you
				// may have to in case of Pending transaction
				'type' => $this->ec_action);
				
			// DoExpressCheckoutPayment
			$do_ec_return = $this->paypal_ec->do_ec($ec_details);
			if (isset($do_ec_return['ec_status']) && ($do_ec_return['ec_status'] === true)) {
				// at this point, you have collected payment from your customer
				// you may want to process the order now.
				echo "<h1>Thank you. We will process your order now.</h1>";
				echo "<pre>";
				echo "\nGetExpressCheckoutDetails Data\n" . print_r($get_ec_return, true);
				echo "\n\nDoExpressCheckoutPayment Data\n" . print_r($do_ec_return, true);
				echo "</pre>";
			} else {
				$this->_error($do_ec_return);
			}
		} else {
			$this->_error($get_ec_return);
		}
	}
	
	/* -------------------------------------------------------------------------------------------------
	* The location for your IPN_URL that you set for $this->paypal_ec->do_ec(). obviously more needs to
	* be done here. this is just a simple logging example. The /ipnlog folder should the same level as
	* your CodeIgniter's index.php
	* --------------------------------------------------------------------------------------------------
	*/
	function ipn() {
		$logfile = 'ipnlog/' . uniqid() . '.html';
		$logdata = "<pre>\r\n" . print_r($_POST, true) . '</pre>';
		file_put_contents($logfile, $logdata);
	}
	
	/* -------------------------------------------------------------------------------------------------
	* a simple message to display errors. this should only be used during development
	* --------------------------------------------------------------------------------------------------
	*/
	function _error($ecd) {
		echo "<br>error at Express Checkout<br>";
		echo "<pre>" . print_r($ecd, true) . "</pre>";
		echo "<br>CURL error message<br>";
		echo 'Message:' . $this->session->userdata('curl_error_msg') . '<br>';
		echo 'Number:' . $this->session->userdata('curl_error_no') . '<br>';
	}
}
/* Sample controller for Paypal_ec.php Library */
/* End of file test.php */
/* Location: ./application/controllers/test.php */
