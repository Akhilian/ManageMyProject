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
		
		$this->form_validation->set_rules('inputEmail', 'Email', 'required|valid_email|callback_check_existingEmail');
		$this->form_validation->set_rules('inputPassword', 'Mot de passe', 'required');
		
		if($this->form_validation->run() == TRUE) {
		
			$this->load->model('account_m');
			
			$this->account_m->createAccount($this->input->post('inputEmail'), $this->input->post('inputPassword'));

			$this->load->view('header');
			$this->load->view('account/created');
			$this->load->view('footer');
		
		}
		else
		{
			$this->load->view('header');
			$this->load->view('account/register');
			$this->load->view('footer');
		}	
	}
		
	/**
	* Logout method
	*/
	public function logout() {
		
		$this->session->sess_destroy();
		redirect();
	}
	
	/**
	 * 
	 * @return [type] [description]
	 */
	public function manage() {

		$this->load->model('account_m', 'account');
		$data = array();

		if( $this->account->isGithubAccount() )
			$data['github'] = $this->account->getGithubInformations();

		$this->load->view('header');
		$this->load->view('account/profil', $data);
		$this->load->view('footer');
	}

	/**
	 * Synchronyze the current account with an online development tool (Github, Bitbucket, etc.)
	 * @param  string $platform name of the platform
	 */
	public function sync($platform = '') {

		if( ! empty($platform)) {

			$this->load->model('account_m', 'account');

			if( $platform == 'github' ) {

				$this->load->library('github');

				if( $this->account->isGithubAccount() ) {}
				else
				{
					/* If we are already connected to Github, we retrieve a code that allow us to get an access token*/
					if( $this->input->get('code') ) {
						$userData = $this->github->get_accessToken($this->input->get('code'))->get_authenticatedUser();

						$this->account->setGithubAccount( $userData->login, $userData->avatar_url );
						redirect();
					}
					else {
						
						/* If not, we redirect the user to Github. There is 2 effects :
							1) Retrieve the code
							2) Ask for permissions
						*/
						$this->account->logOnGithub();
					}
				}
				
			}
			else
				show_error(404);
		}
		else
			show_error(404);
	}

	public function index() {
		redirect();
	}

	/**
	 *  MISCELLANEOUS
	 * ======================================================================
	 */
	
	/**
	 * Validation rule. Check if the sent email is already registered in the database
	 * @param  string $email Tested email
	 * @return boolean        Result of the test
	 */
	public function check_existingEmail($email) {

		$this->load->model('account_m', 'account');

		if( $this->account->checkExistingEmail($email) ) {
			$this->form_validation->set_message('check_existingEmail', 'This email address is already registered.');
			return FALSE;
		}
		else
			return TRUE;	
	}
}

/* End of file account.php */
/* Location: ./application/controllers/account.php */