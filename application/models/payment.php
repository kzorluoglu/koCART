<?php
class Payment extends CI_Model {
 
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function payments()
    {
        $query = $this->db->query('SELECT * FROM extension ORDER BY id');
        return $query->result();
 
    }

 

}