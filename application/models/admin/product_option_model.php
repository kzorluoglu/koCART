<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Product_option_model extends CI_Model { 

  
 
function get_options($id){
				$this->db->select('product_option.*, option.*, option_description.*, product_option.id AS pr_opt_id');
				$this->db->where('product_option.product_id', $id);
				$this->db->where('option_description.language_id', $this->session->userdata('lang'));
				$this->db->join('option', 'option.id = product_option.option_id');
				$this->db->join('option_description', 'option_description.option_id = product_option.option_id');
				$query = $this->db->get("product_option");
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
 
 
function get_option_type_list(){
 				$query = $this->db->get("option");
				return $query->result();
 
} 
 public function add_new_option($data){
 		$this->db->query("INSERT INTO product_option SET product_id = '" . $data['product_id'] . "',  option_id = '" . $data['option_id'] . "'");
 }
 
 public function add_new_value($data){
 		$this->db->query("INSERT INTO product_option_value SET product_id = '" . $data['product_id'] . "',  value_id = '" . $data['value_id'] . "', operation = '" . $data['operation'] . "', price = '" . $data['price'] . "'");
 }
 
	
 public function value_update($data){  
 for ($i = 0; $i < count($data['pr_value_id']); $i++) {
 			$this->db->query("UPDATE product_option_value SET operation = '".$data['operation'][$i]."', price = '".$data['price'][$i]."' WHERE id = '".$data['pr_value_id'][$i]."'");


 } 
 
 
	}
	
 public function delete_value($data){
		$this->db->query("DELETE FROM product_option_value WHERE id = '" . (int)$data . "'");
 }
 
 public function delete($data){
		$this->db->query("DELETE FROM product_option WHERE id = '" . (int)$data . "'");
 
 }
	function get_values($option_id, $product_id){
				$this->db->select('option_value.*, product_option_value.*, product_option_value.id AS pr_value_id');
				$this->db->where('option_id', $option_id);
				$this->db->where('product_id', $product_id);
				$this->db->join('product_option_value', 'product_option_value.value_id = option_value.option_value_id');
				$this->db->where('language_id', $this->session->userdata('lang'));
				$query = $this->db->get("option_value");
				return $query->result();


	}
	
	function get_values_list($option_id){
 				$this->db->where('option_id', $option_id);
 				$this->db->where('language_id', $this->session->userdata('lang'));
				$query = $this->db->get("option_value");
				return $query->result();


	}
  
}


    

 
 