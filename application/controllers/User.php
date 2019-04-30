<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
		$data['header'] = 'Manage User';
		$data['user'] = $this->admin->get_all('t_user');

		$this->template->admin('manage_user', $data);
	}

	public function user()
	{
		$data['header'] = 'Input User';
		$data['nik'] = $this->admin->getnik();
		$data['jabatan'] = $this->admin->get_all('t_akses')->result();
		$this->template->admin('add_user', $data);			
	}
	
		// Add a new item
	public function insert()
	{
		if ($this->input->post('submit', TRUE) == 'Submit') {

			$data = array(
				'nik' => $this->input->post('nik', TRUE),
				'nama' => $this->input->post('nama_karyawan', TRUE),
				'password' => password_hash($this->input->post('password', TRUE), PASSWORD_DEFAULT, ['cost' => 10]),
				'jabatan' => $this->input->post('jabatan', TRUE),
				'status' => $this->input->post('status', TRUE)
			);
			$this->admin->insert_last('t_user',$data);
			$this->session->set_flashdata('alert', 'Sukses Menyimpan data !!!');
			redirect('User','refresh');
		} else {
			$this->session->set_flashdata('alert-danger', 'Gagal Menyimpan data !!!');
			redirect('User','refresh');
		}
	}


	public function detail()
	{
		if (!is_numeric($this->uri->segment(3)))
		{
			redirect('User');
		}

		$data['header'] = 'Detail User';
		$data['data'] = $this->admin->get_where('t_user',['id_user' => $this->uri->segment(3)]);

		$this->template->admin('detail_user', $data);
	}
		//Update one item
	public function update( $id = NULL )
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

					'nik' => $this->input->post('nik', TRUE),
					'nama' => $this->input->post('nama_karyawan', TRUE),
					'password' => password_hash($this->input->post('password', TRUE), PASSWORD_DEFAULT, ['cost' => 10]),
					'status' => $this->input->post('status', TRUE)
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
			redirect('User');
		}

		$table = 't_user';

		$this->admin->delete($table, ['id_user' => $this->uri->segment(3)]);
		$this->session->set_flashdata('alert', 'Sukses Menghapus data !!!');
		redirect('User');
	}


	function cek_login()
	{
		if (!$this->session->userdata('login_user'))
		{
			redirect('login');
		}
	}
}
/* End of file User.php */
/* Location: ./application/controllers/User.php */

