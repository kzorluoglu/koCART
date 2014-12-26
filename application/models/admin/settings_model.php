<?php
class Settings_model extends CI_Model {
 
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

 	public function settings_detail($id){
			$this->db->where('id', $id);
 	        $query = $this->db->get("settings");
			return $query->result();
	}
	function get_default_currency_id($id){
		$query = $this->db->query("SELECT * FROM settings WHERE id = '".$id."'");
		return $query->row('currency');
	}
	function get_default_language_id($id){
		$query = $this->db->query("SELECT * FROM settings WHERE id = '".$id."'");
		return $query->row('language');
	}
	function get_default_language_filename($id){
		$query = $this->db->query("SELECT * FROM settings WHERE id = '".$id."'");
		$default_lang_id = $query->row('language');
		
		$query_file = $this->db->query("SELECT file_name FROM language WHERE id = '".$default_lang_id."'");
		return $query_file->row('file_name');
	}
	
 	public function update($id, $data){ 
	$query = $this->db->query("UPDATE settings SET title = '" . $data['title'] . "', description = '" . $data['description'] . "', meta_tags = '" . $data['meta_tags'] . "', name = '" . $data['name'] . "', owner = '" . $data['owner'] . "', address = '" . $data['address'] . "', email = '" . $data['email'] . "', telefon = '" . $data['telefon'] . "', logo = '" . $data['logo'] . "', language = '" . $data['language'] . "', currency = '" . $data['currency'] . "' WHERE id = '" . (int)$id . "'");
	return $query;
	}
 
  }
