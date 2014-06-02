<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tasks extends CI_Controller {

	/**
	 * Index page. Only redirect to the main page.
	 */
	public function index() {
		redirect();
	}

	/**
	 * Edition view for tasks.
	 * @param  [int] $idProject
	 * @param  [int] $ganttId
	 */
	public function edit($idProject, $ganttId){

		$this->load->model('tasks_m');

		$tasks = $this->tasks_m->getFormattedTasks($ganttId);

		$this->load->view('header');
		$this->load->view('tasks/index', array('projectId' => $idProject, 'ganttId' => $ganttId, 'tasks' => $tasks));
		$this->load->view('footer');
	
	}
	
	public function step1($idProject, $ganttId) {

		$this->load->model('tasks_m');
	
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<p class="alert">','</p>');
		
		$this->form_validation->set_rules('inputTitle', 'Intitulé', 'required|xss_clean');
		$this->form_validation->set_rules('inputDescription', 'Description', 'required');
		$this->form_validation->set_rules('inputCateg', 'Category', 'required');
		
		
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('header');
			$this->load->view('tasks/step1', array('projectId' => $idProject,
													'category' => $this->tasks_m->sortedCategories($ganttId),
													'ganttId' => $ganttId
												));
			$this->load->view('footer', array('js' => array('editor')));
		}
		else
		{
			$this->session->set_userdata($this->input->post());
			redirect('tasks/step2/' . $idProject . '/' . $ganttId);
		}
	}
	
	/**
	 * Step 2 of the task creation process.
	 * Choosing a starting time and an ending time or a duration.
	 * @param  [type] $idProject
	 * @param  [type] $ganttId
	 * @return [type]
	 */
	public function step2($idProject, $ganttId) {
	
		$this->load->model('tasks_m');
		$this->load->library('form_validation');
			
		if($this->input->post('form') == "date"){
			
			// Starting date is not required anymore currently. We could reactive it after.
			//$this->form_validation->set_rules('inputStartDate', 'Date de début', 'required');
			$this->form_validation->set_rules('inputDuration', 'Durée', 'numeric|callback_endDate_check');	
		}
		else if($this->input->post('form') == "previous") {

			$this->form_validation->set_rules('tasks', 'Tache précédente', 'required');

		}
		
		
		if($this->form_validation->run() == false)
		{
			$this->load->view('header');
			$this->load->view('tasks/step2', array('projectId' => $idProject,
													'tasks' => $this->tasks_m->getAllTasks($ganttId),
													'ganttId' => $ganttId));
			$this->load->view('footer', array('js' => array('datepicker')));
			
		}
		else
		{
			$this->session->set_userdata($this->input->post());
			redirect('tasks/step3/' . $idProject . '/' . $ganttId);
		}
	}
	
	/**
	 * Final creation of a task.
	 * @param  int $idProject [description]
	 * @param  int $ganttId   [description]
	 */
	public function step3($idProject, $ganttId) {
	
		$this->load->model('tasks_m', 'Task');
		$this->Task->add($this->session->all_userdata());

		redirect('tasks/edit/' . $idProject . '/'. $ganttId);	
	}

	/**
	 * Creating a new category for a Gantt diagramm.
	 * @param int $idProject
	 * @param int $ganttId
	 */
	public function addCategory($idProject = '', $ganttId = '') {

		if( is_numeric($idProject) && is_numeric($ganttId)) {
	
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<p class="alert">','</p>');
			
			$this->form_validation->set_rules('name', 'Nom de la catégorie','required');
		
			if( $this->form_validation->run() == TRUE) {

				$this->load->model('category_m','Category');
				$this->Category->add($ganttId, $this->input->post());

				redirect('tasks/edit/' . $idProject . '/' . $ganttId);
			}
			else {
				
				$this->load->model('category_m', 'Category');
				$categ = $this->Category->getAll($ganttId);

				$this->load->view('header');
				$this->load->view('tasks/addCateg',
					array(
						'projectId' => $idProject,
						'categories' => $categ
					));
				$this->load->view('footer');
			}

		}
		else
			redirect('');
	
	}
	
	public function endDate_check($str) {

		$data = $this->input->post();
		
		if( empty ($data['inputEndDate']) && empty ($data['inputDuration'])) {
			$this->form_validation->set_message('endDate_check', 'Veuillez renseigner une date de fin ou une durée pour la tache.');
			return false;
		}
		else
			return true;
	
	}

}

/* End of file tasks.php */
/* Location: ./application/controllers/tasks.php */