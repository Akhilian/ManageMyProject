<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer_m extends CI_Model {

	public function getAll() {
	
		$id = $this->session->userdata('id');
	
		if( ! empty($id) ) {
			
			$this->db->where('user_id', $id);
			$data = $this->db->get('customer');
			
			return $data->result_array();
		}
		else
			return null;
	
	}
	
	public function add($name, $email, $phone, $street, $city, $zip) {
	
		$data = array(
			'user_id' => $this->session->userdata('id'),
			'name' => $name,
			'email' => $email,
			'street' => $street,
			'city' => $city,
			'zipcode' => $zip
		);
		
		if( ! empty($phone) )
			$data['phone'] = $phone;
		
		$this->db->insert('customer', $data);
	
	}

}