<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Banktransfer extends CI_Controller {

 
	 	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
 
 
		
    }
	public function index()
	{
 
		$this->load->view('payment/banktransfer');
	}
 
}

 