<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Exp extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->library(array('template', 'form_validation'));
		$this->load->model('admin');
	}

	public function index()
	{
		$data['header'] = 'Detail Items Expired';
		$data['items'] = $this->admin->get_all('t_expired');
		$this->template->admin('exp' ,$data);
	}

	public function expired()
	{	
		$data['header'] = "Input Item Expired";
		if ($this->input->post('submit', TRUE) == 'Submit') {
         //validasi

				$barcode = $this->input->post('barcode',TRUE);
				$item = $this->admin->get_where('t_prod_master', array('BARCODE' => $barcode));
			if ($item->num_rows() > 0)
			{
				foreach ($item->result() as $key) 
				{
					$data['CAT_NM'] = $key->L1_NM;
					$data['PROD_ID'] = $key->PROD_ID;
					$data['BARCODE'] = $key->BARCODE;
					$data['PROD_NM'] = $key->PROD_NM;
					$data['STATUS'] = $key->STATUS;
				}
				
				$this->template->admin('input_expired',$data);
				$this->session->set_flashdata('alert', 'Sukses Menyimpan data !!!');
			}else{
			$this->session->set_flashdata('alert-danger', 'Barcode Tidak Ditemukan !!!');
			redirect('Exp','refresh');

			}	
		}

	}

	public function insert_exp()
	{
		if ($this->input->post('submit', TRUE) == 'Submit') {

					$data = array(
						'PROD_ID' => $this->input->post('prod_id', TRUE),
						'CAT_NM' => $this->input->post('cat_nm', TRUE),
						'BARCODE' => $this->input->post('barcode', TRUE),
						'PROD_NM' => $this->input->post('prod_nm', TRUE),
						'STATUS' => $this->input->post('status', TRUE),
						'QTY' => $this->input->post('qty', TRUE),
						'DATE' => $this->input->post('date', TRUE)
						 );

					$this->admin->insert('t_expired',$data);
					$this->session->set_flashdata('alert', 'Sukses Menyimpan data !!!');
					redirect('Exp','refresh');
				}
				else{
					$this->session->set_flashdata('alert-danger', 'Gagal Menyimpan data !!!');
					redirect('Exp','refresh');
				}

	}

	public function update()
	{
		# code...
	}

	public function delete()
	{
		# code...
	}

}//end exp 

/* End of file Exp.php */
/* Location: ./application/controllers/Exp.php */