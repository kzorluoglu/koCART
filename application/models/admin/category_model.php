<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Category_model extends CI_Model {

  
 
function get_categories($start, $limit){
			// of Opencart
  $query = $this->db->query("SELECT cp.category_id AS category_id, GROUP_CONCAT(cd1.category_name ORDER BY cp.level SEPARATOR ' &gt; ') AS category_name, c.parent_id, c.rank
		FROM category_path cp
		LEFT JOIN category c ON (cp.path_id = c.id)
		LEFT JOIN category_description cd1 ON (c.id = cd1.category_id)
		LEFT JOIN category_description cd2 ON (cp.category_id = cd2.category_id)
		WHERE cd1.language_id = '" . $this->session->userdata('lang'). "' AND cd2.language_id = '" . $this->session->userdata('lang') . "' GROUP BY cp.category_id ORDER BY category_name
		LIMIT ".$start.", ".$limit."");
 return $query->result();
}
   
function get_category($category_id){
		// of Opencart
  $query = $this->db->query("SELECT cp.category_id AS category_id, GROUP_CONCAT(cd1.category_name ORDER BY cp.level SEPARATOR ' &gt; ') AS category_name, c.parent_id, c.rank
		FROM category_path cp
		LEFT JOIN category c ON (cp.path_id = c.id)
		LEFT JOIN category_description cd1 ON (c.id = cd1.category_id)
		LEFT JOIN category_description cd2 ON (cp.category_id = cd2.category_id)
		WHERE cp.category_id = '".$category_id."' AND cd1.language_id = '" . $this->session->userdata('lang'). "' AND cd2.language_id = '" . $this->session->userdata('lang') . "' GROUP BY cp.category_id ORDER BY category_name");
 return  $query->row('category_name');
}

 public function Add($data){
 		$this->db->query("INSERT INTO category SET parent_id = '" . (int)$data['parent_id'] . "', rank = '" . (int)$data['rank'] . "'");

		$category_id = $this->db->insert_id();
		
		$seourl = "category/".$category_id."/".$data['link'].".html";
		
		$this->db->query("UPDATE category SET link = '".$seourl."' WHERE id = '" . (int)$category_id . "'");
		
		foreach ($data['category_description'] as $language_id => $value) {
			$this->db->query("INSERT INTO category_description SET category_id = '" . (int)$category_id . "', language_id = '" . (int)$language_id . "', category_name = '" . $value['category_name'] . "', meta_keyword = '" . $value['meta_keyword'] . "', meta_description = '" . $value['meta_description'] . "', description = '" . $value['description'] . "'");
		}
    		// MySQL Hierarchical Data Closure Table Pattern / Created By OpenCART
		$level = 0;

		$query = $this->db->query("SELECT * FROM `category_path` WHERE category_id = '" . (int)$data['parent_id'] . "' ORDER BY `level` ASC");

		foreach ($query->result() as $result) {
			$this->db->query("INSERT INTO `category_path` SET `category_id` = '" . (int)$category_id . "', `path_id` = '" . (int)$result->path_id . "', `level` = '" . (int)$level . "'");

			$level++;
		}

		$this->db->query("INSERT INTO `category_path` SET `category_id` = '" . (int)$category_id . "', `path_id` = '" . (int)$category_id . "', `level` = '" . (int)$level . "'");
 
 }
 
 public function delete($data){
 
 		$this->db->query("DELETE FROM category_path WHERE category_id = '" . (int)$data . "'");

		$query = $this->db->query("SELECT * FROM category_path WHERE path_id = '" . (int)$data . "'");

		foreach ($query->result() as $result) {	
			$this->delete($result['category_id']);
		}
		$this->db->query("DELETE FROM category WHERE id = '" . (int)$data . "'");
		$this->db->query("DELETE FROM category_description WHERE category_id = '" . (int)$data . "'");
 
 }
   
 public function category_count() {
        return $this->db->count_all("category");
    }
 
  
 public function category($id){
			
			$this->db->where('id', $id);
 	        $query = $this->db->get("category");
			return $query->result();
	}
 public function category_description($category_id) {
		
		$category_description_data = array();

		$query = $this->db->query("SELECT * FROM category_description WHERE category_id = '" . (int)$category_id . "'");

		foreach ($query->result() as $result) {
			$category_description_data[$result->language_id] = array(
				'category_name'    => $result->category_name,
				'meta_keyword'     => $result->meta_keyword,
				'meta_description' => $result->meta_description,
				'description'      => $result->description
			);
		}

		return $category_description_data;
	}
	
	
 public function update($category_id, $data){ // of Opencart
		$this->db->query("UPDATE category SET parent_id = '" . (int)$data['parent_id'] . "', rank = '" . (int)$data['rank'] . "' WHERE id = '" . (int)$category_id . "'");
		
		$seourl = "category/".$category_id."/".$data['link'].".html";
		
		$this->db->query("UPDATE category SET link = '".$seourl."' WHERE id = '" . (int)$category_id . "'");

		$this->db->query("DELETE FROM category_description WHERE category_id = '" . (int)$category_id . "'");

			foreach ($data['category_description'] as $language_id => $value) {
			$this->db->query("INSERT INTO `category_description` SET `category_id` = '" . (int)$category_id . "', language_id = '" . (int)$language_id . "', `category_name` = '" . $value['category_name'] . "', meta_keyword = '" .$value['meta_keyword'] . "', meta_description = '" . $value['meta_description'] . "', description = '" . $value['description'] . "'");
		}

		// MySQL Hierarchical Data Closure Table Pattern
		$query = $this->db->query("SELECT * FROM `category_path` WHERE path_id = '" . (int)$category_id . "' ORDER BY level ASC");

		if ($query->rows) {
			foreach ($query->rows as $category_path) {
				// Delete the path below the current one
				$this->db->query("DELETE FROM `category_path` WHERE category_id = '" . (int)$category_path['category_id'] . "' AND level < '" . (int)$category_path['level'] . "'");

				$path = array();

				// Get the nodes new parents
				$query = $this->db->query("SELECT * FROM `category_path` WHERE category_id = '" . (int)$data['parent_id'] . "' ORDER BY level ASC");

				foreach ($query->rows as $result) {
					$path[] = $result['path_id'];
				}

				// Get whats left of the nodes current path
				$query = $this->db->query("SELECT * FROM `category_path` WHERE category_id = '" . (int)$category_path['category_id'] . "' ORDER BY level ASC");

				foreach ($query->rows as $result) {
					$path[] = $result['path_id'];
				}

				// Combine the paths with a new level
				$level = 0;

				foreach ($path as $path_id) {
					$this->db->query("REPLACE INTO `category_path` SET category_id = '" . (int)$category_path['category_id'] . "', `path_id` = '" . (int)$path_id . "', level = '" . (int)$level . "'");

					$level++;
				}
			}
		} else {
			// Delete the path below the current one
			$this->db->query("DELETE FROM `category_path` WHERE category_id = '" . (int)$category_id . "'");

			// Fix for records with no paths
			$level = 0;

			$query = $this->db->query("SELECT * FROM `category_path` WHERE category_id = '" . (int)$data['parent_id'] . "' ORDER BY level ASC");

			foreach ($query->rows as $result) {
				$this->db->query("INSERT INTO `category_path` SET category_id = '" . (int)$category_id . "', `path_id` = '" . (int)$result['path_id'] . "', level = '" . (int)$level . "'");

				$level++;
			}

			$this->db->query("REPLACE INTO `category_path` SET category_id = '" . (int)$category_id . "', `path_id` = '" . (int)$category_id . "', level = '" . (int)$level . "'");
		}
 
 
 
	}
	
	
	
 
}


    

 
 