<?php 
class Blog_model extends CI_Model {

	// fetch all blogs from table
	function get_all()
	{
		$this->db->order_by('id', 'DESC');
	    $get_blogs = $this->db->get('blogs');
	    return $get_blogs->result_array();
	}

	// insert to table
	function create($data)
	{
		$this->db->insert('blogs', $data);
	}


	// updates data
	function update($data)
	{
		$this->db->where('id', $data['id']);
		$this->db->update('blogs', $data);
	}

	// deleting data
	function delete($id) {
		$this->db->delete('blogs', array('id' => $id));
	}

	// get specific rows from table
	function find($id) {
		$get_blog = $this->db->get_where('blogs', array('id' => $id));
		return $get_blog->row_array();
	}

}