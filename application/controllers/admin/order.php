<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order extends CI_Controller {

 
		function __construct()
		{
			parent::__construct();
			
			if(! $this->session->userdata('validated')){
            redirect('admin/account/login');
        }
		
		}
 
 
	public function index(){
 
	}
	
	public function lists(){
		$this->load->model('admin/order_model');
		$this->load->library("pagination");
 
		$config = array();
        $config["base_url"] = base_url() . "admin/order/lists";
        $config["total_rows"] = $this->order_model->order_count();
        $config["per_page"] = 10;
        $config["uri_segment"] = 4;
 
        $this->pagination->initialize($config);
 
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data["results"] = $this->order_model->get_orders($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();

		$this->load->view('admin/order/list', $data);
   }
   
   
   public function detail(){
   		$this->load->model('admin/order_model');
		$currency_info = $this->currency_library->currency('currency');

		
		if($_POST){
			$update_comment = false;
			//$update_comment = $update = $this->order_model->update_comment($_POST);
			if($update_comment){
				$this->session->set_flashdata('action_message', 'Order comment updated!');
				$this->session->set_flashdata('action_message_type', 'success');
				redirect($_SERVER['HTTP_REFERER']);
			}else{
				$this->session->set_flashdata('action_message', 'Order comment not updated!. An error has occured.');
				$this->session->set_flashdata('action_message_type', 'danger');
				redirect($_SERVER['HTTP_REFERER']);
			}
	}
 			 
 		$data["order"] = $this->order_model->detail($this->uri->segment(4));
		
		$order_products = $this->order_model->products($this->uri->segment(4));
		$products = array();
		$count = 0;

			foreach($order_products as $product) {
			 $products[$count++] = array(
				'oid'			=> $product->oid,
				'name' 			=> $product->name,
				'count'			=> $product->count,
				'price'			=> $product->price,
				'options'		=> $this->order_model->product_options($product->options)
			 
			);
			}

 
 		$data['products'] = $products;
 
 		
		$data["order_id"] = $this->uri->segment(4);		// Add Product Tab $order_id
		$data['currency'] = $currency_info[0]->currency;
		$data['symbol'] = $currency_info[0]->symbol;
		
   		$this->load->view('admin/order/detail', $data);

   }
   
	function get_product_name(){
		$this->load->model('admin/module_model');	
		if(isset($_GET['term'])){
			$q = strtolower($_GET['term']);
			$this->module_model->get_products($q);
		}
	}
   
   public function product_add(){
		$this->load->model('admin/order_model');

       	if($_POST){
			$add_product = false;
			//$add_product = $this->order_model->productadd($_POST);
			if($add_product){
				$this->session->set_flashdata('action_message', 'New product added in Order!');
				$this->session->set_flashdata('action_message_type', 'success');
				redirect($_SERVER['HTTP_REFERER']);
			}else{
				$this->session->set_flashdata('action_message', 'New product not added in Order!. An error has occured.');
				$this->session->set_flashdata('action_message_type', 'danger');
				redirect($_SERVER['HTTP_REFERER']);
			}
	}
  
   }
   
   public function product_delete(){
      		$this->load->model('admin/order_model');
			
 			$delete_product = false;
			//$delete_product = $this->order_model->productdelete($this->uri->segment(4));
			if($delete_product){
				$this->session->set_flashdata('action_message', 'Product deleted in Order!');
				$this->session->set_flashdata('action_message_type', 'success');
				redirect($_SERVER['HTTP_REFERER']);
			}else{
				$this->session->set_flashdata('action_message', 'Product not deleted in Order!. An error has occured.');
				$this->session->set_flashdata('action_message_type', 'danger');
				redirect($_SERVER['HTTP_REFERER']);
			}
  
 
   }
   
   
}

 