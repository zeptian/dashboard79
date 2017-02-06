<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model
{
	function __construct()
	{
		parent :: __construct();
	}
	
	public function admin_id($id)
	{
		$this->db->where('id_admin',$id);
		$query = $this->db->get('admin');
		if ($query->num_rows()>0)	
		{
			foreach ($query->result_array() as $row)
			{ $hasil[]=$row ; }
			
			return $hasil;
		}
	}
	
	public function admin_list()
	{
		$query = $this->db->get('admin');
		if ($query->num_rows()>0)	
		{
			foreach ($query->result_array() as $row)
			{ $hasil[]=$row ; }
			
			return $hasil;
		}
	}
	public function admin_active()
	{
		$this->db->where('status', 'ACTIVE');
		$query = $this->db->get('admin');
		if ($query->num_rows()>0)	
		{
			foreach ($query->result_array() as $row)
			{ $hasil[]=$row ; }
			
			return $hasil;
		}
	}

}

/* End of file admin_model.php */
/* Location: /application/models/admin_model.php */