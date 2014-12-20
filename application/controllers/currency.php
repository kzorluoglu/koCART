<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Currency extends CI_Controller {
 
	
	public function set()
	{
	
	$currency_info = $this->currency_library->currency();
	$id = $this->security->xss_clean($this->uri->segment(3));
	
	if($id == 1){
			$this->session->set_userdata('currency', '1');
			
		if ($this->cart->contents())
		{
			foreach ($this->cart->contents() as $items)
			{ 
				$rowid = $items['rowid'];
				$id = $items['id'];
				$qty = $items['qty'];

 
				// get new price from database
				$this->db->select('price');
				$this->db->where('id', $id);
				$query = $this->db->get('product')->row();
 
 
				$new_price = $query->price * $currency_info[0]->currency;
				$new_subtotal = $new_price * $qty;
							$data = array(
               array(
				'rowid' => $rowid,
				'price' => $new_price,
				'subtotal' => $new_subtotal
				)
            );
 
			$this->cart->update($data) 
 			}
		}
	
 	}
	
	if($id == 2){
			
		$this->session->set_userdata('currency', '2');
		
		if ($this->cart->contents())
		{
			foreach ($this->cart->contents() as $items)
			{ 
				$rowid = $items['rowid'];
				$id = $items['id'];
				$qty = $items['qty'];

				// get new price from database
				$this->db->select('price');
				$this->db->where('id', $id);
				$query = $this->db->get('product')->row();
 
				$new_price = $query->price * $currency_info[0]->currency;
				$new_subtotal = $new_price * $qty;
				
				$data = array(
				'rowid' => $rowid,
				'price' => $new_price,
				'subtotal' => $new_subtotal
				);
				$this->cart->update($data);
			}
		}
 	}

				redirect($_SERVER['HTTP_REFERER']);

	}
}

 