<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_kriteria extends CI_Model {

	public function getData($tbl)
	{
		return $this->db->get($tbl);
	}

	public function insert($tbl, $data)
	{
		return $this->db->insert($tbl, $data);
	}

	public function getDataById($tbl,$id)
	{
		return $this->db->get_where($tbl, array('id_kriteria' => $id ));
	}

	public function update($tbl, $data, $id)
	{
		return $this->db->where('id_kriteria', $id)->update($tbl, $data);
	}

	public function delete($tbl, $id)
	{
		return $this->db->where('id_kriteria', $id)->delete($tbl);
	}

}

/* End of file M_kriteria.php */
/* Location: ./application/models/M_kriteria.php */
