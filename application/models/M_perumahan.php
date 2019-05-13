<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_perumahan extends CI_Model {

	public function getAll($tbl)
	{
		return $this->db->get($tbl);
	}

	public function insert($tbl, $data)
	{
		return $this->db->insert($tbl, $data);
	}

}

/* End of file m_perumahan.php */
/* Location: ./application/models/m_perumahan.php */