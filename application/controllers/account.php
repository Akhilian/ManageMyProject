<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller {

	
	/**
	* Page de connexion.
	*/
	public function login() {
	
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('inputEmail', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('inputPassword', 'Mot de passe', 'required');
		
		$this->form_validation->set_error_delimiters('<p class="alert">','</p>');
		
		if($this->form_validation->run() == FALSE) {
		
			$this->load->view('header');
			$this->load->view('account/login');
			$this->load->view('footer');
			
		} else {
		
			$this->load->model('account_m');
			
			if($this->account_m->checkAccount($this->input->post('inputEmail'), $this->input->post('inputPassword')))
			{
				$data = $this->account_m->getAccountInformations($this->input->post('inputEmail'), $this->input->post('inputPassword'));
				$this->session->set_userdata($data[0]);
				
				redirect('manager');
			}
			else {
				$this->load->view('header');
				$this->load->view('account/login');
				$this->load->view('footer');
			}
		}
	}
	
	public function register() {
	
		$this->load->library('form_validation');	
		
		$this->form_validation->set_rules('inputEmail', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('inputPassword', 'Mot de passe', 'required');
		
		if($this->form_validation->run() == TRUE) {
		
			$this->load->model('account_m');
			
			if( ! $this->account_m->checkExistingEmail($this->input->post('inputEmail')))
			{
				$this->account_m->createAccount($this->input->post('inputEmail'), $this->input->post('inputPassword'));
				redirect('account/login');
			}
			else
			{
				$this->load->view('header');
				$this->load->view('account/register');
				$this->load->view('footer');
			}
		
		}
		else
		{
			$this->load->view('header');
			$this->load->view('account/register');
			$this->load->view('footer');
		}	
		
	}
	
	/**
	* Page de déconnexion
	*/
	public function logout() {
		
		$this->session->sess_destroy();
		
		redirect();
		
	}
	
	public function manage() {
	
		$this->load->view('header');
		$this->load->view('account/profil');
		$this->load->view('footer');
	
	}
	
}

/* End of file account.php */
/* Location: ./application/controllers/account.php */