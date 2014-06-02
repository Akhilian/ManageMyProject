<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{

		if( $this->session->userdata('email') ) 
		{
			redirect('manager');

		} else {
		
			$this->load->view('header');
			$this->load->view('index');
			$this->load->view('footer');

		}
		
	}
	
	public function restricted()
	{
		$this->load->view('header');
		$this->load->view('account/restricted');
		$this->load->view('footer');
	}
	
	public function test() {
		$this->load->view('home');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/index.php */