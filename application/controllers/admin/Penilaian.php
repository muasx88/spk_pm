<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Penilaian extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged_in') == FALSE) {
			redirect('admin/auth/login');
		}
		$this->load->model('M_penilaian', 'model');
		$this->load->model('M_kriteria', 'mk');
		$this->load->model('M_perumahan', 'mp');
	}
	public function index()
	{
		$data = array(
			'title' => "Penilaian",
			'perumahan' => $this->mp->getAll('perumahan')->result(),
			'kriteria_harga' => $this->mk->getData('kriteria_harga')->result(),
			'kriteria_jarakkota' => $this->mk->getData('kriteria_jarakkota')->result(),
			'kriteria_jarakpasar' => $this->mk->getData('kriteria_jarakpasar')->result(),
			'kriteria_keamanan' => $this->mk->getData('kriteria_keamanan')->result(),
			'kriteria_fasilitas' => $this->mk->getData('kriteria_fasilitas')->result(),
			'data_kecocokan' => $this->model->getDataKecocokan()->result(),
			'matrik_normalisasi' => $this->model->matrikNormalisasi()
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
		}else{
			if ($this->model->update($data, $id)) {
				echo "success";
			}
		}
	}

	public function getPenilaianByID($id)
	{
		$data = $this->model->getDataById($id)->row();
		echo json_encode($data);
	}

	public function deletePenilaian($id)
	{
		if ($this->model->delete($id)) {
			echo "success";
		}
	}

	// public function matrikNormalisasi()
	// {
	// 	$c1_MIN = $this->model->getMinORMax('MIN','c1');
	// 	$c2_MAX = $this->model->getMinORMax('MAX','c2');
	// 	$c3_MAX = $this->model->getMinORMax('MAX','c3');
	// 	$c4_MAX = $this->model->getMinORMax('MAX','c4');
	// 	$c5_MAX = $this->model->getMinORMax('MAX','c5');

	// 	$matrikNormalisasi = $this->model->matrikNormalisasi();
	// 	echo json_encode($matrikNormalisasi);

	// 	return $this->model->getDataKecocokan()->result();
	
	// }

}

/* End of file Penilaian.php */
/* Location: ./application/controllers/Penilaian.php */
