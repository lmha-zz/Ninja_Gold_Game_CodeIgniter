<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ninjagold extends CI_Controller {

	// $date = date_create();

	public function index()
	{
		if($this->session->userdata('gold') == FALSE)
		{
			$this->session->set_userdata('gold', 0);
		}
		if($this->session->userdata('activity_logger') == FALSE)
		{
			$log = array();
			$this->session->set_userdata('activity_logger', $log);
		}
		$this->load->view('gold_index_view');
	}

	public function farm()
	{

		$goldChange = rand(10, 20);
		$this->session->set_userdata('gold', ($this->session->userdata('gold')+$goldChange));
		$temp = $this->session->userdata('activity_logger');
		array_unshift($temp, "<p class='gain'>Earned ".$goldChange." gold from the farm! (".date('Y/j/d h:i a').")</p>");
		$this->session->set_userdata('activity_logger', $temp);
		redirect('/Ninjagold/index');
	}

	public function house()
	{
		$goldChange = rand(5, 10);
		$this->session->set_userdata('gold', ($this->session->userdata('gold')+$goldChange));
		$temp = $this->session->userdata('activity_logger');
		array_unshift($temp, "<p class='gain'>Earned ".$goldChange." gold from the house! (".date('Y/j/d h:i a').")</p>");
		$this->session->set_userdata('activity_logger', $temp);
		redirect('/Ninjagold/index');
	}

	public function cave()
	{
		$goldChange = rand(2, 5);
		$this->session->set_userdata('gold', ($this->session->userdata('gold')+$goldChange));
		$temp = $this->session->userdata('activity_logger');
		array_unshift($temp, "<p class='gain'>Earned ".$goldChange." gold from the cave! (".date('Y/j/d h:i a').")</p>");
		$this->session->set_userdata('activity_logger', $temp);
		redirect('/Ninjagold/index');
	}

	public function casino()
	{
		$goldChange = rand(-50, 50);
		$this->session->set_userdata('gold', ($this->session->userdata('gold')+$goldChange));
		if($goldChange > 0)
		{
			$temp = $this->session->userdata('activity_logger');
			array_unshift($temp, "<p class='gain'>Entered a casino and gained ".$goldChange." gold from the casino! (".date('Y/j/d h:i a').")</p>");
			$this->session->set_userdata('activity_logger', $temp);
		}
		elseif ($goldChange == 0) {
			$temp = $this->session->userdata('activity_logger');
			array_unshift($temp, "<p class='gain'>Entered a casino and had no change of gold! (".date('Y/j/d h:i a').")</p>");
			$this->session->set_userdata('activity_logger', $temp);
		}
		else
		{
			$temp = $this->session->userdata('activity_logger');
			array_unshift($temp, "<p class='lost'>Entered a casino and lost ".abs($goldChange)." gold... Ouch.. (".date('Y/j/d h:i a').")</p>");
			$this->session->set_userdata('activity_logger', $temp);
		}
		redirect('/Ninjagold/index');
	}

	public function reset()
	{
		$this->session->sess_destroy();
		redirect('/Ninjagold/index');
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */