<?php
class Menu extends CI_Model {
 
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function menu()
    {
        $query = $this->db->query('SELECT menu.id, menu.link, menu_description.menu_name 
		FROM menu INNER JOIN menu_description 
		ON menu.id=menu_description.menu_id 
		WHERE menu_description.language_id = '.$this->session->userdata('lang').'
		ORDER BY menu.rank');
        return $query->result();
 
    }

 

}