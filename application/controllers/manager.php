<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manager extends CI_Controller {

	public function index()
	{
		$this->load->model('project_m');
	
		$this->load->view('header');
		$this->load->view('project/index', array('projects' => $this->project_m->getAll()));
		$this->load->view('footer');
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/manager.php */