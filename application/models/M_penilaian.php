<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_penilaian extends CI_Model {
	private $table = "penilaian";

	public function getDataKecocokan()
	{
		$this->db->select('
			penilaian.*,
			p.id_perumahan as p_id,p.nama_perumahan,
			c1.pilihan_kriteria as c1_kriteria, c1.bobot as c1_bobot,
			c2.pilihan_kriteria as c2_kriteria, c2.bobot as c2_bobot,
			c3.pilihan_kriteria as c3_kriteria, c3.bobot as c3_bobot,
			c4.pilihan_kriteria as c4_kriteria, c4.bobot as c4_bobot,
			c5.pilihan_kriteria as c5_kriteria, c5.bobot as c5_bobot
			');
		$this->db->from('penilaian');
		$this->db->join('perumahan p', 'p.id_perumahan=penilaian.id_perumahan');
		$this->db->join('kriteria_harga c1', 'c1.id_kriteria = penilaian.C1');
		$this->db->join('kriteria_jarakkota c2', 'c2.id_kriteria = penilaian.C2');
		$this->db->join('kriteria_jarakpasar c3', 'c3.id_kriteria = penilaian.C3');
		$this->db->join('kriteria_keamanan c4', 'c4.id_kriteria = penilaian.C4');
		$this->db->join('kriteria_fasilitas c5', 'c5.id_kriteria = penilaian.C5');

		return $this->db->get();
	}

	public function insert($data)
	{
		return $this->db->insert($this->table, $data);
	}

	public function update($data, $id)
	{
		return $this->db->where('id_penilaian', $id)->update($this->table, $data);
	}

	public function getDataById($id)
	{
		return $this->db->get_where($this->table, array('id_penilaian' => $id ));
	}

	public function delete($id)
	{
		return $this->db->where('id_penilaian', $id)->delete($this->table);
	}

	public function getMinORMax($kriteria, $min_max, $c)
	{
		$this->db->select(''.$min_max.'('.$c.'.bobot) as '.$c.'');
		$this->db->from('penilaian');
		$this->db->join(''.$kriteria.' '.$c.'', ''.$c.'.id_kriteria = penilaian.'.$c.'');
		return $this->db->get();
	}

	public function matrikNormalisasi()
	{
		$this->db->select('
			penilaian.*,
			p.id_perumahan as p_id,p.nama_perumahan,
			c1.bobot as c1_bobot,
			c2.bobot as c2_bobot,
			c3.bobot as c3_bobot,
			c4.bobot as c4_bobot,
			c5.bobot as c5_bobot
			');
		$this->db->from('penilaian');
		$this->db->join('perumahan p', 'p.id_perumahan=penilaian.id_perumahan');
		$this->db->join('kriteria_harga c1', 'c1.id_kriteria = penilaian.C1');
		$this->db->join('kriteria_jarakkota c2', 'c2.id_kriteria = penilaian.C2');
		$this->db->join('kriteria_jarakpasar c3', 'c3.id_kriteria = penilaian.C3');
		$this->db->join('kriteria_keamanan c4', 'c4.id_kriteria = penilaian.C4');
		$this->db->join('kriteria_fasilitas c5', 'c5.id_kriteria = penilaian.C5');
		$datas = $this->db->get()->result_array();

		$hasil = [];

		foreach ($datas as $data) {
			$d['id_penilaian'] = $data['id_penilaian'];
			$d['nama_perumahan'] = $data['nama_perumahan'];
			$d['C1'] = $this->getMinORMax('kriteria_harga','MIN','C1')->row()->C1 / $data['c1_bobot'];
			$d['C2'] = $data['c2_bobot'] / $this->getMinORMax('kriteria_jarakkota','MAX','C2')->row()->C2;
			$d['C3'] = $data['c3_bobot'] / $this->getMinORMax('kriteria_jarakpasar','MAX','C3')->row()->C3 ;
			$d['C4'] = $data['c4_bobot'] / $this->getMinORMax('kriteria_keamanan','MAX','C4')->row()->C4;
			$d['C5'] = $data['c5_bobot'] / $this->getMinORMax('kriteria_fasilitas','MAX','C5')->row()->C5;
			array_push($hasil, $d);
		}

		return $hasil;
	}

}

/* End of file M_Penilaian.php */
/* Location: ./application/models/M_Penilaian.php */
