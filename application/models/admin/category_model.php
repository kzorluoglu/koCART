<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Category_model extends CI_Model {

 public $result;

 
    function Menu_model()
    {
        parent::Model();
    }
  
  public function get_name($id){
  $this->db->select('category_name'); 
    $this->db->from('category_description');   
    $this->db->where('category_id', $id);
	$this->db->where('language_id', $this->session->userdata('lang'));
    return $this->db->get()->row()->category_name;
 
  }
function get_menu(){  
  $this->db->join('category_description', 'category_description.category_id = category.id');
  $query = $this->db->get('category');  
    
  if($query->num_rows() > 0){  
   $res = $query->result_array();  
  
   foreach($res as $row):  
    $items[$row['parent_id']][] = $row;  
   endforeach;  
     
   $this->_menu_listele($items);  
  
   return $this->result;  
  }  
   
 }  
   
 function _menu_listele($items, $parent = null) {  
  
  $index = $parent == null ? '0' : $parent;  
  
  if (isset($items[$index])) {  
  
 
  
   foreach ($items[$index] as $child) {  
   $this->result .= '<tr><td>';
  if($child['parent_id'] > 0){
	$this->result .= ''.$this->get_name($child['parent_id']).' > ';
  }
    $this->result .= ' <b> '.$child['category_name'].'</b></td>
						<td>'.$child['rank'].'</td>	
			<td><a href="'.base_url().'admin/category/detail/'.$child['id'].'"><span class="glyphicon glyphicon-pencil"></span></a> 
			<span class="glyphicon glyphicon-remove"></span>
			</td></tr>';  
      
    $this->_menu_listele($items, $child['id']);  
 
     
   }  
  
 
  }  
 }  
   
 
 
   
     public function category_count() {
        return $this->db->count_all("category");
    }
 
  
	public function detail($id){
			$this->db->where('order_id', $id);
	        $query = $this->db->get("order");
			return $query->result();

	
	}
}


    

 
 