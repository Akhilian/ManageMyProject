<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Project_m extends CI_Model {

	/**
	* Crée un projet
	*/
	public function create($name, $description, $idAuthor, $idCustomer) {

		if( !empty($name) && !empty($description) && $this->checkValidAuthorId($idAuthor)) {
		
			$data = array(
				'name' => $name,
				'manager' => $idAuthor,
				'description' => $description,
				'creation_date' => date("Y-m-j H:i:s"),
				'customer_id' => $idCustomer
			);
			
			$this->db->insert('projet', $data);

		}
	}
	
	public function delete($id, $idUser) {
		
		$this->db->where('id', $id);
		$this->db->where('manager', $idUser);
		$result = $this->db->get('projet');
		
		if($result->num_rows() == 1)
		{
			$this->db->delete('user_has_projet', array('projet_id' => $id));
			$this->db->delete('projet', array('id' => $id));

			return true;
		}
		else
			return false;
		
	}
	
	/**
	* Renvoi un tableau contenant la liste des projets.
	*/
	public function getAll() {
	
		$this->db->where('manager', $this->session->userdata('id'));
		$data = $this->db->get('projet');
		return $data->result_array();
	}
	
	public function get($id) {
	
		$this->db->where('id', $id);
		$this->db->where('manager', $this->session->userdata('id'));
		$data = $this->db->get('projet');
		return $data->result_array();
	}
	
	/**
	* Return : True | false
	* Retourne vrai si l'id passée en parametre est bien répertoriée dans la base de donnée
	*/
	public function checkValidAuthorId($id) {
	
	
		if(is_numeric($id))
		{
			$this->db->where('id', $id);
			$result = $this->db->get('user');
			
			if($result->num_rows() == 1)
				return true;
			else
				return false;
		}
		else
			return false;
	
	}
	
	

}