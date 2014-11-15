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
 
 
	     function product($id)
    {
        $query = $this->db->query('SELECT product.*, product_description.*
		FROM product
		INNER JOIN product_description ON product.id=product_description.product_id 
		WHERE product_description.language_id = '.$this->session->userdata('lang').' AND product.id = '.$id.'');
        return $query->result();
 
    }
	public function detail($id){
			$this->db->where('order_id', $id);
	        $query = $this->db->get("order");
			return $query->result();
	
	}
	public function update_comment($data){
	$update = array(
               'comment' => $data['comment'],
               'status' => $data['status']
            );

$this->db->where('order_id', $data['order_id']);
 
 return $this->db->update('order', $update); 
 
	
	}
 	public function products($id){
			$this->db->where('order_id', $id);
			$this->db->where('product_description.language_id', $this->session->userdata('lang'));
			$this->db->join('product_description', 'product_description.product_id = order_detail.product_id');
			$this->db->join('product', 'product.id = order_detail.product_id');
	        $query = $this->db->get("order_detail");
			return $query->result();

	
	}
}