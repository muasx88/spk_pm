<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function login()
	{
		$config = array(
	        array(
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'trim|required',
                'errors' => array(
                    'required' => '%s harus diisi.',
                ),
	        ),
	        array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'trim|required',
                'errors' => array(
                    'required' => '%s harus diisi.',
                ),
	        )
		);
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = "Login";
			$this->load->view('admin/auth/login', $data);
		} else {
			$usr = $this->input->post('username');
			$pwd = $this->input->post('password');

			// cek apakah username dan password ada di database
			$this->db->where('username', $usr);
			$this->db->where('password', md5($pwd));
			$user = $this->db->get('admin')->row();

			if (!empty($user)) {
				
				$user_data = array(
					'username' => $user->username,
					'name' => $user->nama,
					'logged_in' => TRUE
				);
				$this->session->set_userdata($user_data);
				redirect('admin/dashboard');

			}else{
				$this->session->set_flashdata('errors', 'Kombinasi Username dan Password salah!');
				redirect('admin/auth/login');
			}

			
		}

	}

	public function logout()
	{
		session_destroy();
		redirect('admin/auth/login');
	}

}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */