<?php
class Currency_model extends CI_Model
{
    public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    public function id_is_valid($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get("currency");
        if ($query->num_rows() > 0) {
            return true;
        }
        
        return false;
    }
}
