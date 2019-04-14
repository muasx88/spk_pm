<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $data['title']= 'Dashboard';
    $this->template->load('admin/template','admin/dashboard', $data);
  }

}

/* End of file Template.php */
/* Location: ./application/controllers/Template.php */