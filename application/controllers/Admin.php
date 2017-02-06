<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		if ( $this->session->userdata('logged_in')==FALSE) {
			
			redirect('login');
		}

		$this->load->model(array('data_model','variable_model','region_model','admin_model'));
	}
	public function index()
	{
		$this->dashboard();
	}
	public function dashboard()
	{
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('dashboard');
	}
	public function region()
	{
		if ($this->input->post()) {
			$cat = $this->uri->segment(3);
			if ($cat == 'region') {
				$this->region_model->region_add();
				redirect('admin/region');
			}else if($cat == 'item'){
				$this->region_model->item_add();
				redirect('admin/region');
			}
		}else{
			$data['region_item'] = $this->region_model->region_item_list();
			$data['region'] = $this->region_model->region_list();
			$this->load->view('header');
			$this->load->view('sidebar');
			$this->load->view('region',$data);
		}
	}
	public function variable()
	{
		if ($this->input->post()) {
			$this->variable_model->variable_add();
			redirect('admin/variable');
		}else{
			$data['variable'] = $this->variable_model->variable_list();
			$data['region'] = $this->region_model->region_list();
			$this->load->view('header');
			$this->load->view('sidebar');
			$this->load->view('variable',$data);
		}
	}
	public function input()
	{
		if ($this->input->post()) {
			$this->data_model->data_add();
			redirect('admin/input');
		}else{
			$data['variable'] = $this->variable_model->variable_var();
			$data['region'] = $this->region_model->region_list();
			$this->load->view('header');
			$this->load->view('sidebar');
			$this->load->view('input',$data);
		}
	}
	public function setting()
	{
		if ($this->input->post()) {
			
		}else{
			$data['user'] = $this->admin_model->admin_list();
			$data['data'] = $this->setting_model->setting_list();
			$this->load->view('header');
			$this->load->view('sidebar');
			$this->load->view('setting',$data);
		}
	}
}
