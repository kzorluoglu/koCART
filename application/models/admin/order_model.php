<?php
class Order_model extends CI_Model {
 
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    public function order_count() {
        return $this->db->count_all("order");
    }
 
    public function get_orders($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get("order");
 
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
 
}