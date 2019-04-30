<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->library(array('template', 'form_validation'));
		$this->load->model('admin');
	}

	public function index()
	{
		$this->cek_login();
		$data['header'] = 'Manage Category';
		$data['category'] = $this->admin->get_all('t_category');

		$this->template->admin('category', $data);
	}

	public function category()
	{
		$data['header'] = 'Input Category';
		$this->template->admin('input_category' ,$data);
	}

	public function add()
	{
		if ($this->input->post('submit', TRUE) == 'Submit') {

			$this->form_validation->set_rules('cat_nm', 'Category Name', 'required');
			$this->form_validation->set_rules('division', 'Division', 'required');

			if ($this->form_validation->run() == TRUE) {
				$data = array(
					'CAT_NM' => $this->input->post('cat_nm', TRUE),
					'DIVISION' => $this->input->post('division', TRUE)
				);
				$this->admin->insert_last('t_category',$data);
				$this->session->set_flashdata('alert', 'Sukses Menyimpan data !!!');
				redirect('Category','refresh');
			} else {
				$this->session->set_flashdata('alert-danger', 'Gagal Menyimpan data !!!');
			}
		}
		
		$data['CAT_NM'] = $this->input->post('cat_nm', TRUE);
		$data['DIVISION'] = $this->input->post('division', TRUE);
		$data['header'] = 'Input Category';

		$this->template->admin('input_category' ,$data);
	}

	public function detail()
	{
		if (!is_numeric($this->uri->segment(3)))
		{
			redirect('Category');
		}

		$data['header'] = 'Detail Category';
		$data['data'] = $this->admin->get_where('t_category',['CAT_ID' => $this->uri->segment(3)]);

		$this->template->admin('detail_category', $data);
	}
	public function update()
	{
		
		if ($this->input->post('submit', TRUE) == 'Submit') {
         //validasi
			$this->form_validation->set_rules('cat_nm', 'Category Name', 'required');
			$this->form_validation->set_rules('division', 'Division', 'required');

			if ($this->form_validation->run() == TRUE)
			{
				
				$data = array(
					'CAT_NM' => $this->input->post('cat_nm', TRUE),
					'DIVISION' => $this->input->post('division', TRUE)
				);

				$this->admin->update('t_category', $data, array('CAT_ID' => $this->input->post('cat_id', TRUE)));
			}
			else {
				$this->admin->update('t_category', $data, array('CAT_ID' => $this->input->post('cat_id', TRUE)));
			}

			redirect('Category','refresh');
		}
	}

	//Delete one item
	public function delete( $id = NULL )
	{
		if (!is_numeric($this->uri->segment(3))) {
			redirect('Category');
		}

		$table = 't_category';

		$this->admin->delete($table, ['CAT_ID' => $this->uri->segment(3)]);
		$this->session->set_flashdata('alert', 'Sukses Menghapus data !!!');
		redirect('Category');
	}
	function cek_login()
	{
		if (!$this->session->userdata('login_user'))
		{
			redirect('login');
		}
	}
}
