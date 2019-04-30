<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendor extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->library(array('template', 'form_validation'));
		$this->load->model('admin');

	}

	// List all your items
	public function index()
	{
		$data['header']='List Vendor';
		$data['vendor']=$this->admin->get_all('t_vendor');

		$this->template->admin('vendor',$data);
	}

	// vendor
	public function vendor()
	{
		$data['header'] = 'Input Vendor';
		$this->template->admin('input_vendor' ,$data);	
	}
	// Add a new item
	public function add()
	{
		if ($this->input->post('submit', TRUE) == 'Submit') {

			$this->form_validation->set_rules('ven_nm', 'Vendor Name', 'required');
			$this->form_validation->set_rules('alamat', 'Alamat', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('telpon', 'Telepon', 'required');

			if ($this->form_validation->run() == TRUE) {
				$data = array(
						'VEN_NM' => $this->input->post('ven_nm', TRUE),
						'ALAMAT' => $this->input->post('alamat', TRUE),
						'EMAIL' => $this->input->post('email', TRUE),
						'TELPON' => $this->input->post('telpon', TRUE)
						 );
				$this->admin->insert_last('t_vendor',$data);
				$this->session->set_flashdata('alert', 'Sukses Menyimpan data !!!');
				redirect('Vendor','refresh');
			} else {
				$this->session->set_flashdata('alert-danger', 'Gagal Menyimpan data !!!');
				
			}
	}
	
	$data['VEN_NM'] = $this->input->post('ven_nm', TRUE);
	$data['ALAMAT'] = $this->input->post('alamat', TRUE);
	$data['EMAIL'] = $this->input->post('email', TRUE);
	$data['TELPON'] = $this->input->post('telpon', TRUE);
	$data['header'] = 'Input Vendor';

	$this->template->admin('input_vendor' ,$data);
}
	
	public function detail()
	{
		if (!is_numeric($this->uri->segment(3)))
      {
         redirect('Vendor');
      }

      $data['header'] = 'Detail Vendor';
      $data['data'] = $this->admin->get_where('t_vendor',['VEN_CD' => $this->uri->segment(3)]);

      $this->template->admin('detail_vendor', $data);
	}
	//Update one item
	public function update()
	{
		
      if ($this->input->post('submit', TRUE) == 'Submit') {
         //validasi
      	$this->form_validation->set_rules('ven_nm', 'Vendor Name', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('telpon', 'Telepon', 'required');

         if ($this->form_validation->run() == TRUE)
         {
				
				$data = array(

						'VEN_NM' => $this->input->post('ven_nm', TRUE),
						'ALAMAT' => $this->input->post('alamat', TRUE),
						'EMAIL' => $this->input->post('email', TRUE),
						'TELPON' => $this->input->post('telpon', TRUE)
						 );

				 $this->admin->update('t_vendor', $data, array('VEN_CD' => $this->input->post('ven_cd', TRUE)));
         		}
				 else {
				$this->admin->update('t_vendor', $data, array('VEN_CD' => $this->input->post('ven_cd', TRUE)));
				}

				redirect('Vendor','refresh');
	}
}

	//Delete one item
	public function delete( $id = NULL )
	{
		if (!is_numeric($this->uri->segment(3))) {
			redirect('Vendor');
		}

		$table = 't_vendor';

		$this->admin->delete($table, ['VEN_CD' => $this->uri->segment(3)]);
		$this->session->set_flashdata('alert', 'Sukses Menghapus data !!!');
		redirect('Vendor');
	}
}

/* End of file Vendor.php */
/* Location: ./application/controllers/Vendor.php */
