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

	public function tambah()
	{

		$this->form_validation->set_rules('nama_perumahan', 'Nama Perumahan', 'trim|required',
			array('required' => '%s haru diisi!'));
		if ($this->form_validation->run() == FALSE) {
			$data['title']= 'Perumahan';
			$this->template->load('admin/template','admin/perumahan/tambah', $data);
		} else {
			$data = array(
				'nama_perumahan' => $this->input->post('nama_perumahan'),
				'alamat_perumahan' => $this->input->post('alamat'),
			);

			if ($this->model->insert('perumahan', $data)) {
				redirect('admin/perumahan');
			}

		}
	}

	public function edit($id)
	{

		$this->form_validation->set_rules('nama_perumahan', 'Nama Perumahan', 'trim|required',
			array('required' => '%s haru diisi!'));
		if ($this->form_validation->run() == FALSE) {
			$data['title']= 'Perumahan';
			$data['old'] = $this->model->getById($id, 'perumahan')->row();
			$this->template->load('admin/template','admin/perumahan/edit', $data);
		} else {
			// var_dump($id);die();
			$data = array(
				'nama_perumahan' => $this->input->post('nama_perumahan'),
				'alamat_perumahan' => $this->input->post('alamat'),
			);

			if ($this->model->update('perumahan', $data, $id)) {
				redirect('admin/perumahan');
			}

		}
	}

	public function delete($id)
	{
		if ($this->model->delete('perumahan', $id)) {
			redirect('admin/perumahan');
		}
	}

}

/* End of file Perumahan.php */
/* Location: ./application/controllers/Perumahan.php */
