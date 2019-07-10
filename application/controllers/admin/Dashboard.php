<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('logged_in') == FALSE) {
			redirect('admin/auth/login');
		}
		$this->load->model('M_perumahan', 'mp');
	}

	public function index()
	{
		$data = array(
			'title' => 'Dashboard',
			'jml_perumahan' => $this->mp->getAll('perumahan')->num_rows(), 
		);
		$this->template->load('admin/template','admin/dashboard', $data);
	}

}

/* End of file Template.php */
/* Location: ./application/controllers/Template.php */
