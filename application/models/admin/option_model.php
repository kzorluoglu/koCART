<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Option_model extends CI_Model { 

  
 
function get_options(){
				$this->db->select('option.*, option_description.*');
 				$this->db->where('option_description.language_id', $this->session->userdata('lang'));
 				$this->db->join('option_description', 'option_description.option_id = option.id');
				$this->db->order_by('option.rank', 'ASC');
				$query = $this->db->get("option");
				return $query->result();
 
}
function get_option_result($option_type){
				$this->db->select('option.*, option_description.*, option.id AS opt_value_id');
 				$this->db->where('option.option_type', $option_type);
 				$this->db->where('option_description.language_id', $this->session->userdata('lang'));
				$this->db->join('option_description', 'option.id = option_description.option_id');
 				$query = $this->db->get("option");
				return $query->result();
 
} 
 
 
function get_option_list(){
 				$query = $this->db->get("option");
				return $query->result();
 
} 
 public function add_new_option($data){
 
		foreach ($data['option'] as $language_id => $value) {
			$this->db->query("INSERT INTO option_description SET option_id = '" . (int)$data['option_id'] . "', language_id = '" . (int)$language_id . "', option_name = '" . $value['option_name'] . "'");
		}
 }
 
 public function add_new_value($data){
 
		$last_id  = $this->db->select('option_value_row_id')->order_by('option_value_row_id','desc')->limit(1)->get('option_value')->row('option_value_row_id');
		$last_id = $last_id + 1;
	
		foreach ($data['value'] as $language_id => $value) {
			$main_update = $this->db->query("INSERT INTO option_value SET option_value_id = '".(int)$last_id."', option_id = '" . (int)$value['option_id'] . "', language_id = '" . (int)$language_id . "', value_name = '" . $value['value_name'] . "'");
		 		
			if($main_update){
					return true;
			}
	
		}
  }
 
	
 public function value_update($data){
   
	for ($i = 0; $i < count($data['option_value_row_id']); $i++) {
			$main_update = $this->db->query("UPDATE option_value SET value_name = '".$data['value_name'][$i]."' WHERE option_value_row_id = '".$data['option_value_row_id'][$i]."'");
		 		
			if($main_update){
					return true;
			}
		
	 } 
 }
	
 public function delete_value($data){
	$main_update = $this->db->query("DELETE FROM product_option_value WHERE id = '" . (int)$data . "'");
					
	if($main_update){
		return true;
	}
		
 }
 
 public function delete_option($data){
	$main_update = $this->db->query("DELETE FROM option_description WHERE id = '" . (int)$data . "'");
					
	if($main_update){
		return true;
	}
	
 }
	function get_values($option_id, $language_id){
				$this->db->where('option_id', $option_id);
				$this->db->where('language_id', $language_id);
 				$query = $this->db->get("option_value");
				return $query->result();


	}
	
	function get_values_list($option_id, $product_id){
 				$this->db->where('option_id', $option_id);
 				$this->db->where('language_id', $this->session->userdata('lang'));
				$query = $this->db->get("option_value");
				return $query->result();


	}
  
}


    

 
 