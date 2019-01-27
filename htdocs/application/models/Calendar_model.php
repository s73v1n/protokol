<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar_model extends CI_Model {


/*Read the data from DB */
	Public function getEvents()
	{		
	$sql = "SELECT * FROM events ORDER BY events.start ASC";
	return $this->db->query($sql)->result();
	}
	Public function get_id()
	{		
	$this->db->select('tbl_giat.id as id, tbl_giat.title as title, tbl_giat.start as start, tbl_giat.end as end, tbl_giat.description as description, tbl_giat.penyelengara as penyelenggara, tbl_giat.disposisi as disposisi, tbl_diposisi.color as color');
	$this->db->from('tbl_giat');
	$this->db->join('tbl_diposisi', 'tbl_giat.disposisi=tbl_diposisi.id');
	$query = $this->db->get();
	return $query->result_array();
	}

/*Create new events */

	Public function addEvent()
	{

	$sql = "INSERT INTO events (title,events.start,events.end,description, color) VALUES (?,?,?,?,?)";
	$this->db->query($sql, array($_POST['title'], $_POST['start'],$_POST['end'], $_POST['description'], $_POST['color']));
		return ($this->db->affected_rows()!=1)?false:true;
	}
	public function add_Event()
	{
		$data = array(
			'title' 		=> $this->input->post('title'),
			'description'	=> $this->input->post('description'),
			'penyelengara'	=> $this->input->post('penyelengara');
			'start'			=> $this->input->post('start'),
			'end'			=> $this->input->post('end'),
			'disposisi'		=> $this->input->post('disposisi'),
			'keterangan'	=> $this->input->post('keterangan'),		
		);
        $result=$this->db->insert('tbl_giat',$data);
		return $result;	
    }

	/*Update  event */

	Public function updateEvent()
	{
	$sql = "UPDATE events SET title = ?, description = ?, color = ? WHERE id = ?";
	$this->db->query($sql, array($_POST['title'],$_POST['description'], $_POST['color'], $_POST['id']));
		return ($this->db->affected_rows()!=1)?false:true;
	}


	/*Delete event */

	Public function deleteEvent()
	{

	$sql = "DELETE FROM events WHERE id = ?";
	$this->db->query($sql, array($_GET['id']));
		return ($this->db->affected_rows()!=1)?false:true;
	}

	/*Update  event */

	Public function dragUpdateEvent()
	{
			//$date=date('Y-m-d h:i:s',strtotime($_POST['date']));

			$sql = "UPDATE events SET  events.start = ? ,events.end = ?  WHERE id = ?";
			$this->db->query($sql, array($_POST['start'],$_POST['end'], $_POST['id']));
		return ($this->db->affected_rows()!=1)?false:true;


	}






}