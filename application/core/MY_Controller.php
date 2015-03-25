<?php 

//Main Controller Extends Thanks for sDenizhan 
class KoController extends CI_Controller 
{ 
		protected $data;

	public function __construct(){ 
		parent::__construct(); 
		

		//Load Language File from SESSION
		$this->setLang(); 
		
		/** Actual currency info from Database
		* from library/currency_library.php
		* Variables: id, name, currency, code, symbol, standart
		* example: $this->data['currency_currency'];
		*/
		$currency_info = $this->currency_library->currency('currency');
		$this->data['currency_currency'] = $currency_info[0]->currency;
		$this->data['currency_symbol'] = $currency_info[0]->symbol;
		
		/** Actual cart total infos from Shopping Cart Class
		* from codeigniter library base
		* Variables: $this->cart->total(), $this->cart->total_items(), 
		* example: $this->cart->total()
		*/
		$this->data['cart_total'] = ''.$this->cart->format_number($this->cart->total()).' '.$this->data['currency_symbol'].'';
} 

	public function setLang(){ 
			$this->lang->load('home', $this->session->userdata('lang_file')); 
} 
 



}