<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Variable_model extends CI_Model
{
	function __construct()
	{
		parent :: __construct();
	}
	
	public function variable_id($id)
	{
		$this->db->where('id_variable',$id);
		$query = $this->db->get('variable');
		if ($query->num_rows()>0)	
		{
			foreach ($query->result_array() as $row)
			{ $hasil[]=$row ; }
			
			return $hasil;
		}
	}
	
	public function variable_list()
	{
		$query = $this->db->get('variable');
		if ($query->num_rows()>0)	
		{
			foreach ($query->result_array() as $row)
			{ $hasil[]=$row ; }
			
			return $hasil;
		}
	}

	public function variable_var()
	{
		$this->db->select('variable');
		$this->db->group_by('variable');
		$query = $this->db->get('variable');
		if ($query->num_rows()>0)	
		{
			foreach ($query->result_array() as $row)
			{ $hasil[]=$row ; }
			
			return $hasil;
		}
	}
	
	public function variable_add()
	{
		for ($i=1; $i < 7; $i++) { 
			if ($this->input->post('param'.$i) !="") {
				$data = array('variable' 	=> $this->input->post('variable'),
							  'region' 		=> $this->input->post('region'),
							  'label' 		=> $this->input->post('param'.$i),
							  'description'	=> $this->input->post('desc'.$i),
							  'parameter' 	=> 'param'.$i
				 				);
				$query = $this->db->insert('variable',$data);
			}
		}
		return $query;
	}

	public function region_var($var=null)
	{
		$this->db->select('region');
		$this->db->where('variable', $var);
		$query = $this->db->get('variable');
		if ($query->num_rows()>0)	
		{
			foreach ($query->result_array() as $row)
			{ $hasil[]=$row ; }
			
			return $hasil;
		}
	}
	public function param_var($var=null)
	{
		$this->db->select('parameter,label');
		$this->db->where('variable', $var);
		$query = $this->db->get('variable');
		if ($query->num_rows()>0)	
		{
			foreach ($query->result_array() as $row)
			{ $hasil[]=$row ; }
			
			return $hasil;
		}
	}

}

/* End of file variable_model.php */
/* Location: /application/models/variable_model.php */