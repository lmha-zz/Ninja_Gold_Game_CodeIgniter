<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->model('users');
		$view_data['users'] = $this->users->get_all_users();
		$this->load->view('welcome_message', $view_data);
	}

	public function awesome()
	{
		$this->load->view('awesome_view');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */