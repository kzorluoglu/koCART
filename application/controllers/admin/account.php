<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller {

 
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

 