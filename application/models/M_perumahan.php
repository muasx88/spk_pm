<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_perumahan extends CI_Model {
	// front
	public function getPerumahan($tbl, $name)
	{
		$this->db->order_by('nama_perumahan', 'desc');
		$this->db->like('nama_perumahan', $name);
		$this->db->from($tbl);
		return $this->db->get();
	}

	// back

	public function getAll($tbl)
	{
		return $this->db->order_by('id_perumahan', "ASC")->get($tbl);
	}

	public function insert($tbl, $data)
	{
		return $this->db->insert($tbl, $data);
	}

	public function getById($id, $tbl)
	{
		return $this->db->get_where($tbl, array('id_perumahan' =>  $id));
	}

	public function update($tbl, $data, $id)
	{
		return $this->db->where('id_perumahan', $id)->update($tbl, $data);
	}

	public function delete($tbl, $id)
	{
		return $this->db->where('id_perumahan', $id)->delete($tbl);
	}

}

/* End of file m_perumahan.php */
/* Location: ./application/models/m_perumahan.php */
