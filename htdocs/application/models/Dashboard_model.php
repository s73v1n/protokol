<?php
class Dashboard_model extends CI_Model {

	public function get_all()
	{
		$query = $this->db->get('tbl_giat');
		return $query->result_array();
	}

}
?>