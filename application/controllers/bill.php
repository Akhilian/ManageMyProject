<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bill extends CI_Controller {

	public function index($idProject = '') {
		
		$this->load->model('project_m');
		$data = $this->project_m->get($idProject);
		
		$this->load->view('header');
		$this->load->view('bill/edit', array('project' => $data[0]));
		$this->load->view('footer');
	
	}
	
	public function generate($id = '') {
	
		$this->load->library('mpdf');
		$this->mpdf->WriteHTML('Hello World');
		$this->mpdf->Output();
	
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/bill.php */