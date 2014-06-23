<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account_m extends CI_Model {

	/**
	* Return : True | False
	* Retourne vrai si l'adresse email existe déjà dans la base de données, et faux dans le cas contraire
	*/
	function checkExistingEmail($email) {
		
		if( ! empty($email) )
		{
			
			$this->db->where('email', $email );
			$result = $this->db->get('user');
			
			if($result->num_rows() > 0) {
				return true;
			} else {
				return false;
			}
		}
		else
			return true;
		
	}
	
	/**
	* Creation d'un compte
	*/
	function createAccount($email, $mdp) {
	
		if( ! $this->checkExistingEmail($email) ) {
		
			$this->load->helper('date');

			$data = array(
				'email' => $email,
				'password' => md5($mdp)
			);
			
			$this->db->insert('user', $data);
		}
	}
	
	/**
	* Return : True | False
	* Retourne vrai si le compte existe et faux dans le cas contraire.
	*/
	function checkAccount($email, $mdp) {
	
	
		if( ! empty($email) && ! empty($mdp) ) {

			$this->db->where('email', $email);
			$this->db->where('password', md5($mdp));
			
			$result = $this->db->get('user');
			
			if($result->num_rows() == 1) {
				return true;
			}else
				return false;
		}
		else {
			return false;
		}
	}
	
	/**
	 * Return user informations
	 * @return mixed | null
	*/
	function getAccountInformations($email, $mdp) {
	
		if( ! empty($email) && ! empty($mdp) ) {

			$this->db->select('id, email');
			$this->db->where('email', $email);
			$this->db->where('password', md5($mdp));
			
			$result = $this->db->get('user');
			
			if($result->num_rows() == 1) {
				return $result->result_array();
			}else
				return null;
		}
		else {
			return null;
		}
	}

	/**
	 * Is this account synchronized with github ?
	 * @return boolean
	 */
	function isGithubAccount() {

		if( $this->session->userdata('id') ) {
			$query = $this->db->query('SELECT * FROM user WHERE id = ? ', array($this->session->userdata('id')));

			return !($query->row()->github_id == NULL);
		}
		else
			show_error('You must be connected.', 403);

	}

	function setGithubAccount($pseudo, $avatar_url) {
		if( $this->session->userdata('id') ) {
			$query = $this->db->query(
				'INSERT INTO github (pseudo, avatar_url) VALUES (?, ?)',
				array($pseudo, $avatar_url)
			);
			
			$this->db->query(
				'UPDATE `user` SET `github_id` = ? WHERE user.id = ?',
				array( $this->db->insert_id() , $this->session->userdata('id') )
			);

			return $this;
		}
		else
			show_error('You must be connected.', 403);
	}

	function logOnGithub() {
		$this->load->library('github');
		redirect($this->github->get_loginUrl());
	}

	function getGithubInformations() {
		$this->load->library('github');
		return $this->github->get_authenticatedUser();
	}

}

/* End of file account.php */
/* Location: ./application/models/account.php */