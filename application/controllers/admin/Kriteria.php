<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kriteria extends CI_Controller {

  public function __construct()
  {
    parent::__construct();

    if ($this->session->userdata('logged_in') == FALSE) {
    	redirect('admin/auth/login');
    }
  }

  public function index()
  {
    $data['title']= 'Kriteria';
    $this->template->load('admin/template','admin/kriteria', $data);
  }

}

/* End of file Kriteria.php */
/* Location: ./application/controllers/Kriteria.php */
