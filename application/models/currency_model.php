<?php
class Currency_model extends CI_Model {
 
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

	     function id_is_valid($id)		 {
 				$this->db->where('id', $id);
 				$query = $this->db->get("currency");
					 if ($query->num_rows() > 0){
						return true;
					}
					else{
						return false;
					}
	}
 
 
 
	
}