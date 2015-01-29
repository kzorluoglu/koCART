<?php
class Products_model extends CI_Model {
 
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function most_sell_products()
    {
        $query = $this->db->query('SELECT modules.*, product.*, product_description.* 
			FROM modules
			INNER JOIN product ON modules.product_id=product.id 
			INNER JOIN product_description ON product.id=product_description.product_id 
			WHERE product_description.language_id = '.$this->session->userdata('lang').' AND modules.type = "sell"
			ORDER BY modules.rank ASC');
        return $query->result();
 
    }
	    function most_popular_products()
    {
        $query = $this->db->query('SELECT modules.*, product.*, product_description.* 
			FROM modules
			INNER JOIN product ON modules.product_id=product.id 
			INNER JOIN product_description ON product.id=product_description.product_id 
			WHERE product_description.language_id = '.$this->session->userdata('lang').' AND modules.type = "popular"
			ORDER BY modules.rank ASC');
        return $query->result();
 
    }
	

     function slider_products()
    {
        $query = $this->db->query('SELECT modules.*, product.*, product_description.* 
			FROM modules
			INNER JOIN product ON modules.product_id=product.id 
			INNER JOIN product_description ON product.id=product_description.product_id 
			WHERE product_description.language_id = '.$this->session->userdata('lang').' AND modules.type = "slide"
			ORDER BY modules.rank ASC');
        return $query->result();
 
    }
     function category_products($id)
    {
        $query = $this->db->query('SELECT product.*, product_description.* 
			FROM product
			INNER JOIN product_description ON product.id=product_description.product_id 
			WHERE product_description.language_id = '.$this->session->userdata('lang').' AND product.category_id = '.$id.'
			ORDER BY product.id');
        return $query->result();
 
    }
	     function product($id)
    {
        $query = $this->db->query('SELECT product.*, product_description.*
			FROM product
			INNER JOIN product_description ON product.id=product_description.product_id 
			WHERE product_description.language_id = '.$this->session->userdata('lang').' AND product.id = '.$id.'');
        return $query->result();
 
    }
	     function product_options($id)
    {			$this->db->select('product_option.*, option.*, option_description.*, option.id AS opt_id, option_description.id AS opt_id_for_value');
 				$this->db->where('product_id', $id);
				$this->db->where('option_description.language_id', $this->session->userdata('lang'));
				$this->db->join('option', 'option.id = product_option.option_id');
				$this->db->join('option_description', 'option_description.option_id = product_option.option_id');
				$query = $this->db->get("product_option");
				return $query->result();
 
    }
	     function product_options_value($option_id, $product_id)
		 {
 
   				$this->db->where('product_option_value.product_id', $product_id);
				$this->db->join('option_value', 'option_value.option_value_id = product_option_value.value_id');
				$this->db->where('option_value.option_id', $option_id);
 				$this->db->where('option_value.language_id', $this->session->userdata('lang'));
 				$query = $this->db->get("product_option_value");
				return $query->result();
 
    }
	
	     function option_price_total($option)
		 {
			$query = $this->db->query("SELECT SUM(price) as total FROM product_option_value WHERE id IN (" . implode(',', array_map('intval', $option)) . ")");
			return $query->row('total');
 
    }
	
	     function cart_product_options($options_id)
		 {
		 if($options_id){
				$this->db->join('option_value', 'option_value.option_value_id = product_option_value.value_id');
 				$this->db->where('option_value.language_id', $this->session->userdata('lang'));
				$this->db->where_in('id', $options_id);
 				$query = $this->db->get("product_option_value");
				return $query->result();
			}
 
 
    }
	
}