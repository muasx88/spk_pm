<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Penilaian extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged_in') == FALSE) {
			redirect('admin/auth/login');
		}
		$this->load->model('M_penilaian', 'model');
	}
	public function index()
	{
		$data = array(
			'title' => "Perumahan", 
			'data_kecocokan' => $this->model->getDataKecocokan()->result(), 
		);
		$this->template->load('admin/template','admin/penilaian/index', $data);

	}

	public function savePenilaian()
	{
		$id = $this->input->post("idPenilaian");
		$data = array(
			'id_perumahan' => $this->input->post("idPerumahan"),
			'C1' => $this->input->post("C1"),
			'C2' => $this->input->post("C2"),
			'C3' => $this->input->post("C3"),
			'C4' => $this->input->post("C4"),
			'C5' => $this->input->post("C5"),
		);

		// print_r($data);die();

		if (empty($id)) {
			if ($this->model->insert($data)) {
				echo "success";
			}
		}
	}

}

/* End of file Penilaian.php */
/* Location: ./application/controllers/Penilaian.php */
