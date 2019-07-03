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

		$this->template->load('admin/template','admin/kriteria/kriteria', $data);
	}

	/*
	====================================================
	Fungi CRUD Kriteria Harga
	====================================================

	*/

	public function saveKriteriaHarga()
	{
		$id = $this->input->post("idKriteriaHarga");
		if (empty($id)) {
			$data = array(
				'pilihan_kriteria' => $this->input->post("pilihanKriteriaHarga"),
				'bobot' => $this->input->post("bobotKriteriaHarga")
			);

			if ($this->model->insert('kriteria_harga', $data)) {
				echo "success";
			}else{
				echo "failed";
			}
		}else{
			$data = array(
				'pilihan_kriteria' => $this->input->post("pilihanKriteriaHarga"),
				'bobot' => $this->input->post("bobotKriteriaHarga")
			);

			if ($this->model->update('kriteria_harga', $data,$id)) {
				echo "success";
			}else{
				echo "failed";
			}
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

	public function deleteKriteriaHarga($id)
	{
		if ($this->model->delete('kriteria_harga', $id)) {
			echo "success";
		}
	}


	/*
	====================================================
	Fungi CRUD Kriteria Jarak Ke Kota
	====================================================

	*/

	public function saveKriteriaJarakKota()
	{
		$id = $this->input->post("idKriteriaJarakKota");
		if (empty($id)) {
			$data = array(
				'pilihan_kriteria' => $this->input->post("pilihanKriteriaJarakKota"),
				'bobot' => $this->input->post("bobotKriteriaJarakKota")
			);

			if ($this->model->insert('kriteria_jarakkota', $data)) {
				echo "success";
			}else{
				echo "failed";
			}
		}else{
			$data = array(
				'pilihan_kriteria' => $this->input->post("pilihanKriteriaJarakKota"),
				'bobot' => $this->input->post("bobotKriteriaJarakKota")
			);

			if ($this->model->update('kriteria_jarakkota', $data,$id)) {
				echo "success";
			}else{
				echo "failed";
			}
		}
	}

	public function getKriteriaJarakKotaById($id)
	{
		$data = $this->model->getDataById("kriteria_jarakkota", $id);
		foreach ($data->result_array() as $dt) {
			$res = array(
				'id_kriteria' => $dt['id_kriteria'],
				'pilihan_kriteria'=>$dt['pilihan_kriteria'],
				'bobot'=> $dt['bobot'] 
			);
		}

		echo json_encode($res);
	}

	public function deleteKriteriaJarakKota($id)
	{
		if ($this->model->delete('kriteria_jarakkota', $id)) {
			echo "success";
		}
	}


}

/* End of file Kriteria.php */
/* Location: ./application/controllers/Kriteria.php */
