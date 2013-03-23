<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Project extends CI_Controller {
	
	/**
	* Creation d'un nouveau projet
	*/
	public function create() {
	
		$this->load->model('customer_m');
	
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<p class="alert">','</p>');
		
		$this->form_validation->set_rules('projectName', 'Nom du projet', 'required|xss_clean');
		$this->form_validation->set_rules('projectDescription', 'Description', 'required|xss_clean');
		$this->form_validation->set_rules('projectClient', 'Client', 'required');
		
		if($this->form_validation->run() == true) {
			
			$this->load->model('project_m');
			
			$this->project_m->create(
				$this->input->post('projectName'),
				$this->input->post('projectDescription'),
				$this->session->userdata('id'),
				$this->input->post('projectClient'));
			
			redirect();
			
		}
		else
		{
			$this->load->view('header');
			$this->load->view('project/create', array('customers' => $this->customer_m->getAll()));
			$this->load->view('footer');
		}
	}
	
	/**
	* Verification de droits et suppression d'un projet.
	*/
	public function delete($id, $validation = '') {
	
		if($validation == 'true')
		{
			$this->load->model('project_m');
			
			// If the user owned the project, return true
			if( $this->project_m->delete($id, $this->session->userdata('id')) )
				redirect('');
			else
				redirect('home/restricted');
		}
		else
		{
			$this->load->view('header');
			$this->load->view('project/delete', array('test' => $id));
			$this->load->view('footer');
		}
		
	}
	
	public function edit($idProject) {
	
		$this->load->model('project_m');
		$data = $this->project_m->get($idProject);

		if(count($data) == 1)
		{
			$this->load->view('header');
			$this->load->view('project/edit', array('project' => $data[0]));
			$this->load->view('footer');
		}
		else
		{
			redirect();
		}
	
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/project.php */