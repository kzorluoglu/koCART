<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Product_model extends CI_Model {

  
 
function get_products(){
        $query = $this->db->query('SELECT product.*, product_description.* 
			FROM product
			INNER JOIN product_description ON product.id=product_description.product_id 
			WHERE product_description.language_id = '.$this->session->userdata('lang').'
			ORDER BY product.id');
        return $query->result();
 
}

 public function Add($data){
 		$this->db->query("INSERT INTO product SET category_id = '" . (int)$data['category_id'] . "',  image = '" . $data['image'] . "', stock = '" . $data['stock'] . "', price = '" . $data['price'] . "', rank = '" . $data['rank'] . "'");
		
		$product_id = $this->db->insert_id();
		
		$seourl = "product/".$product_id."/".$data['url'].".html";
		
		$this->db->query("UPDATE product SET url = '".$seourl."' WHERE id = '" . (int)$product_id . "'");
		
		foreach ($data['product_description'] as $language_id => $value) {
			$this->db->query("INSERT INTO product_description SET product_id = '" . (int)$product_id . "', language_id = '" . (int)$language_id . "', name = '" . $value['name'] . "', meta_tags = '" . $value['meta_tags'] . "', meta_keys = '" . $value['meta_keys'] . "', details = '" . $value['details'] . "'");
		}
 }
 
 public function delete($data){
		$this->db->query("DELETE FROM product WHERE id = '" . (int)$data . "'");
		$this->db->query("DELETE FROM product_description WHERE product_id = '" . (int)$data . "'");
 }
   
 public function product_count() {
        return $this->db->count_all("category");
    }
 
  
 public function product($id){
			$this->db->where('id', $id);
 	        $query = $this->db->get("product");
			return $query->result();
	}
 
	 public function product_description($id) {
		
		$product_description_data = array();
		$query = $this->db->query("SELECT * FROM product_description WHERE product_id = '" . (int)$id . "'");
		foreach ($query->result() as $result) {
			$product_description_data[$result->language_id] = array(
				'name'    		=> $result->name,
				'details'     	=> $result->details,
				'meta_tags'	=> $result->meta_tags,
				'meta_keys'		=> $result->meta_keys,
			);
		}
		return $product_description_data;
	}
	
 public function update($product_id, $data){ // of Opencart
		
		$this->db->query("UPDATE product SET category_id = '" . (int)$data['category_id'] . "', image = '" . $data['image'] . "', stock = '" . $data['stock'] . "', price = '" . $data['price'] . "', rank = '" . (int)$data['rank'] . "' WHERE id = '" . (int)$product_id . "'");
		
		$seourl = "product/".$product_id."/".$data['url'].".html";
		
		$this->db->query("UPDATE product SET url = '".$seourl."' WHERE id = '" . (int)$product_id . "'");
		
		$this->db->query("DELETE FROM product_description WHERE product_id = '" . (int)$product_id . "'");
			foreach ($data['product_description'] as $language_id => $value) {
			$this->db->query("INSERT INTO `product_description` SET `product_id` = '" . (int)$product_id . "', language_id = '" . (int)$language_id . "', `name` = '" . $value['name'] . "', meta_tags = '" . $value['meta_tags'] . "', meta_keys = '" . $value['meta_keys'] . "', details = '" . $value['details'] . "'");
		}
 
 
 
	}
	
	function get_options($id){
				$this->db->where('product_id', $id);
				$this->db->where('option_description.language_id', $this->session->userdata('lang'));
				$this->db->join('option', 'option.id = product_option.option_id');
				$this->db->join('option_description', 'option_description.option_id = product_option.option_id');
				$query = $this->db->get("product_option");
				return $query->result();
	}

	function get_values($option_id, $product_id){
				$this->db->select('option_value.*, product_option_value.*, product_option_value.id AS pr_value_id');
				$this->db->where('option_id', $option_id);
				$this->db->where('product_id', $product_id);
				$this->db->join('product_option_value', 'product_option_value.value_id = option_value.id');
				$this->db->where('language_id', $this->session->userdata('lang'));
				$query = $this->db->get("option_value");
				return $query->result();


	}
}


    

 
 