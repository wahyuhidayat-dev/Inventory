<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Items extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->library(array('template', 'form_validation','session'));
		$this->load->model('admin');
	}

	// List all your items
	public function index()
	{
		$this->cek_login();
		//$data['login'] = $this->admin->get_where('t_user',array('id_user' =>$this->session->userdata('login_user')))->row();
		$data['items'] = $this->admin->get_all('t_stock_detail');
		$data['header'] = 'Manage Items';
		$data['date'] = date('D-M-Y');
		$this->template->admin('manage_items' ,$data);
	}

	public function Out()
	{
		$this->cek_login();
		//$data['login'] = $this->admin->get_where('t_user',array('id_user' =>$this->session->userdata('login_user')))->row();
		$data['items'] = $this->admin->get_all('t_stock_detail');
		$data['header'] = 'Manage Items';
		$data['date'] = date('D-M-Y');
		$this->template->admin('manage_items_out' ,$data);
	}
	// add item
	public function add_items()
	{

		if ($this->input->post('submit', TRUE) == 'Submit') {

			$this->form_validation->set_rules('ven_nm', 'Vendor Name', 'required');
			$this->form_validation->set_rules('prod_nm', 'Product Name', 'required');
			$this->form_validation->set_rules('cat_nm', 'Category Name', 'required');
			$this->form_validation->set_rules('status', 'Status', 'required');
			$this->form_validation->set_rules('spec', 'Spec', 'required');
			$this->form_validation->set_rules('sale_price', 'Sale Price', 'required|numeric');
			$this->form_validation->set_rules('buy_price', 'Buy Price', 'required|numeric');
			$this->form_validation->set_rules('barcode', 'Barcode', 'required|numeric');

			if ($this->form_validation->run() == TRUE) {
				$data = array(
					'VEN_NM' => $this->input->post('ven_nm', TRUE),
					'PROD_NM' => $this->input->post('prod_nm', TRUE),
					'L1_NM' => $this->input->post('cat_nm', TRUE),
					'STATUS' => $this->input->post('status', TRUE),
					'SPEC' => $this->input->post('spec', TRUE),
					'SALE_PRC' => $this->input->post('sale_price', TRUE),
					'BUY_PRC' => $this->input->post('buy_price', TRUE),
					'BARCODE' => $this->input->post('barcode', TRUE)
				);
				$this->admin->insert_last('t_prod_master',$data);
				$this->session->set_flashdata('alert', 'Sukses Menyimpan data !!!');
				redirect('Items','refresh');
			} else {
				$this->session->set_flashdata('alert-danger', 'Gagal Menyimpan data !!!');
			}

		}
		$data['vendor'] = $this->admin->get_all('t_vendor')->result();
		$data['cat'] = $this->admin->get_all('t_category')->result();
		$data['VEN_NM'] = $this->input->post('ven_nm', TRUE);
		$data['PROD_NM'] = $this->input->post('prod_nm', TRUE);
		$data['PROD_NM'] = $this->input->post('prod_nm', TRUE);
		$data['header'] = 'Add Items';

		$this->template->admin('add_item' ,$data);
	}
	// input item
	public function items()
	{	
		$this->cek_login();	
		$data['header'] = "Input Item";
		if ($this->input->post('submit', TRUE) == 'Submit') {


			$barcode = $this->input->post('barcode',TRUE);
			$item = $this->admin->get_where('t_prod_master', array('BARCODE' => $barcode));

			if ($item->num_rows() > 0) {
				
				foreach ($item->result() as $key) 
				{
					$data['CAT_NM'] = $key->L1_NM;
					$data['PROD_ID'] = $key->PROD_ID;
					$data['BARCODE'] = $key->BARCODE;
					$data['PROD_NM'] = $key->PROD_NM;
					$data['STATUS'] = $key->STATUS;
					$data['SALE_PRC'] = $key->SALE_PRC;
				}
				$data['date'] = date('Y-m-d');
				$data['stock'] = $this->admin->get_where('t_stock_detail', array('BARCODE' => $barcode))->row();
				$this->template->admin('input_item',$data);
				$this->session->set_flashdata('alert', 'Sukses Menyimpan data !!!');

			}else{
				$this->session->set_flashdata('alert-danger', 'Barcode Tidak Ditemukan !!!');
				redirect('Items','refresh');
				
			}	
		}
	}
	public function out_items()
	{	
		$this->cek_login();	
		$data['header'] = "Input Item";
		if ($this->input->post('submit', TRUE) == 'Submit') {


			$barcode = $this->input->post('barcode',TRUE);
			$item = $this->admin->get_where('t_prod_master', array('BARCODE' => $barcode));

			if ($item->num_rows() > 0) {
				
				foreach ($item->result() as $key) 
				{
					$data['CAT_NM'] = $key->L1_NM;
					$data['PROD_ID'] = $key->PROD_ID;
					$data['BARCODE'] = $key->BARCODE;
					$data['PROD_NM'] = $key->PROD_NM;
					$data['STATUS'] = $key->STATUS;
					$data['SALE_PRC'] = $key->SALE_PRC;
				}
				$data['date'] = date('Y-m-d');
				$data['kode_out'] = $this->admin->getkodeout();
				$data['stock'] = $this->admin->get_where('t_stock_detail', array('BARCODE' => $barcode))->row();
				$this->template->admin('output_item',$data);
				$this->session->set_flashdata('alert', 'Sukses Menyimpan data !!!');

			}else{
				$this->session->set_flashdata('alert-danger', 'Barcode Tidak Ditemukan !!!');
				redirect('Items/Out','refresh');
				
			}	
		}
	}
	public function insert()
	{	

		if ($this->input->post('submit', TRUE) == 'Submit') {

			$this->form_validation->set_rules('qty', 'Input Qty', 'required');

			if ($this->form_validation->run() == TRUE) {

				$data = array(
					'PROD_ID' => $this->input->post('prod_id', TRUE),
					'QTY_IN' => $this->input->post('qty', TRUE),
					'DATE' => $this->input->post('date', TRUE)
				);
				$q1 = $this->input->post('stock_qty', TRUE);
				$q2 = $this->input->post('qty', TRUE);
				$q3 = $q1+$q2; 
				$data2 = array(
					'PROD_ID' => $this->input->post('prod_id', TRUE),
					'CAT_NM' => $this->input->post('cat_nm', TRUE),
					'BARCODE' => $this->input->post('barcode', TRUE),
					'PROD_NM' => $this->input->post('prod_nm', TRUE),
					'STATUS' => $this->input->post('status', TRUE),
					'STOCK_QTY' => $q3,
					'SALE_PRC' => $this->input->post('sale_prc', TRUE),
					'DATE' => $this->input->post('date', TRUE)
				 );

 				$this->admin->insert('t_stock_in',$data);
 				$this->admin->update('t_stock_detail',$data2,array('PROD_ID' => $this->input->post('prod_id', TRUE)));
				$this->session->set_flashdata('alert', 'Sukses Menyimpan data !!!');
				redirect('Items','refresh');
			}
			else{
				$this->session->set_flashdata('alert-danger', 'Gagal Menyimpan data !!!');
				redirect('Items','refresh');

			}
		}

	}

	public function output()
	{	

		if ($this->input->post('submit', TRUE) == 'Submit') {

			$this->form_validation->set_rules('qty', 'Input Qty', 'required');
			$this->form_validation->set_rules('reason', 'Input Raason', 'required');

			if ($this->form_validation->run() == TRUE) {

				$data = array(
					'ID_TRANS' => $this->input->post('kode_out', TRUE),
					'PROD_ID' => $this->input->post('prod_id', TRUE),
					'QTY_OUT' => $this->input->post('qty', TRUE),
					'DATE' => $this->input->post('date', TRUE),
					'REASON' => $this->input->post('reason', TRUE)
					
				);
				$q1 = $this->input->post('stock_qty', TRUE);
				$q2 = $this->input->post('qty', TRUE);
				$q3 = $q1-$q2; 
				$data2 = array(
					'PROD_ID' => $this->input->post('prod_id', TRUE),
					'CAT_NM' => $this->input->post('cat_nm', TRUE),
					'BARCODE' => $this->input->post('barcode', TRUE),
					'PROD_NM' => $this->input->post('prod_nm', TRUE),
					'STATUS' => $this->input->post('status', TRUE),
					'STOCK_QTY' => $q3,
					'SALE_PRC' => $this->input->post('sale_prc', TRUE),
					'DATE' => $this->input->post('date', TRUE)
				 );
 
 				$this->admin->insert('t_stock_out',$data);
 				$this->admin->update('t_stock_detail',$data2,array('PROD_ID' => $this->input->post('prod_id', TRUE)));
				$this->session->set_flashdata('alert', 'Sukses Menyimpan data !!!');
				redirect('Items/Out','refresh');
			}
			else{
				$this->session->set_flashdata('alert-danger', 'Gagal Menyimpan data !!!');
				redirect('Items/Out','refresh');

			}
		}

	}
	//Update one item
	public function update( $id = NULL )
	{

	}

	//Delete one item
	public function delete( $id = NULL )
	{

	}
	function cek_login()
	{
		if (!$this->session->userdata('login_user'))
		{
			redirect('login');
		}
	}
}// end Items

/* End of file Items.php */
/* Location: ./application/controllers/Items.php */
