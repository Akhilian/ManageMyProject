<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Errors extends CI_Controller {

	public function index() {
		redirect();
	}

	public function _404()
	{
		$this->load->view('header');
		$this->load->view('errors/404');
		$this->load->view('footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/index.php */