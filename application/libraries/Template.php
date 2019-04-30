<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template
{

   function __construct()
   {
      $this->ci =&get_instance();
   }

   function admin($template, $data='')
   {

      $data['content'] = $this->ci->load->view($template, $data, TRUE);
      $data['nav']  = $this->ci->load->view('nav', $data, TRUE);

      $this->ci->load->view('home',$data);

   }

   function lotte($template, $data='')
   {
      $this->ci->load->model('admin');

      $data['kategori'] = $this->ci->admin->get_all('t_kategori');
      $data['content'] = $this->ci->load->view($template, $data, TRUE);

      $this->ci->load->view('index', $data);

   }
}
