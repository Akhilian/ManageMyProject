<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gantt_m extends CI_Model {

	public function add($id, $name) {
		
		$data = array(
			'project_id' => $id,
			'name' => $name,
			'date' => date("Y-m-j H:i:s")
		);
		
		$this->db->insert('gantt', $data);
		
	}
	
	public function getAll($id) {
		
		$this->db->where('project_id', $id);
		$data = $this->db->get('gantt');
		
		return $data->result_array();
	}
	
	public function checkMember($idGantt) {
	
		$data = $this->db->query('
SELECT manager FROM
(
    SELECT manager FROM projet p
    WHERE id = (
        SELECT project_id FROM gantt WHERE id = ' . $this->db->escape($idGantt) .  '
    )

    UNION
    (
        SELECT user_id FROM user_has_projet
        WHERE projet_id = (
            SELECT project_id FROM gantt WHERE id = ' . $this->db->escape($idGantt) .  '
        )
    )
) d
WHERE manager = ' . $this->session->userdata('id'));

		return (count($data->result_array()) >= 1) ? true : false;
	
	}
	
	public function getJSON($idGantt) {
	
		$this->load->model('tasks_m', 'Task');
		$data = $this->Task->getAll($idGantt);

		return json_encode($data);	
	}

}