<?php
class Dashboard_model extends CI_Model {

	public function get_all()
	{
		$this->db->select('tbl_giat.id as id, tbl_giat.kegiatan as kegiatan, tbl_giat.mulai as start, tbl_giat.selesai as end, tbl_giat.tempat as tempat, tbl_giat.penyelengara as penyelenggara, tbl_diposisi.perangkat as disposisi, tbl_giat.keterangan as keterangan ');
		$this->db->join('tbl_diposisi', 'tbl_diposisi.id = tbl_giat.disposisi');
		$this->db->get('tbl_giat');
		return $query->result_array();
	}

}
?>