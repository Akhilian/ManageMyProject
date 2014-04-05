<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tasks extends CI_Controller {

	public function index() {
		redirect();
	}

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
	
	public function step2($idProject, $ganttId) {
	
		$this->load->model('tasks_m');
		$this->load->library('form_validation');
			
		if($this->input->post('form') == "date"){
			$this->form_validation->set_rules('inputStartDate', 'Date de début', 'required');
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
	
	public function step3($idProject, $ganttId) {
	
		$this->load->model('tasks_m');
		
		$category = new Category();
		$category->where('id', $this->session->userdata('inputCateg'))->get();
		
		$task = new Task();
		$task->name = $this->session->userdata('inputTitle');
		$task->description = $this->session->userdata('inputDescription');
		$task->start_date = '2014-01-02';
		$task->duration = 3600;
		$task->progression = 0;
		
		$previous = new Task();
		$previous->where_in('id', $this->session->userdata('tasks'))->get();
		
		
		$task->save(array($category, $previous->all));
		
		
/*		foreach ($task->error->all as $e)
		{
		    echo $e . "<br />";
		}*/
		
				
		
		$this->tasks_m->clear();
		
		redirect('tasks/edit/' . $idProject . '/'. $ganttId);
	
	}
	
	public function addCategory($idProject, $ganttId) {
	
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<p class="alert">','</p>');
		
		$this->form_validation->set_rules('name', 'Nom de la catégorie','required');
	
		if( $this->form_validation->run() == TRUE) {
		
			$gantt = new Gantt();
			$gantt->where('id', $ganttId)->get();
			
			$categ = new Category();
			$categ->name = $this->input->post('name');
			$categ->save($gantt);
			
			if( $this->input->post('parent') ) {
				
				$categParent = new Category();
				$categParent->where('id', $this->input->post('parent'))->get();				
				
				$categ->category_id = $categParent->id;
				$categ->save();
			}
			
			redirect('tasks/edit/' . $idProject . '/' . $ganttId);
		
		}
		else {
			
			$categ = new Category();
			$categ->where('gantt_id', $ganttId)->get();
		
			$this->load->view('header');
			$this->load->view('tasks/addCateg',
				array(
					'projectId' => $idProject,
					'categories' => $categ
				));
			$this->load->view('footer');
		}
	
	
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