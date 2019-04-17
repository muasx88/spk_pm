<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['title']= 'Home';
	    $this->template->load('layout','home', $data);
		// $this->load->view('layout');
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */