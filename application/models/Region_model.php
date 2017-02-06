<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Region_model extends CI_Model
{
	function __construct()
	{
		parent :: __construct();
	}
	
	public function region_id($id)
	{
		$this->db->where('id_region',$id);
		$query = $this->db->get('region');
		if ($query->num_rows()>0)	
		{
			foreach ($query->result_array() as $row)
			{ $hasil[]=$row ; }			
			return $hasil;
		}
	}
	
	public function region_list()
	{
		$this->db->select('region');
		$this->db->group_by('region');
		$query = $this->db->get('region');
		if ($query->num_rows()>0)	
		{
			foreach ($query->result_array() as $row)
			{ $hasil[]=$row ; }
			
			return $hasil;
		}
	}
	public function region_item_list()
	{
		$this->db->order_by('region');
		$query = $this->db->get('region');
		if ($query->num_rows()>0)	
		{
			foreach ($query->result_array() as $row)
			{ $hasil[]=$row ; }
			
			return $hasil;
		}
	}
	public function item_reg($reg)
	{
		$this->db->select('name');
		$this->db->where('region',$reg);
		$query = $this->db->get('region');
		if ($query->num_rows()>0)	
		{
			foreach ($query->result_array() as $row)
			{ $hasil[]=$row ; }
			
			return $hasil;
		}
	}

	public function region_var()
	{
		$this->db->select('region');
		$this->db->group_by('region');
		$query = $this->db->get('region');
		if ($query->num_rows()>0)	
		{
			foreach ($query->result_array() as $row)
			{ $hasil[]=$row ; }
			
			return $hasil;
		}
	}
	
	public function region_add()
	{
		$data = array('region' 			=> $this->input->post('region'),
					  'description' 	=> $this->input->post('description'));
		$query = $this->db->insert('region',$data);
		return $query;
	}

	public function item_add()
	{
		if ($this->check()) {
			$data = array('region' 	=> $this->input->post('region'),
						  'name' 	=> $this->input->post('name'));
			$this->db->where('region',$this->input->post('region'));
			$this->db->where('name','');
			$query = $this->db->update('region',$data);
			return $query;
		}else{
			$data = array('region' 	=> $this->input->post('region'),
						  'name' 	=> $this->input->post('name'));
			$query = $this->db->insert('region',$data);
			return $query;
		}
	}
	public function check()
	{
		$this->db->where('region',$this->input->post('region'));
		$this->db->where('name','');
		$query = $this->db->get('region');
		if ($query->num_rows()>0)	
		{
			return TRUE;
		}else{
			return FALSE;
		}
	}

}

/* End of file region_model.php */
/* Location: /application/models/region_model.php */