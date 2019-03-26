<?php
class Pages_model extends CI_Model
{
    public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }


    public function pages_detail($id)
    {
        $query = $this->db->query('SELECT page.*, page_description.*
		FROM page INNER JOIN page_description
		ON page.id=page_description.page_id
		WHERE page_description.language_id = '.$this->session->userdata('lang').' AND page.id = '.$id.'');
        return $query->result();
    }
}
