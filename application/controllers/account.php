<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Account extends KoController
{
    public function login()
    {
        $this->data['categories'] = $this->categories_model->get_cats();
        $this->load->view('login', $this->data);
    }
}
