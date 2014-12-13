<?php
class Cargo_model extends CI_Model {
 
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function all_cargo()
    {
        $query = $this->db->query('SELECT * FROM cargo WHERE status = "1" ORDER BY id ASC');
        return $query->result();
    }
	function cargo_detail($id){
		$query = $this->db->query('SELECT * FROM cargo WHERE id = "'.$id.'"');
		return $query->result();
	
	}

 

}