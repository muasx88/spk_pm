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
		$data['kriteria_jarakkota'] = $this->model->getData("kriteria_jarakkota")->result();
		$data['kriteria_jarakpasar'] = $this->model->getData("kriteria_jarakpasar")->result();
		$data['kriteria_keamanan'] = $this->model->getData("kriteria_keamanan")->result();
		$data['kriteria_fasilitas'] = $this->model->getData("kriteria_fasilitas")->result();

		$this->template->load('admin/template','admin/kriteria/kriteria', $data);
	}

	// public function getKriteriaJSON()
	// {
	// 	$db =$this->input->get("db");
	// 	$datas = $this->model->getData($db)->result_array();
	// 	$toJSON = array();
	// 	$toJSON["data"] = array();
	// 	foreach ($datas as $d) {
	// 		$data['id_kriteria'] = $d["id_kriteria"];
	// 		$data['pilihan_kriteria'] = $d["pilihan_kriteria"];
	// 		array_push($toJSON["data"], $data);
	// 	}

	// 	echo json_encode($toJSON);
	// }

	public function saveKriteria()
	{
		$id = $this->input->post("idKriteria");
		$tbl = $this->input->post("tbl");
		$data = array(
			'pilihan_kriteria' => $this->input->post("pilihanKriteria"),
			'keterangan' => $this->input->post("keteranganKriteria"),
			'bobot' => $this->input->post("bobotKriteria")
		);
		if (empty($id)) {
			if ($this->model->insert($tbl, $data)) {
				echo "success";
			}else{
				echo "failed";
			}
		}else{
			if ($this->model->update($tbl, $data,$id)) {
				echo "success";
			}else{
				echo "failed";
			}
		}
	}

	public function getKriteriaById($id)
	{
		$tbl = $this->input->get("tbl");
		$data = $this->model->getDataById($tbl,$id)->row();
		
		echo json_encode($data);
	}

	public function deleteKriteria($id)
	{
		$tbl = $this->input->get("tbl");
		if ($this->model->delete($tbl, $id)) {
			echo "success";
		}
	}

}

/* End of file Kriteria.php */
/* Location: ./application/controllers/Kriteria.php */
