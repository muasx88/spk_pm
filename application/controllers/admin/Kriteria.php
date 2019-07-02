<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kriteria extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('logged_in') == FALSE) {
			redirect('admin/auth/login');
		}

		$this->load->model('M_kriteria','model');
	}

	public function index()
	{
		$data['title']= 'Kriteria';

		$data['kriteria_harga'] = $this->model->getData("kriteria_harga")->result();

		$this->template->load('admin/template','admin/kriteria/kriteria', $data);
	}

	/*
	====================================================
	Fungi CRUD Kriteria Harga
	====================================================

	*/

	public function addKriteriaHarga()
	{
		$message="";
		$data = array(
			'pilihan_kriteria' => $this->input->post("pilihanKriteriaHarga"),
			'bobot' => $this->input->post("bobotKriteriaHarga")
		);

		if ($this->model->insert('kriteria_harga', $data)) {
			echo "success";
		}else{
			echo "failed";
		}
	}

	public function getKriteriaHargaById($id)
	{
		$data = $this->model->getDataById("kriteria_harga", $id);
		foreach ($data->result_array() as $dt) {
			$res = array(
				'id_kriteria' => $dt['id_kriteria'],
				'pilihan_kriteria'=>$dt['pilihan_kriteria'],
				'bobot'=> $dt['bobot'] 
			);
		}

		echo json_encode($res);
	}

}

/* End of file Kriteria.php */
/* Location: ./application/controllers/Kriteria.php */
