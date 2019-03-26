<?php
class Module_model extends CI_Model {
 
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    public function module_count() {
		$this->db->group_by("name");
		$this->db->order_by("id", "asc"); 


        $query = $this->db->get("modules");
        return $query->num_rows();
    }
 
    public function get_modules($limit, $start) {
        $this->db->limit($limit, $start);
		$this->db->group_by("name");
		$this->db->order_by("id", "asc"); 


        $query = $this->db->get("modules");
 
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
 	public function products($type){
		$this->db->select('modules.id AS mod_id, modules.product_id AS mod_product_id, modules.rank AS mod_rank, product_description.name AS name');
		$this->db->where('type', $type);
		$this->db->where('product_description.language_id', $this->session->userdata('lang'));
		$this->db->join('product_description', 'product_description.product_id = modules.product_id');
		$this->db->join('product', 'product.id = modules.product_id');
		$this->db->order_by("mod_rank", "asc"); 
	    $query = $this->db->get("modules");
		return $query->result();
	}
 
	function product($id){
        $query = $this->db->query('SELECT product.*, product_description.*
			FROM product
			INNER JOIN product_description ON product.id=product_description.product_id 
			WHERE product_description.language_id = '.$this->session->userdata('lang').' AND product.id = '.$id.'');
        return $query->result();
    }
 
	public function update($data){
		$update = array(
               'rank' => $data['rank']
		);
		$this->db->where('id', $data['id']);
		return $this->db->update('modules', $update); 
	}
	
  public function get_products($q){
  
    $this->db->select('name, product_id');
	$this->db->where('language_id', $this->session->userdata('lang'));
     $this->db->like('name', $q);
    $query = $this->db->get('product_description');
    if($query->num_rows > 0){
      foreach ($query->result_array() as $row){
		
        $new_row['label'] = $row['name'];
        $new_row['value'] = $row['product_id'];
        $row_set[] = $new_row; //build an array
      }
      echo json_encode($row_set); //format the array into json data
	  //echo json_decode($row_set);
    }
  }
  
 public function delete($data){
 		$this->db->query("DELETE FROM modules WHERE id = '" . (int)$data . "'");
 }
 
 public function add($data){
	$this->db->where('type', $data['type']);
	$query = $this->db->get('modules');
	$ret = $query->row();
	$main_update = $this->db->query("INSERT INTO modules SET name = '" . $ret->name . "', details = '" . $ret->details . "', type = '" . $data['type'] . "', product_id = '" . $data['product_id'] . "', rank = '" . $data['rank'] . "'");
 		
	if($main_update){
			return true;
	}
	
 }
 
  }
