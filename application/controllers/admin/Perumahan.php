<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Perumahan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('logged_in') == FALSE) {
			redirect('admin/auth/login');
		}

		$this->load->model('M_perumahan', 'model');
	}

	public function index()
	{
		$data = array(
			'title' => "Perumahan", 
			'data_perumahan' => $this->model->getAll('perumahan')->result(), 
		);
		$this->template->load('admin/template','admin/perumahan/index', $data);
	}

	public function getPerumahanJSON()
	{
		$datas = $this->model->getAll("perumahan")->result_array();

		$toJSON = array();
		$toJSON["data"] = array();
		foreach ($datas as $d) {
			$data['id_perumahan'] = $d["id_perumahan"];
			$data['nama_perumahan'] = $d["nama_perumahan"];
			array_push($toJSON["data"], $data);
		}

		echo json_encode($toJSON);
	}

	public function savePerumahan()
	{
		$id = $this->input->post("idPerumahan");
		if (empty($id)) {
			$data = array(
				'nama_perumahan' => $this->input->post("namaPerumahan"),
				'harga' => $this->input->post("hargaPerumahan"),
				'jarak_kota' => $this->input->post("jkPerumahan"),
				'jarak_pasar' => $this->input->post("jpPerumahan"),
				'keamanan' => $this->input->post("keaPerumahan"),
				'fasilitas' => $this->input->post("fasPerumahan"),
				'alamat_perumahan' => $this->input->post("alamatPerumahan")
			);

			if ($this->model->insert('perumahan', $data)) {
				echo "success";
			}else{
				echo "failed";
			}
		}else{
			$data = array(
				'nama_perumahan' => $this->input->post("namaPerumahan"),
				'harga' => $this->input->post("hargaPerumahan"),
				'jarak_kota' => $this->input->post("jkPerumahan"),
				'jarak_pasar' => $this->input->post("jpPerumahan"),
				'keamanan' => $this->input->post("keaPerumahan"),
				'fasilitas' => $this->input->post("fasPerumahan"),
				'alamat_perumahan' => $this->input->post("alamatPerumahan")
			);

			if ($this->model->update('perumahan', $data,$id)) {
				echo "success";
			}else{
				echo "failed";
			}
		}
	}

	public function getPerumahanById($id)
	{
		$data = $this->model->getById($id,"perumahan");
		foreach ($data->result_array() as $dt) {
			$res = array(
				'id_perumahan' => $dt['id_perumahan'],
				'nama_perumahan'=>$dt['nama_perumahan'],
				'harga'=>$dt['harga'],
				'jarak_kota'=>$dt['jarak_kota'],
				'jarak_pasar'=>$dt['jarak_pasar'],
				'keamanan'=>$dt['keamanan'],
				'fasilitas'=>$dt['fasilitas'],
				'alamat_perumahan'=> $dt['alamat_perumahan'] 
			);
		}
		echo json_encode($res);
	}

	public function deletePerumahan($id)
	{
		if ($this->model->delete('perumahan', $id)) {
			echo "success";
		}
	}

}

/* End of file Perumahan.php */
/* Location: ./application/controllers/Perumahan.php */
