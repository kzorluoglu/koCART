<?php
class Categorys extends CI_Model {
 
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function all_categorys()
    {
        $query = $this->db->query('SELECT category.id, category.link, category_description.category_name 
		FROM category INNER JOIN category_description 
		ON category.id=category_description.category_id 
		WHERE category_description.language_id = '.$this->session->userdata('lang').'
		ORDER BY category.rank');
        return $query->result();
 
    }
 

}