<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tasks_m extends CI_Model {

	public function add($data) {
	
		$new = array(
			'name' => $data['inputTitle'],
			'description' => $data['inputDescription'],
			'progression' => 0,
			'category_id' => $data['inputCateg'],
		);
	
		if($data['form'] == "date")
		{
			$startDate = $data['inputStartDate'];
		
			if( ! empty($data['inputEndDate']) ) {
				$duration  = (strtotime($data['inputEndDate']) - strtotime($data['inputStartDate']));
				$endDate = $data['inputEndDate'];
			}
			else if( !empty($data['inputDuration']) ) {
				
				if($data['inputUnity'] == 1) {
					$duration = ($data['inputDuration'] * 60 * 60);
					$endDate = date('Y-n-d', strtotime($data['inputStartDate']) + $duration);
				}
				else {
					$duration = ($data['inputDuration'] * 60 * 60 * 24);
					$endDate = date('Y-n-d', strtotime($data['inputStartDate']) + $duration);
				}
				
			}
		}
		else if($data['form'] == "previous") {
		
			$list = implode(",", $data['tasks']);

			$finalDate = $this->db->query('SELECT end_date FROM task WHERE id IN ( ' . $list. ' )');
			
			$latestDate = 0;
			
			foreach($finalDate->result_array() as $k)
			{
				if( ! empty($k['end_date']) && $latestDate < strtotime($k['end_date']))
					$latestDate = strtotime($k['end_date']);
			}
			
			$startDate = date('Y-n-d', $latestDate);
			
			if($data['inputUnity'] == 1) {
				$duration = ($data['inputDuration'] * 60 * 60);
				$endDate = date('Y-n-d', strtotime($startDate) + $duration);
			}
			else {
				$duration = ($data['inputDuration'] * 60 * 60 * 24);
				$endDate = date('Y-n-d', strtotime($startDate) + $duration);
			}
			
		}
		
		$new['duration'] = $duration;
		$new['start_date'] = $startDate;
		$new['end_date'] = $endDate;
		
		
		$this->db->insert('task', $new);
		
		if($data['form'] == "previous")
		{
			$lastId = $this->db->insert_id();
			
			foreach($data['tasks'] as $k) {
				$this->db->insert('task_has_predecessor', array(
					'task_id' => $lastId,
					'predecessor' => $k
				));
			}
		}
		
		return true;
	
	}
	
	public function clear() {
		$this->session->unset_userdata('inputTitle');
		$this->session->unset_userdata('inputDescription');
		$this->session->unset_userdata('form');
		$this->session->unset_userdata('inputDuration');
		$this->session->unset_userdata('tasks');
		$this->session->unset_userdata('inputUnity');
	}

	public function getFormattedTasks($idGantt) {
		return($this->sortedCategories($idGantt));
	}
	
	public function getCategories($idGantt) {
		$categoryList = $this->db->query('SELECT * FROM category WHERE gantt_id = ' . $this->db->escape($idGantt));
		return $categoryList->result_array();
	}
	
	public function getTasks($idCategory) {	
		$data = $this->db->query('SELECT * FROM task WHERE category_id = ' . $this->db->escape($idCategory));
		return $data->result_array();
	}
	
	public function getAllTasks($idGantt) {
		$data = $this->db->query('SELECT * FROM task
			WHERE category_id IN
			(
			    SELECT id FROM category
			    WHERE gantt_id = '. $this->db->escape($idGantt) .'
			)');
			
		return $data->result_array();
	
	}
	
	function sortedCategories($idGantt) {
		return $this->buildTree($this->getCategories($idGantt));
	}
		
	function buildTree( $ar, $pid = null ) {
    
    		$op = array();
			
			foreach( $ar as $item )
			{
			
				if( $item['category_id'] == $pid ) {
				
					$op[$item['id']] = array(
                	'name' => $item['name'],
                	'category_id' => $item['category_id'],
                	'tasks' => $this->getTasks($item['id'])
            		);
            	
	            	// using recursion
					$children =  $this->buildTree( $ar, $item['id'] );
					if( $children ) {
						$op[$item['id']]['children'] = $children;
					}
				}
    		}
    	
    	return $op;
	}

}