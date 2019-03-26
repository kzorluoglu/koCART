<?php
  //Loads configuration from database into global CI config
  function load_config()
  {
   $CI =& get_instance();
   $query = $CI->db->get('settings');
   foreach($query->result() as $site_config)
   {
		$CI->config->set_item('title', $site_config->title);
		$CI->config->set_item('description', $site_config->description);
		$CI->config->set_item('meta_tags', $site_config->meta_tags);
		$CI->config->set_item('name', $site_config->name);
		$CI->config->set_item('owner', $site_config->owner);
		$CI->config->set_item('address', $site_config->address);
		$CI->config->set_item('email', $site_config->email);
		$CI->config->set_item('telefon', $site_config->telefon);
		$CI->config->set_item('logo', $site_config->logo);
   }
  }
?>