<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sector extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->library(array('template', 'form_validation'));
		$this->load->model('admin');

	}

	// List all your items
	public function index()
	{
		$data['header'] = 'Input Sector Item';
		$data['items'] = $this->admin->sector();
		$this->template->admin('sector', $data);

	}

	public function sector()
	{
		$data['header'] = "Input Sector";
		if ($this->input->post('submit', TRUE) == 'Submit') {
         //validasi
				$barcode = $this->input->post('barcode',TRUE);
				$item = $this->admin->get_where('t_prod_master', array('BARCODE' => $barcode));
		if ($item->num_rows() > 0)
			{
				foreach ($item->result() as $key) 
				{
					$data['PROD_ID'] = $key->PROD_ID;
					$data['BARCODE'] = $key->BARCODE;
					$data['PROD_NM'] = $key->PROD_NM;
					$data['STATUS'] = $key->STATUS;
				}
				
				$this->template->admin('input_sector',$data);
				$this->session->set_flashdata('alert', 'Sukses Menyimpan data !!!');
			}else{
			$this->session->set_flashdata('alert-danger', 'Barcode Tidak Ditemukan !!!');
			redirect('Sector','refresh');

			}	
		}
	}

	// Add a new item
	public function add()
	{
		if ($this->input->post('submit', TRUE) == 'Submit') {

					$data = array(
						'PROD_ID' => $this->input->post('prod_id', TRUE),
						'QTY' => $this->input->post('qty', TRUE),
						'SEKTOR' => $this->input->post('sector', TRUE)
						 );

					$this->admin->insert('t_stock_location',$data);
					$this->session->set_flashdata('alert', 'Sukses Menyimpan data !!!');
					redirect('Sector','refresh');
				}
				else{
					$this->session->set_flashdata('alert', 'Gagal Menyimpan data !!!');
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
}

/* End of file Sector.php */
/* Location: ./application/controllers/Sector.php */
