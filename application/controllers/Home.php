<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library(array('template', 'session'));
		$this->load->model('admin');
	}

	public function index()
	{
		$this->cek_login();
		$data['cat'] = $this->admin->count('t_category');
		$data['user'] = $this->admin->count('t_user');
		$data['vendor'] = $this->admin->count('t_vendor');
		$data['items'] = $this->admin->count('t_prod_master');
		$data['shop'] = $this->admin->get_all('t_stock_detail')->result();
		$data['data'] = $this->admin->summary()->result();
		// $data['bisc'] = $this->admin->count_where('t_stock_detail', ['CAT_ID' => 11, 'STOCK_QTY' =>0, 'STATUS' =>'Normal']);
		// $data['drink'] = $this->admin->count_where('t_stock_detail', ['CAT_ID' => 23, 'STOCK_QTY' =>0, 'STATUS' =>'Normal']);
		// $data['dairy'] = $this->admin->count_where('t_stock_detail', ['CAT_ID' => 35, 'STOCK_QTY' =>0, 'STATUS' =>'Normal']);
		// $data['milk'] = $this->admin->count_where('t_stock_detail', ['CAT_ID' => 24, 'STOCK_QTY' =>0, 'STATUS' =>'Normal']);
		// $data['bulk'] = $this->admin->count_where('t_stock_detail', ['CAT_ID' => 17, 'STOCK_QTY' =>0, 'STATUS' =>'Normal']);
		// $data['sauce'] = $this->admin->count_where('t_stock_detail', ['CAT_ID' => 21, 'STOCK_QTY' =>0, 'STATUS' =>'Normal']);
		// $data['det'] = $this->admin->count_where('t_stock_detail', ['CAT_ID' => 14, 'STOCK_QTY' =>0, 'STATUS' =>'Normal']);
		// $data['hb'] = $this->admin->count_where('t_stock_detail', ['CAT_ID' => 19, 'STOCK_QTY' =>0, 'STATUS' =>'Normal']);
		// $data['tv'] = $this->admin->count_where('t_stock_detail', ['CAT_ID' => 50, 'STOCK_QTY' =>0, 'STATUS' =>'Normal']);
		// $data['it'] = $this->admin->count_where('t_stock_detail', ['CAT_ID' => 86, 'STOCK_QTY' =>0, 'STATUS' =>'Normal']);
		// $data['small'] = $this->admin->count_where('t_stock_detail', ['CAT_ID' => 87, 'STOCK_QTY' =>0, 'STATUS' =>'Normal']);
		// $data['big'] = $this->admin->count_where('t_stock_detail', ['CAT_ID' => 88, 'STOCK_QTY' =>0, 'STATUS' =>'Normal']);
		// $data['bath'] = $this->admin->count_where('t_stock_detail', ['CAT_ID' => 57, 'STOCK_QTY' =>0, 'STATUS' =>'Normal']);
		// $data['kit'] = $this->admin->count_where('t_stock_detail', ['CAT_ID' => 51, 'STOCK_QTY' =>0, 'STATUS' =>'Normal']);
		// $data['diy'] = $this->admin->count_where('t_stock_detail', ['CAT_ID' => 85, 'STOCK_QTY' =>0, 'STATUS' =>'Normal']);
		// $data['stat'] = $this->admin->count_where('t_stock_detail', ['CAT_ID' => 71, 'STOCK_QTY' =>0, 'STATUS' =>'Normal']);
		// $data['ib'] = $this->admin->count_where('t_stock_detail', ['CAT_ID' => 13, 'STOCK_QTY' =>0, 'STATUS' =>'Normal']);
		// $data['ladies'] = $this->admin->count_where('t_stock_detail', ['CAT_ID' => 15, 'STOCK_QTY' =>0, 'STATUS' =>'Normal']);
		// $data['men'] = $this->admin->count_where('t_stock_detail', ['CAT_ID' => 16, 'STOCK_QTY' =>0, 'STATUS' =>'Normal']);
		// $data['oos'] = $this->admin->count_where('t_stock_detail', ['STOCK_QTY' =>0, 'STATUS' =>'Normal']);
		$data['header'] = 'Home';

		$this->template->admin('dashboard', $data);


	}

	function cek_login()
	{
		if (!$this->session->userdata('login_user'))
		{
			redirect('login');
		}
	}


}