<?php
class Payment_model extends CI_Model
{
    public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    public function payments()
    {
        $query = $this->db->query('SELECT * FROM extension ORDER BY id');
        return $query->result();
    }
}
