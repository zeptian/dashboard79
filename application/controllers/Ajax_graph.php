<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax_graph extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		/* AJAX check  */
		/*if ( $this->input->is_ajax_request()==FALSE) {
			redirect('home');
		}*/
	}
	public function monthly()
	{
		$variable = "Kasus DBD";
		$year = '2017';

		$this->load->model('variable_model');
		$parvar = $this->variable_model->param_var($variable);
		$sql='SELECT ';
		foreach ($parvar as $parvar) {
			$sql.="sum(".$parvar['parameter'].") as ".$parvar['label'].", ";
			$label[]=$parvar['label'];
		}
		$sql .= "month(date) as date from data where variable='".$variable."' and year(date)='".$year."' group by date";
		//echo $sql;
		$query = $this->db->query($sql);

		if ($query->num_rows()>0)	
		{
			foreach ($query->result_array() as $row => $val )
			{
				unset($val['date']);
				$param1[]=(int)$val[$label[0]];
				if(count($label) >1){$param2[]=(int)$val[$label[1]];}
				if(count($label) >2){$param3[]=(int)$val[$label[2]];}
				if(count($label) >3){$param4[]=(int)$val[$label[3]];}
				if(count($label) >4){$param5[]=(int)$val[$label[4]];}
				if(count($label) >5){$param6[]=(int)$val[$label[5]];}
			}
		}
		switch (count($label)) {
			case '1':
				$data = array('name'=>$label[0],'data'=>$param1);
				break;
			case '2':
				$data = array(array('name'=>$label[0],'data'=>$param1),array('name'=>$label[1],'data'=>$param2));
				break;
			case '3':
				$data = array(array('name'=>$label[0],'data'=>$param1),array('name'=>$label[1],'data'=>$param2), array('name'=>$label[2],'data'=>$param3));
				break;
			case '4':
				$data = array(array('name'=>$label[0],'data'=>$param1),array('name'=>$label[1],'data'=>$param2), array('name'=>$label[2],'data'=>$param3), array('name'=>$label[3],'data'=>$param4));
				break;
			case '5':
				$data = array(array('name'=>$label[0],'data'=>$param1),array('name'=>$label[1],'data'=>$param2), array('name'=>$label[2],'data'=>$param3), array('name'=>$label[3],'data'=>$param4), array('name'=>$label[4],'data'=>$param5));
				break;
			case '6':
				$data = array(array('name'=>$label[0],'data'=>$param1),array('name'=>$label[1],'data'=>$param2), array('name'=>$label[2],'data'=>$param3), array('name'=>$label[3],'data'=>$param4), array('name'=>$label[4],'data'=>$param5), array('name'=>$label[5],'data'=>$param6));
				break;
			default:
				break;
		}
		//print_r($data);
		header('Content-Type: application/json');
		echo json_encode($data);
	}
	public function regional()
	{
		$variable = "Kasus DBD";
		$year = '2017';

		$this->load->model('variable_model');
		$parvar = $this->variable_model->param_var($variable);
		$sql='SELECT ';
		foreach ($parvar as $parvar) {
			$sql.="sum(".$parvar['parameter'].") as ".$parvar['label'].", ";
			$label[]=$parvar['label'];
		}
		$sql .= " region from data where variable='".$variable."' and year(date)='".$year."' group by region";
		//echo $sql;
		$query = $this->db->query($sql);

		if ($query->num_rows()>0)	
		{
			foreach ($query->result_array() as $row=>$val)
			{
				$region[] = $val['region'];
				$param1[]=(int)$val[$label[0]];
				if(count($label) >1){$param2[]=(int)$val[$label[1]];}
				if(count($label) >2){$param3[]=(int)$val[$label[2]];}
				if(count($label) >3){$param4[]=(int)$val[$label[3]];}
				if(count($label) >4){$param5[]=(int)$val[$label[4]];}
				if(count($label) >5){$param6[]=(int)$val[$label[5]];}
			}
		}
		switch (count($label)) {
			case '1':
				$data = array('name'=>$label[0],'data'=>$param1);
				break;
			case '2':
				$data = array(array('name'=>$label[0],'data'=>$param1),array('name'=>$label[1],'data'=>$param2));
				break;
			case '3':
				$data = array(array('name'=>$label[0],'data'=>$param1),array('name'=>$label[1],'data'=>$param2), array('name'=>$label[2],'data'=>$param3));
				break;
			case '4':
				$data = array(array('name'=>$label[0],'data'=>$param1),array('name'=>$label[1],'data'=>$param2), array('name'=>$label[2],'data'=>$param3), array('name'=>$label[3],'data'=>$param4));
				break;
			case '5':
				$data = array(array('name'=>$label[0],'data'=>$param1),array('name'=>$label[1],'data'=>$param2), array('name'=>$label[2],'data'=>$param3), array('name'=>$label[3],'data'=>$param4), array('name'=>$label[4],'data'=>$param5));
				break;
			case '6':
				$data = array(array('name'=>$label[0],'data'=>$param1),array('name'=>$label[1],'data'=>$param2), array('name'=>$label[2],'data'=>$param3), array('name'=>$label[3],'data'=>$param4), array('name'=>$label[4],'data'=>$param5), array('name'=>$label[5],'data'=>$param6));
				break;
			default:
				break;
		}
		$data = array('category'=> $region, 'data'=>$data);
		//print_r($data);
		header('Content-Type: application/json');
		echo json_encode($data);
	}
	
}

/* End of file ajax.php */
/* Location: ./application/controllers/ajax.php */