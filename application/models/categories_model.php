<div class="collapse navbar-collapse navbar-ex1-collapse">
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');  
  
class Categories_model extends CI_Model {
  
   public $result;  
  
 function get_cats(){  
   $this->db->join('category_description','category_description.category_id = category.id');
   $this->db->where('category_description.language_id', $this->session->userdata('lang'));
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
  
   $this->result .= '<ul  class="list-group"';  
     
   $this->result .= $parent == null ? ' class="nav navbar-nav"' : '';  
  
   $this->result .= '>';  
  
   foreach ($items[$index] as $child) {  
  
    $this->result .= '<li rel="'.$child['id'].'"><a href="'.base_url().''.$child['link'].'">'.$child['category_name'].'</a>';  
      
    $this->_menu_listele($items, $child['id']);  
      
    $this->result .= '</li>';  
     
   }  
  
   $this->result .= '</ul>';  
  }  
 }  
   
}  
