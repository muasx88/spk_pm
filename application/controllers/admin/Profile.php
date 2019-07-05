<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('logged_in') == FALSE) {
			redirect('admin/auth/login');
		}
	}

	public function index()
	{
		$data['title']= 'Profile';
		$this->template->load('admin/template','admin/profile', $data);
	}

}

/* End of file Profile.php */
/* Location: ./application/controllers/Profile.php */
