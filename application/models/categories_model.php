<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Categories_model extends CI_Model
{
    public $result;

    public function get_cats()
    {
        $this->db->join('category_description', 'category_description.category_id = category.id');
        $this->db->where('category_description.language_id', $this->session->userdata('lang'));
        $this->db->order_by("category.rank", "asc");
        $query = $this->db->get('category');

        if ($query->num_rows() > 0) {
            $res = $query->result_array();

            foreach ($res as $row) {
                $items[$row['parent_id']][] = $row;
            }

            $this->categories_list($items);

            return $this->result;
        }
    }

    public function categories_list($items, $parent = null)
    {
        $index = $parent == null ? '0' : $parent;
        if (isset($items[$index])) {
            $this->result .= '<ul';

            $this->result .= $parent == null ? ' id="main-menu" class="sm sm-vertical sm-blue sm-blue-vertical"' : '';

            $this->result .= '>';

            foreach ($items[$index] as $child) {
                $this->result .= '<li><a href="'.base_url().''.$child['link'].'">'.$child['category_name'].'</a>';

                $this->categories_list($items, $child['id']);

                $this->result .= '</li>';
            }

            $this->result .= '</ul>';
        }
    }
}
