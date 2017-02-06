<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Auth {
	
	protected $CI;
	function __construct(){
		$this->CI = &get_instance();
	}
	
	function login($username,$password)
	{
		
		$this->CI->db->where('username', $username);
		$this->CI->db->limit(1);
		$query 	= $this->CI->db->get('admin');
		$row 	= $query->row();
		if (!$row) {
			$this->CI->session->set_flashdata('message', 'Username Yang Anda Masukan Salah');
			return FALSE;
		}
		else{
			if ($row->password == md5($password)) {
				$session_data = array( 'logged_in'		=> TRUE,
										'username'		=> $row->username);
				$this->CI->session->set_userdata($session_data);
				return TRUE;
			}
			else{
				$this->CI->session->set_flashdata('message', 'Password Yang Anda Masukan Salah');
				return FALSE;
			}
		}
	}

   function is_logged_in()
   {
      if($this->CI->session->userdata('logged_in'))
      {
         return TRUE;
      }
      return FALSE;
   }

   function restrict()
   {
      if($this->is_logged_in() == false)
      {
         redirect('login');
      }
   }

   function logout()
   {
   		$this->CI->session->sess_destroy();
   		redirect('login');
   }
}

/* End of file login.php */
/* Location: ./application/libraries/login.php */