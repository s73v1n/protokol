<?php
class Dashboard_model extends CI_Model {

	public function get_all()
	{
		$this->db->select('tbl_giat.id as id, tbl_giat.kegiatan as kegiatan, tbl_giat.mulai as start, tbl_giat.selesai as end, tbl_giat.tempat as tempat, tbl_giat.penyelengara as penyelenggara, tbl_diposisi.perangkat as disposisi, tbl_giat.keterangan as keterangan ');
		$this->db->from('tbl_giat');
		$this->db->join('tbl_diposisi', 'tbl_diposisi.id = tbl_giat.disposisi');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function agenda_1()
	{
		$this->db->select('tbl_giat.id as id, tbl_giat.kegiatan as kegiatan, tbl_giat.mulai as start, tbl_giat.selesai as end, tbl_giat.tempat as tempat, tbl_giat.penyelengara as penyelenggara, tbl_diposisi.perangkat as disposisi, tbl_giat.keterangan as keterangan ');
		$this->db->from('tbl_giat');
		$this->db->join('tbl_diposisi', 'tbl_diposisi.id = tbl_giat.disposisi');
		$this->db->where('DATE(mulai)=CURDATE()');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function agenda_2()
	{
		$this->db->select('tbl_giat.id as id, tbl_giat.kegiatan as kegiatan, tbl_giat.mulai as start, tbl_giat.selesai as end, tbl_giat.tempat as tempat, tbl_giat.penyelengara as penyelenggara, tbl_diposisi.perangkat as disposisi, tbl_giat.keterangan as keterangan ');
		$this->db->from('tbl_giat');
		$this->db->join('tbl_diposisi', 'tbl_diposisi.id = tbl_giat.disposisi');
		$this->db->where('DATE(mulai)=CURDATE() + INTERVAL 1 DAY');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function agenda_3()
	{
		$this->db->select('tbl_giat.id as id, tbl_giat.kegiatan as kegiatan, tbl_giat.mulai as start, tbl_giat.selesai as end, tbl_giat.tempat as tempat, tbl_giat.penyelengara as penyelenggara, tbl_diposisi.perangkat as disposisi, tbl_giat.keterangan as keterangan ');
		$this->db->from('tbl_giat');
		$this->db->join('tbl_diposisi', 'tbl_diposisi.id = tbl_giat.disposisi');
		$this->db->where('DATE(mulai)=CURDATE() + INTERVAL 2 DAY');
		$query = $this->db->get();
		return $query->result_array();
	}

}
?>