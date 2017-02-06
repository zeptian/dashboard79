<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		//$this->load->view('header');
		$this->load->view('login');
	}

	function login_submit()
	{
		$this->load->library('auth');

		$username	= $this->input->post('username');
		$password 	= $this->input->post('password');

		$do_login	= $this->auth->login($username, $password);

		if ($do_login) {
			redirect('admin');
		}
		else {
			$this->index();
			//echo "gagal";
		}
	}

	function logout()
	{
		$this->load->library('auth');
		$this->auth->logout();

		redirect('home');
	}
}

/* End of file login.php */
/* Location: ./application/controllers/logout.php */