<?php
class Products extends CI_Model {
 
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
		ORDER BY product.id');
        return $query->result();
 
    }

     function slider_products()
    {
        $query = $this->db->query('SELECT modules.*, product.*, product_description.* 
		FROM modules
		INNER JOIN product ON modules.product_id=product.id 
		INNER JOIN product_description ON product.id=product_description.product_id 
		WHERE product_description.language_id = '.$this->session->userdata('lang').' AND modules.type = "slide"
		ORDER BY product.id');
        return $query->result();
 
    }
     function category_products($id)
    {
        $query = $this->db->query('SELECT modules.*, product.*, product_description.* 
		FROM modules
		INNER JOIN product ON modules.product_id=product.id 
		INNER JOIN product_description ON product.id=product_description.product_id 
		WHERE product_description.language_id = '.$this->session->userdata('lang').' AND modules.type = "slide" AND product.category_id = '.$id.'
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
	
}