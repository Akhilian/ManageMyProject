<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Infos extends CI_Controller {

	public function EULA()
	{
		$this->load->view('header');
		$this->load->view('infos/EULA');
		$this->load->view('footer');
	}

}

/* End of file infos.php */
/* Location: ./application/controllers/infos.php */