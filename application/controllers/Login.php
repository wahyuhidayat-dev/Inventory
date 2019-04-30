<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
      $this->load->model('admin');
	}

	public function index()
	{
      //echo password_hash('0001', PASSWORD_DEFAULT, ['cost' => 10]);
      if ($this->input->post('submit') == 'Submit')
      {
         $user = $this->input->post('id_user', TRUE);
         $pass = $this->input->post('password', TRUE);

         $cek = $this->admin->get_where('t_user', array('nik' => $user));


         if ($cek->num_rows() > 0) {
            $data = $cek->row();

            if (password_verify($pass, $data->password))

            {
               $datauser = array (
                  'id_user' => $data->id_user,
                  'nama' => $data->nama,
                  'status' => $data->status,
                  'jabatan' => $data->jabatan,
                  'id_akses' => $data->id_akses,
                  'login_user' => TRUE
               );
               
               $this->session->set_userdata('login_user',$datauser);

               redirect('home');

            } else {

               $this->session->set_flashdata('alert', "Wrong Password !!!");

            }

         } else {
            $this->session->set_flashdata('alert', "Wrong User ID !!!");
         }

      }

      if ($this->session->userdata('login_user') == TRUE)
      {
         redirect('home');
      }
      $this->load->view('login');
	}

   public function logout()
   {
      $this->session->sess_destroy();

      redirect('login');
   }
}
