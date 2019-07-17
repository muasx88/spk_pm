<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_perumahan','mp');
		$this->load->model('M_penilaian', 'mpe');
	}

	public function home()
	{
		$data['title']= 'Home';
		$this->template->load('layout','home', $data);
	}

	public function perumahan()
	{
		$name= $this->input->get('name');
		$data['title']= 'Perumahan';
		$data['perumahan'] = $this->mp->getPerumahan('perumahan', $name)->result();
		$this->template->load('layout','perumahan', $data);
	}

	public function perangkingan()
	{
		$chart_data = '';
		$datas = $this->mpe->getPerangkingan()->result_array();
		foreach ($datas as $data) {
			$chart_data .= "{ perumahan:'".$data['nama_perumahan']."', nilai:".$data['nilai']."}, ";
		}

		// $chart_data = substr($chart_data, 0, -2);

		$data['title'] = 'Perangkingan';
		$data['rangking'] = substr($chart_data, 0, -2);
		$this->template->load('layout','perangkingan', $data);
	}

	public function about()
	{
		$data['title']= 'About Us';
		$this->template->load('layout','about', $data);
	}
	
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */
