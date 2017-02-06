<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting_model extends CI_Model
{
	function __construct()
	{
		parent :: __construct();
	}
	
	public function setting_id($id)
	{
		$this->db->where('id_setting',$id);
		$query = $this->db->get('setting');
		if ($query->num_rows()>0)	
		{
			foreach ($query->result_array() as $row)
			{ $hasil[]=$row ; }
			
			return $hasil;
		}
	}
	
	public function setting_list()
	{
		$query = $this->db->get('setting');
		if ($query->num_rows()>0)	
		{
			foreach ($query->result_array() as $row)
			{ $hasil[]=$row ; }
			
			return $hasil;
		}
	}
	public function setting_update($setting,$value)
	{
		$this->db->where('setting', $setting);
		$data = array($setting => $value);
		$query = $this->db->update('setting',$data);
		
	}

}

/* End of file setting_model.php */
/* Location: /application/models/setting_model.php */