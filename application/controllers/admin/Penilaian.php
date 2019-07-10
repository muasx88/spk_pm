<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Penilaian extends CI_Controller {

	private $W_C1 = 5;
	private $W_C2 = 3;
	private $W_C3 = 4;
	private $W_C4 = 5;
	private $W_C5 = 5;

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
			'matrik_normalisasi' => $this->_matrikNormalisasi(),
			'matrik_perangkingan' => $this->_matrikPerangkingan(),
			'rangking' => $this->_getPerangkingan(),
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

	private function _matrikNormalisasi()
	{
		$c1_MIN = $this->model->getMinORMax('kriteria_harga','MIN','C1')->row()->C1;
		$c2_MAX = $this->model->getMinORMax('kriteria_jarakkota','MAX','C2')->row()->C2;
		$c3_MAX = $this->model->getMinORMax('kriteria_jarakpasar','MAX','C3')->row()->C3;
		$c4_MAX = $this->model->getMinORMax('kriteria_keamanan','MAX','C4')->row()->C4;
		$c5_MAX = $this->model->getMinORMax('kriteria_fasilitas','MAX','C5')->row()->C5;


		$hasil = [];
		$datas = $this->model->matrikNormalisasi()->result_array();

		foreach ($datas as $data) {
			$d['id_penilaian'] = $data['id_penilaian'];
			$d['nama_perumahan'] = $data['nama_perumahan'];
			$d['C1'] = $c1_MIN / $data['c1_bobot'];
			$d['C2'] = $data['c2_bobot'] / $c2_MAX;
			$d['C3'] = $data['c3_bobot'] / $c3_MAX ;
			$d['C4'] = $data['c4_bobot'] / $c4_MAX;
			$d['C5'] = $data['c5_bobot'] / $c5_MAX;
			array_push($hasil, $d);
		}

		return $hasil;

	}

	private function _matrikPerangkingan()
	{
		$this->db->empty_table('perangkingan');

		$hasil=[];
		$datas = $this->_matrikNormalisasi();
		foreach ($datas as $data) {
			$d['id_penilaian'] = $data['id_penilaian'];
			$d['nama_perumahan'] = $data['nama_perumahan'];
			$d['C1'] = $data['C1'] * $this->W_C1;
			$d['C2'] = $data['C2'] * $this->W_C2;
			$d['C3'] = $data['C3'] * $this->W_C3;
			$d['C4'] = $data['C4'] * $this->W_C4;
			$d['C5'] = $data['C5'] * $this->W_C5;
			$d['jumlah'] = $d['C1'] + $d['C2'] + $d['C3'] + $d['C4'] + $d['C5'];

			$this->db->insert('perangkingan', array(
				'nama_perumahan' => $d['nama_perumahan'],
				'nilai'=> $d['jumlah'],
			));

			array_push($hasil, $d);
		}

		return $hasil;
	}

	private function _getPerangkingan()
	{
		$p1 = $this->model->getPerangkingan()->row();
		return $p1;
	}

}

/* End of file Penilaian.php */
/* Location: ./application/controllers/Penilaian.php */
