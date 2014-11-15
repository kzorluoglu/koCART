<?php if (!defined('BASEPATH')) exit('No direct script access allowed');  
  
class Menu_model extends CI_Model {
  
  public $result;  

  
 function get_menus(){  
   $this->db->join('menu_description','menu_description.menu_id = menu.id');
   $this->db->where('menu_description.language_id', $this->session->userdata('lang'));
  $query = $this->db->get('menu'); 
    
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
  
   $this->result .= '<ul';  
     
   $this->result .= $parent == null ? ' id="menu" ' : '';  
  
   $this->result .= '>';  
  
   foreach ($items[$index] as $child) {  
  
    $this->result .= '<li rel="'.$child['id'].'"><a href="'.base_url().''.$child['link'].'">'.$child['menu_name'].'</a>';
      
    $this->_menu_listele($items, $child['id']);  
      
    $this->result .= '</li>';  
     
   }  
  
   $this->result .= '</ul>';  
  }  
 }  
   
}  
