<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Currency_model extends CI_Model {

public function currency_count() {
        return $this->db->count_all("currency");
    }
 
function get_currency(){
        $query = $this->db->query('SELECT * FROM currency ORDER BY id');
        return $query->result();
}

 public function Add($data){
 		$this->db->query("INSERT INTO currency SET name = '" . $data['name'] . "', currency = '" . $data['currency'] . "', code = '" . $data['code'] . "', symbol = '" . $data['symbol'] . "', standart = '" . $data['standart'] . "'");
 }
  
 public function currency_detail($id){
			$this->db->where('id', $id);
 	        $query = $this->db->get("currency");
			return $query->result();
	}
	
 public function update($currency_id, $data){ 
		
		$this->db->query("UPDATE currency SET name = '" . $data['name'] . "', currency = '" . $data['currency'] . "', code = '" . $data['code'] . "', symbol = '" . $data['symbol'] . "', standart = '" . $data['standart'] . "' WHERE id = '" . (int)$currency_id . "'");
		 
	}
	
 public function delete($data){
		$this->db->query("DELETE FROM currency WHERE id = '" . (int)$data . "'");
  }
  
	
 
}


    

 
 