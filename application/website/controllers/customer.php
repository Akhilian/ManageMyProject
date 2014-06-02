<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer extends CI_Controller {

	public function index(){}

	public function add() {
	
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<p class="alert">','</p>');
		
		$this->form_validation->set_rules('customerName', 'Nom / Raison sociale', 'required|xss_clean');
		$this->form_validation->set_rules('customerEmail', 'Adresse email', 'required|valid_email|xss_clean');
		$this->form_validation->set_rules('customerStreet', 'Adresse', 'required|xss_clean');
		$this->form_validation->set_rules('customerZip', 'Code postal', 'required|numeric|xss_clean');
		$this->form_validation->set_rules('customerPhone', 'Telephone', 'numeric|xss_clean');
		$this->form_validation->set_rules('customerCity', 'Ville', 'required|xss_clean');
		
		if($this->form_validation->run() == false) {
		
			$this->load->view('header');
			$this->load->view('customer/create');
			$this->load->view('footer');
			
		}
		else
		{
			$this->load->model('customer_m');
			
			$this->customer_m->add(
				$this->input->post('customerName'),
				$this->input->post('customerEmail'),
				$this->input->post('customerPhone'),
				$this->input->post('customerStreet'),
				$this->input->post('customerCity'),
				$this->input->post('customerZip')
			);
			
			redirect('project/create');
		
		}
	
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/customer.php */