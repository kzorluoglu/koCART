<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
		function __construct()
		{
			parent::__construct();
			session_start(); // For KCFinder -> browser.php $_SESSION['validated'] creating.
							  // account_model have $_SESSION['validated'] created.

		}
	
	public function login()
	{
		$this->load->view('admin/account/login');

	}
 
	public function check(){
	
		
	$email = $this->input->post("email");
    $this->load->model('admin/account/login');

      $result = $this->login->validate();

        if(!$result){

           $this->load->view('admin/account/login');
        }else{

            redirect('admin/dashboard');
        }
			

	}
	
	public function logout(){
        $this->session->sess_destroy();
		session_start(); 
		session_destroy();

        redirect('admin/account/login');
    
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */