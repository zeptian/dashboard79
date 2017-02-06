<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		/* AJAX check  */
		if ( $this->input->is_ajax_request()==FALSE) {
			/* special ajax here */
			redirect('home');
		}
	}

	function region_variable()
	{	
		$this->load->model(array('variable_model','region_model'));

		$var = $this->input->get('variable');
		$reg = $this->variable_model->region_var($var);
		$item = $this->region_model->item_reg($reg[0]['region']);
		$opt = "<option></option>";
		foreach ($item as $item) {
			$opt .= "<option>".$item['name']."</option>";
		}
		echo $opt;
	}
	function item_variable()
	{
		$this->load->model('variable_model');
		$var = $this->input->get('variable');
		$data['param'] = $this->variable_model->param_var($var);
		$this->load->view('ajax/form',$data);
	}
	function region_data()
	{
		$this->load->model('data_model');
		$data = $this->data_model->data_reg();
		header('Content-Type: application/json');
		echo json_encode($data);
	}
}

/* End of file ajax.php */
/* Location: ./application/controllers/ajax.php */