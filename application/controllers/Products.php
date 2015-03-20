<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("Product");
		$this->output->enable_profiler();
	}

	public function index()
	{
		$data = array(
			'products' => $this->Product->get_all()
		);
		if($this->session->userdata('cart') == null){
			$this->session->set_userdata('cart', array());
		}
		$this->load->view('index',$data);
	}
	public function show_single($id)
	{
		$data = array(
			'id'=>$id,
			'product'=>$this->Product->get_single($id)
		);
		$this->load->view('index',$data);
	}
	public function add_product()
	{
		$data = $this->input->post();
		$cart = $this->session->userdata('cart');

		foreach ($data as $key => $value) 
		{
			if(isset($cart[$key])) {
					$cart[$key] += $value;
			}
			else{
				$cart[$key] = $value;
			}
		}
		foreach($cart as $product=>$quantity)
		{
			if($quantity<=0)
			{
				unset($cart[$product]);
			}
		}
		$this->session->set_userdata('cart', $cart);

		redirect('/');
	}
	public function checkout()
	{	
		$cart = $this->session->userdata('cart');
		$info = $this->Product->get_data($cart);

		$this->session->set_userdata('info',$info);
		$this->session->userdata('info');
		
		$this->load->view('checkout');

	}

	// public function order()
	// {
	// 	$data = $this->input->post();
	// 	$cart = $this->session->userdata('cart');
	// 	$info = $this->session->userdata('info');

	// 	var_dump($info);
	// 	die();
	// }

	public function destroy($id)
	{
		$delete = $this->session->userdata('info');
		foreach ($delete as $key => $value) {
			if($value['id'] == $id)
			{
				unset($delete[$key]);
				$this->session->set_userdata('info', $delete);
			}
		}

		$this->load->view('checkout');
	}

	public function cancel()
	{
		$this->session->sess_destroy();
		redirect('/');
	}
}

//end of main controller