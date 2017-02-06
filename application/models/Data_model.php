<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_model extends CI_Model
{
	function __construct()
	{
		parent :: __construct();
	}
	
	public function data_id($id)
	{
		$this->db->where('id_data',$id);
		$query = $this->db->get('data');
		if ($query->num_rows()>0)	
		{
			foreach ($query->result_array() as $row)
			{ $hasil[]=$row ; }
			
			return $hasil;
		}
	}
	
	public function data_list()
	{
		$query = $this->db->get('data');
		if ($query->num_rows()>0)	
		{
			foreach ($query->result_array() as $row)
			{ $hasil[]=$row ; }
			
			return $hasil;
		}
	}
	public function data_reg()
	{
		$this->db->select('param1,param2,param3,param4,param5,param6');
		$this->db->where('variable',$this->input->get('variable'));
		$this->db->like('date',$this->input->get('year'));
		$this->db->where('region', $this->input->get('region'));
		$query = $this->db->get('data');
		if ($query->num_rows()>0)	
		{
			foreach ($query->result_array() as $row)
			{ $hasil[]=$row ; }
			
			return $hasil;
		}
	}
	public function data_add()
	{
		$year 	= $this->input->post('year');
		$variable = $this->input->post('variable');
		$region = $this->input->post('region');
		$count = $this->input->post('count');
		$data[]='';
		for ($i=0; $i < 12; $i++) { 
			for ($j=1; $j <= $count; $j++) { 
				$k = array('param'.$j => $this->input->post('param'.$j)[$i]);
				$data = array_merge($data,$k);
			}
			unset($data[0]);
			$s = array_merge($data,array('variable' 	=>  $variable,
										'region'		=> $region,
						  				'date'			=> $year.'-'.($i+1).'-10' )
					);
			$insert = $this->db->insert('data',$s);
		}
		return $insert;
	}
	public function monthly($variable,$year)
	{
		
	}
}

/* End of file data_model.php */
/* Location: /application/models/data_model.php */