<?php
class Order_model extends CI_Model {
 
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function add($data, $products)
    {
		$this->db->insert('order', $data);
		$order_id = $this->db->insert_id();
		
		foreach($products as $product){
		
				$order_product = array(
					'order_id' 		=> $order_id,
					'product_id' 	=> $product['id'],
					'count'			=> $product['qty'],
				);

				$this->db->insert('order_detail', $order_product); 
		
		}
		return $order_id;
		
    }
 
 

}