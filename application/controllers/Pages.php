<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function home()
	{
		$data['title']= 'Home';
		$this->template->load('layout','home', $data);
	}

	public function about()
	{
		$data['title']= 'About Us';
		$this->template->load('layout','about', $data);
	}
	
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */
