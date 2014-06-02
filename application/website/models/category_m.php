<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category_m extends CI_Model {

	/**
	 * Creating a new category
	 * @param int $idGantt
	 * @param mixed $data
	 */
	public function add($idGantt, $data) {

		$formattedData = array(
			'name' => $data['name'],
			'gantt_id' => $idGantt,
			'category_id' => (!empty($data['parent'])) ? $data['parent'] : NULL
		);

		$this->db->insert('category', $formattedData);

	}


	public function getAll($idGantt) {
		$categoryList = $this->db->query('SELECT * FROM category WHERE gantt_id = ' . $this->db->escape($idGantt));
		return $categoryList->result();
	}

}