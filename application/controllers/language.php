<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Language extends KoController
{
    public function set()
    {
        $id = $this->security->xss_clean($this->uri->segment(3));

        if ($id == "tr") {
            $this->session->set_userdata('lang', '1');
            $this->session->set_userdata('lang_file', 'turkish');
        }
        if ($id == "en") {
            $this->session->set_userdata('lang', '2');
            $this->session->set_userdata('lang_file', 'english');
        }

        redirect($_SERVER['HTTP_REFERER']);
    }
}
